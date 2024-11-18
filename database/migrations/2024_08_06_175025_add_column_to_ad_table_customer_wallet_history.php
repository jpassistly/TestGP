<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customer_wallet_history', function (Blueprint $table) {
            $table->integer('transtype_main_id')->nullable();
            $table->integer('transttype')->nullable();
            $table->string('transtype_name')->nullable();
            $table->integer('payment_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_wallet_history', function (Blueprint $table) {
            $table->dropColumn(['transtype_main_id', 'transttype', 'transtype_name', 'payment_type']);
        });
    }

};
