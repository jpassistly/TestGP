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
        Schema::table('customers_subscription', function (Blueprint $table) {
            $table->string('cus_lat_lon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers_subscription', function (Blueprint $table) {
            $table->dropColumn('cus_lat_lon');
        });
    }
};
