<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 8/2/24, 11:47 PM.
 * @Project: Jumla
 ************************************************/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Shop\Enums\ProductAttributeSetDisplayLayout;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('shop.prefix_table') . 'product_attribute_sets', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('status')->default(1)->index();
            $table->string('display_layout')->default(ProductAttributeSetDisplayLayout::RADIO)->index();
            $table->tinyInteger('sort_order')->unsigned()->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('shop.prefix_table') . 'product_attribute_sets');
    }
};
