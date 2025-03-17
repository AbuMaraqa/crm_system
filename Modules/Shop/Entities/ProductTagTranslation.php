<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 8/2/24, 3:05 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Entities\User;

class ProductTagTranslation extends Model
{
    /**
     * @var string
     */
    protected $table = 'shop_product_tags_translations';

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
    public function productLabel(): BelongsTo
    {
        return $this->belongsTo(ProductTag::class, 'product_tag_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
