<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 8/2/24, 11:57 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Entities\User;

class ProductAttributeSetTranslation extends Model
{
    protected $table = 'shop_product_attribute_sets_translations';
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
    public function productAttributeSet(): BelongsTo
    {
        return $this->belongsTo(ProductAttributeSet::class, 'product_attribute_set_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
