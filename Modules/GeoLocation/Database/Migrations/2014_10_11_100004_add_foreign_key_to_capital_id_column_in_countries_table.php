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
        // Schema::table(config('geolocation.prefix_table') . 'countries', function (Blueprint $table) {
        //     $table->foreign('capital_id')->references('geo_city_id')->on(config('geolocation.prefix_table') . 'cities');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table(config('geolocation.prefix_table') . 'countries', function (Blueprint $table) {
        //     $table->dropForeign(['capital_id']);
        // });
    }
};
