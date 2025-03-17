<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\VerificationCode\Traits;

use DateTimeInterface;
use Exception;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use Modules\Core\Custom\VerificationCode\Enums\VerificationCodePurpose;
use Modules\Core\Custom\VerificationCode\Enums\VerificationCodeType;
use Modules\Core\Entities\VerificationCode;
use Modules\Core\Notifications\Auth\ResetPasswordByVerificationCodeNotification;
use Modules\Core\Services\Localization\Localization;

trait HasVerificationCodes
{
    public function getEmailForVerificationCode(): string
    {
        return $this->email;
    }

    public function sendVerificationCodeNotification(string $code, VerificationCodePurpose $purpose): void
    {
        if ($purpose === VerificationCodePurpose::ResetPassword) {
            $this->notify((new ResetPasswordByVerificationCodeNotification($code, $purpose))
                ->locale(Localization::getCurrentLocale()));
        }
    }

    /**
     * Get the verification codes that belong to model.
     */
    public function verificationCodes(): MorphMany
    {
        return $this->morphMany(VerificationCode::class, 'codeable');
    }

    /**
     * Create a verification code for the user.
     */
    public function createVerificationCode(VerificationCodePurpose $purpose, ?DateTimeInterface $expiresAt = null): VerificationCode
    {
        $plainTextCode = $this->generateVerificationCodeString();

        if (is_null($expiresAt)) {
            $expiresAt = Carbon::now()->addMinutes(15);
        }

        return $this->verificationCodes()
            ->create([
                'code' => $plainTextCode,
                'purpose' => $purpose,
                'expires_at' => $expiresAt,
            ]);
    }

    /**
     * Delete a verification codes for the user.
     */
    public function deleteVerificationCodes(VerificationCodePurpose $purpose): void
    {
        $this->verificationCodes()->where('purpose', $purpose)->delete();
    }

    /**
     * Validate the given verification code.
     */
    public function isVerificationCodeExists(string $code): bool
    {
        return $this->verificationCodes()
            ->where('code', $code)
            ->exists();
    }

    /**
     * Validate the given verification code.
     */
    public function isVerificationCodeValid(string $code): bool
    {
        $record = $this->verificationCodes()
            ->where('code', $code)
            ->latest()
            ->first();

        return $record && $record->expires_at->isFuture();
    }

    /**
     * Generate the code string.
     */
    public function generateVerificationCodeString(VerificationCodeType $type = VerificationCodeType::Numeric, int $length = 8): string
    {
        switch ($type) {
            case VerificationCodeType::Numeric:
                $code = $this->generateNumericVerificationCode($length);
                break;
            case VerificationCodeType::AlphaNumeric:
                $code = $this->generateAlphanumericVerificationCode($length);
                break;
            default:
                throw new Exception("{$type} is not a supported type");
        }

        return $code;
    }

    /**
     * Generate numeric code
     *
     * @throws Exception
     */
    private function generateNumericVerificationCode(int $length = 8): string
    {
        $i = 0;
        $code = '';

        while ($i < $length) {
            $code .= random_int(0, 9);
            $i++;
        }

        return $code;
    }

    /**
     * Generate alpha numeric code
     */
    private function generateAlphanumericVerificationCode(int $length = 8): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';

        return substr(str_shuffle($characters), 0, $length);
    }
}
