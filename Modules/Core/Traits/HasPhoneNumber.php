<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Traits;

use libphonenumber\PhoneNumberUtil;

trait HasPhoneNumber
{
    public function getNationalFormattedPhone(): ?string
    {
        if (empty($this->phone_number)) {
            return null;
        }

        return phone($this->phone_number)->formatNational();
    }

    public function getInterNationalFormattedPhone(): ?string
    {
        if (empty($this->phone_number)) {
            return null;
        }

        return phone($this->phone_number)->formatInterNational();
    }

    public function getNationalPhone(): ?string
    {
        if (empty($this->phone_number)) {
            return null;
        }

        return PhoneNumberUtil::normalizeDiallableCharsOnly(phone($this->phone_number)->formatNational());
    }

    public function getInterNationalPhone(): ?string
    {
        if (empty($this->phone_number)) {
            return null;
        }

        return PhoneNumberUtil::normalizeDiallableCharsOnly(phone($this->phone_number)->formatInterNational());
    }
}
