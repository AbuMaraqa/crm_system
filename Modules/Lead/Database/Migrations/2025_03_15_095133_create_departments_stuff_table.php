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
        Schema::create(config('lead.prefix_table').'departments_stuff', function (Blueprint $table) {
            $table->foreignId('department_id')->index()->constrained(config('lead.prefix_table').'departments')->onDelete('cascade');
            $table->foreignId('user_id')->index()->constrained('users')->onDelete('cascade');
            $table->primary(['department_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('lead.prefix_table').'departments_stuff');
    }
};
