<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/20/24, 8:52 PM.
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
        Schema::create(config('shop.prefix_table') . 'product_tags_translations', function (Blueprint $table) {
            $table->id();

            $table->string('locale')->index();
            $table->foreignId('product_tag_id')->index()->constrained(config('shop.prefix_table') . 'product_tags')->onDelete('cascade');
            $table->string('title');
            $table->foreignId('created_by')->index()->constrained('users')->onDelete('cascade');

            $table->timestamps();

            $table->unique(['product_tag_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('shop.prefix_table') . 'product_tags_translations');
    }
};
