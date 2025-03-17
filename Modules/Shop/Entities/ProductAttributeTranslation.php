<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 8/3/24, 2:11 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Entities\User;

class ProductAttributeTranslation extends Model
{
    protected $table = 'shop_product_attributes_translations';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'product_attribute_id',
        'created_by',
    ];

    /**
     * @return BelongsTo
     */
    public function productAttribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
