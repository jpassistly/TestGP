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
        Schema::table('delivery_line_mappings', function (Blueprint $table) {
            $table->timestamp('trip_start')->nullable();
            $table->timestamp('trip_end')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_line_mappings', function (Blueprint $table) {
            //
        });
    }
};
