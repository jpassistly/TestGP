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
        Schema::table('customer_wallet_history', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_wallet_history', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable(false)->change();
            $table->timestamp('updated_at')->nullable(false)->change();
        });
    }
};