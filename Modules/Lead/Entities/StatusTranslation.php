<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Lead\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Entities\User;

class StatusTranslation extends Model
{
    protected $table = 'lead_status_translations';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'created_by',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (StatusTranslation $tagTranslation): void {
            $tagTranslation->created_by = auth()->id();
        });
    }
}
