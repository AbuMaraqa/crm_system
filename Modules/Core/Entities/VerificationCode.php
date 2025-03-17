<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Custom\VerificationCode\Enums\VerificationCodePurpose;

class VerificationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'purpose',
        'used_at',
        'expires_at',
    ];

    protected $casts = [
        'purpose' => VerificationCodePurpose::class,
        'used_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function codeable()
    {
        return $this->morphTo();
    }
}
