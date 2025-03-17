<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 8/2/24, 8:40 PM.
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
        Schema::create(config('shop.prefix_table') . 'product_attribute_sets_translations', function (Blueprint $table) {
            $table->id();

            $table->string('locale')->index();
            $table->foreignId('product_attribute_set_id')->index('product_attribute_set_id_index')->constrained(config('shop.prefix_table') . 'product_attribute_sets')->onDelete('cascade')->name('prod_attr_set_id_fk');
            $table->string('title');
            $table->foreignId('created_by')->index()->constrained('users')->onDelete('cascade');

            $table->timestamps();

            $table->unique(['product_attribute_set_id', 'locale'], 'product_attribute_set_id_locale_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('shop.prefix_table') . 'product_attribute_sets_translations');
    }
};
