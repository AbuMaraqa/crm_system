<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('shop.prefix_table') . 'products', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->tinyInteger('status')->unsigned()->default(1)->index();
            $table->string('sku')->unique();
            $table->integer('quantity')->unsigned()->nullable();
            $table->double('price')->unsigned()->default(0)->index();
            $table->double('sale_price')->unsigned()->nullable();
            $table->boolean('stock_status')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->boolean('is_featured')->default(0)->index();
            $table->boolean('is_top')->default(0)->index();
            $table->boolean('is_hot_deals')->default(0)->index();
            $table->boolean('is_best_seller')->default(0)->index();
            $table->float('weight')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->float('length')->nullable();
            $table->integer('sort_order')->default(0)->unsigned();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('shop.prefix_table') . 'products');
    }
};
