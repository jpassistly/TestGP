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
        Schema::table('giftamounts', function (Blueprint $table) {
            $table->double('current_amount')->after('amount')->default(0); // Add the column with a default value
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('giftamounts', function (Blueprint $table) {
            $table->dropColumn('current_amount');
        });
    }
};
