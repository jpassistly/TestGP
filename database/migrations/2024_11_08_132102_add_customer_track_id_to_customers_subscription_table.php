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
            $table->integer('customer_track_id')->nullable()->after('delivery_line_id'); // Adjust the data type as needed
            $table->string('grace_period')->nullable()->after('delivery_line_id'); // Adjust the data type as needed
            $table->string('allow_grace')->nullable()->after('delivery_line_id'); // Adjust the data type as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers_subscription', function (Blueprint $table) {
            $table->dropColumn('customer_track_id','grace_period','allow_grace');
        });
    }
};
