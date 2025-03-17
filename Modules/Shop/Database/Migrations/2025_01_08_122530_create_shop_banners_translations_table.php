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
        Schema::create(config('shop.prefix_table') .'banners_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('label_button')->nullable();
            $table->foreignId('banner_id')->index()->constrained(config('shop.prefix_table') . 'banners')->onDelete('cascade');
            $table->foreignId('created_by')->index()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_banners_translations');
    }
};
