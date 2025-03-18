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
        Schema::create(config('lead.prefix_table').'available_services_plans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')->index()->constrained(config('lead.prefix_table').'available_services')->onDelete('cascade');
            $table->float('price');
            $table->date('start_date');
            $table->date('end_date');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_available_services_plans');
    }
};
