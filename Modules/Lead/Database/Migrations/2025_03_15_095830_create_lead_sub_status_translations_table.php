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
        Schema::create(config('lead.prefix_table').'sub_status_translations', function (Blueprint $table) {
            $table->id();

            $table->text('locale')->index();
            $table->foreignId('sub_status_id')->index()->constrained(config('lead.prefix_table').'sub_status')->onDelete('cascade');
            $table->text('title');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('lead.prefix_table').'sub_status_translations');
    }
};
