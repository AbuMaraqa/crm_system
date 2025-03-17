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
        Schema::table('shop_product_labels', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->text('background_color');
            $table->text('text_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shop_product_labels', function (Blueprint $table) {
            $table->dropColumn('background_color');
            $table->dropColumn('text_color');
            $table->string('color');
        });
    }
};
