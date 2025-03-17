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
        Schema::create(config('shop.prefix_table') . 'product_categories_translations', function (Blueprint $table) {
            $table->id();

            $table->string('locale')->index();
            $table->foreignId('product_category_id')->index()->constrained(config('shop.prefix_table') . 'product_categories')->onDelete('cascade');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->json('seo')->nullable();
            $table->foreignId('created_by')->index()->constrained('users')->onDelete('cascade');

            $table->timestamps();

            $table->unique(['product_category_id', 'locale'], 'product_category_id_locale_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('shop.prefix_table') . 'product_categories_translations');
    }
};
