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
            $table->string('rating')->nullable();
            $table->string('pincode')->nullable();
            $table->string('area')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('delivery_lat_lon')->nullable();
        });
    }

    /**
     * Reverse the migrations...
     */
    public function down(): void
    {
        Schema::table('customers_subscription', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('pincode');
            $table->dropColumn('area');
            $table->dropColumn('from_date');
            $table->dropColumn('to_date');
            $table->dropColumn('delivery_lat_lon');
        });
    }
};
