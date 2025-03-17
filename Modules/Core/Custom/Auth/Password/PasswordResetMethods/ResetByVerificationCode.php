<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Auth\Password\PasswordResetMethods;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Custom\Auth\Password\Contracts\ResetPasswordContract;
use Modules\Core\Custom\Auth\Password\Enums\PasswordResetStatus;
use Modules\Core\Custom\VerificationCode\Contracts\HasVerificationCodes;
use Modules\Core\Custom\VerificationCode\Enums\VerificationCodePurpose;
use UnexpectedValueException;

class ResetByVerificationCode implements ResetPasswordContract
{
    protected int $throttle = 60;

    public function __construct(int $throttle = 60)
    {
        $this->throttle = $throttle;
    }

    public function sendResetEmail(array $credentials, ?Closure $callback = null): PasswordResetStatus
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.
        $user = $this->getUser($credentials);

        if (is_null($user)) {
            return PasswordResetStatus::INVALID_USER;
        }

        if ($this->recentlyCreatedCode($user)) {
            return PasswordResetStatus::RESET_THROTTLED;
        }

        $this->deleteCodes($user);

        $code = $this->createCode($user);

        if ($callback) {
            return $callback($user, $code) ?? PasswordResetStatus::RESET_LINK_SENT;
        }

        // Once we have the reset code, we are ready to send the message out to this
        // user with a link to reset their password. We will then redirect back to
        // the current URI having nothing set in the session to indicate errors.
        $user->sendVerificationCodeNotification($code, VerificationCodePurpose::ResetPassword);

        return PasswordResetStatus::RESET_LINK_SENT;
    }

    public function reset(array $credentials, Closure $callback): PasswordResetStatus
    {
        $user = $this->validateReset($credentials);

        // If the responses from the validate method is not a user instance, we will
        // assume that it is a redirect and simply return it from this method and
        // the user is properly redirected having an error message on the post.
        if (! $user instanceof HasVerificationCodes) {
            return $user;
        }

        $password = $credentials['password'];

        // Once the reset has been validated, we'll call the given callback with the
        // new password. This gives the user an opportunity to store the password
        // in their persistent storage. Then we'll delete the code and return.
        $callback($user, $password);

        $this->deleteCodes($user);

        return PasswordResetStatus::PASSWORD_RESET;
    }

    /**
     * Validate a password reset for the given credentials.
     *
     * @return HasVerificationCodes|string
     */
    public function validateReset(array $credentials)
    {
        if (is_null($user = $this->getUser($credentials))) {
            return PasswordResetStatus::INVALID_USER;
        }

        if (! $this->isValidCode($user, $credentials['code'])) {
            return PasswordResetStatus::INVALID_TOKEN;
        }

        return $user;
    }

    /**
     * Get the user for the given credentials.
     *
     * @return HasVerificationCodes|null
     *
     * @throws \UnexpectedValueException
     */
    public function getUser(array $credentials)
    {
        $credentials = Arr::except($credentials, ['code']);

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($user && ! $user instanceof HasVerificationCodes) {
            throw new UnexpectedValueException('User must implement HasVerificationCodes interface.');
        }

        return $user;
    }

    /**
     * Validate the given password reset verification code for the given user.
     */
    public function isValidCode(HasVerificationCodes $user, string $code): bool
    {
        return $user->isVerificationCodeValid($code);
    }

    /**
     * Create a new verification code for the given user.
     *
     * @return string
     */
    public function createCode(HasVerificationCodes $user)
    {
        return $user->createVerificationCode(VerificationCodePurpose::ResetPassword)->code;
    }

    /**
     * Determine if the given user recently created a password reset verification code.
     */
    public function recentlyCreatedCode(HasVerificationCodes $user): bool
    {
        $record = $user->verificationCodes()
            ->where('purpose', VerificationCodePurpose::ResetPassword)
            ->latest()
            ->first();

        return $record && $this->codeRecentlyCreated($record->created_at);
    }

    /**
     * Delete password reset verification codes of the given user.
     *
     * @return void
     */
    public function deleteCodes(HasVerificationCodes $user)
    {
        $user->deleteVerificationCodes(VerificationCodePurpose::ResetPassword);
    }

    /**
     * Validate the given password reset code.
     *
     * @param  string  $code
     * @return bool
     */
    public function codeExists(HasVerificationCodes $user, $code)
    {
        return $user->isVerificationCodeExists($code);
    }

    protected function codeRecentlyCreated($createdAt)
    {
        if ($this->throttle <= 0) {
            return false;
        }

        return Carbon::parse($createdAt)->addSeconds(
            $this->throttle
        )->isFuture();
    }
}
