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
        Schema::create(config('geolocation.prefix_table').'countries', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger("geo_country_id")->unique();

            $table->string('en_common_name', 50)->unique();
            $table->string('en_official_name', 80)->unique();
            $table->string('ar_common_name', 50)->unique();
            $table->string('ar_official_name', 70)->unique();
            $table->string('native_common_name', 50)->nullable();
            $table->string('native_official_name', 80)->nullable();
            $table->string('native_lang_code', 50)->nullable();
            $table->string('top_level_domine', 25)->nullable();
            $table->char('code', 4)->unique();
            $table->char('code_ccn3', 4)->nullable();
            $table->char('code_cca3', 4)->nullable();
            $table->char('code_cioc', 4)->nullable();
            $table->char('phone_code', 10)->index();
            $table->boolean('independent')->nullable();
            $table->string('currency_code', 20)->index()->nullable();

            $table->unsignedBigInteger('capital_id')->index()->nullable();

            $table->string('continent', 30);
            $table->decimal('latitude', 10, 8)->nullable()->index();
            $table->decimal('longitude', 11, 8)->nullable()->index();
            $table->bigInteger('area')->nullable();
            $table->bigInteger('population')->nullable();
            $table->string('start_of_week', 15)->nullable();
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
        Schema::dropIfExists(config('geolocation.prefix_table').'countries');
    }
};
