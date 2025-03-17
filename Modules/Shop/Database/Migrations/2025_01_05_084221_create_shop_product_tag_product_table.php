<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shop_product_tag_product', function (Blueprint $table) {

            $table->foreignId('product_id')->index()->constrained('shop_products')->onDelete('cascade');
            $table->foreignId('tag_id')->index()->constrained('shop_product_tags')->onDelete('cascade');
            $table->primary(['product_id', 'tag_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_product_tag_product');
    }
};
