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

class SubStatusTranslation extends Model
{
    protected $table = 'lead_sub_status_translations';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
