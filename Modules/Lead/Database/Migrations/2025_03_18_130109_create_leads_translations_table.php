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
        Schema::create('leads_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lead_id')->index()->constrained('leads')->onDelete('cascade');
            $table->text('locale')->index();
            $table->text('name');
            $table->text('business_name')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('created_by')->index()->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads_translations');
    }
};
