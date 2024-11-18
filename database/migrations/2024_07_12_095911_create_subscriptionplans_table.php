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
        Schema::create('subscriptionplans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->numeric('days_count')->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->char('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptionplans');
    }
};
