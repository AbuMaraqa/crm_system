<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\VerificationCode\Contracts;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Core\Custom\VerificationCode\Enums\VerificationCodePurpose;
use Modules\Core\Entities\VerificationCode;

interface HasVerificationCodes
{
    public function verificationCodes(): MorphMany;

    public function deleteVerificationCodes(VerificationCodePurpose $purpose): void;

    public function isVerificationCodeExists(string $code): bool;

    public function isVerificationCodeValid(string $code): bool;

    public function createVerificationCode(VerificationCodePurpose $purpose, ?DateTimeInterface $expiresAt = null): VerificationCode;

    public function getEmailForVerificationCode(): string;

    public function sendVerificationCodeNotification(string $code, VerificationCodePurpose $purpose): void;
}
