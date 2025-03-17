<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 2/18/24, 9:59 AM.
 * @Project: Jumla
 ************************************************/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('geolocation.prefix_table').'cities', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger("geo_city_id")->unique();

            $table->string('en_name', 50)->index();
            $table->string('ar_name', 50)->index();
            $table->char('code', 8)->nullable()->index();

            $table->foreignId('governorate_id')->index()->nullable()->constrained(config('geolocation.prefix_table').'governorates')->onDelete('cascade');
            $table->foreignId('country_id')->index()->constrained(config('geolocation.prefix_table').'countries')->onDelete('cascade');
            // $table->foreignId('governorate_id')->index()->nullable()->constrained(config('geolocation.prefix_table') . 'governorates','geo_governorate_id')->onDelete('cascade');
            // $table->foreignId('country_id')->index()->constrained(config('geolocation.prefix_table') . 'countries','geo_country_id')->onDelete('cascade');

            $table->string('continent', 30)->index();
            $table->boolean('is_capital_city')->default(false);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->boolean('will_sync')->default(true)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('geolocation.prefix_table').'cities');
    }
};
