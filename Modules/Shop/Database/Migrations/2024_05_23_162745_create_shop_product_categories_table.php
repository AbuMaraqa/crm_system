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
        Schema::create(config('shop.prefix_table') . 'product_categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('parent_id')->default(0)->index();
            $table->unsignedTinyInteger('status')->default(1)->index();
            $table->string('slug')->unique();
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->unsignedInteger('sort_order')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('shop.prefix_table') . 'product_categories');
    }
};
