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
        Schema::create(config('lead.prefix_table').'source_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('source_id')->index()->constrained(config('lead.prefix_table').'source')->onDelete('cascade');
            $table->text('locale')->index();
            $table->text('title');
            $table->foreignId('created_by')->index()->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('lead.prefix_table').'source_translations');
    }
};
