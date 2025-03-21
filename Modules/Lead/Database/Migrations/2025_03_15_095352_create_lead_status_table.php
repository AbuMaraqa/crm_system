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
        Schema::create(config('lead.prefix_table').'status', function (Blueprint $table) {
            $table->id();

            $table->foreignId('department_id')->index()->constrained(config('lead.prefix_table').'departments')->onDelete('cascade');
            $table->text('background_color');
            $table->text('text_color');
            $table->integer('sort');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('lead.prefix_table').'status');
    }
};
