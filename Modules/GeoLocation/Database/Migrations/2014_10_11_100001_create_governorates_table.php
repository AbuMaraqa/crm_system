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
        Schema::create(config('geolocation.prefix_table').'governorates', function (Blueprint $table) {

            $table->id();

            $table->string('en_name', 50)->index();
            $table->string('ar_name', 50)->index();
            $table->char('code', 8)->nullable()->index();

            $table->foreignId('country_id')->constrained(config('geolocation.prefix_table').'countries')->onDelete('cascade');

            $table->string('continent', 30)->index();
            $table->bigInteger('population')->nullable();
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
        Schema::dropIfExists(config('geolocation.prefix_table').'governorates');
    }
};
