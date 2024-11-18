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
        Schema::table('delivery_lines', function (Blueprint $table) {
            $table->string('color_code', 7)->nullable()->after('pincode_id'); // Adding a nullable color_code column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_lines', function (Blueprint $table) {
            $table->dropColumn('color_code');
        });
    }
};
