<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 8/2/24, 11:47 PM.
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
        Schema::create(config('shop.prefix_table') . 'product_attributes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('attribute_set_id')->index()->constrained(config('shop.prefix_table') . 'product_attribute_sets')->onDelete('cascade');
            $table->string('color', 50)->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_default')->default(0);
            $table->tinyInteger('sort_order')->default(0);
            $table->unsignedTinyInteger('status')->default(1)->index();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('shop.prefix_table') . 'product_attributes');
    }
};
