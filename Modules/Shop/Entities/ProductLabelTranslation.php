<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 6:40 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Entities\User;

class ProductLabelTranslation extends Model
{
    /**
     * @var string
     */
    protected $table = 'shop_product_labels_translations';

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
        return $this->belongsTo(ProductLabel::class, 'product_label_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
