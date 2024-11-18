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
        Schema::table('customer_wallet', function (Blueprint $table) {
            $table->timestamp('last_gift_at')->nullable()->after('created_by');

            // Ensure `updated_at` and `created_at` columns are properly handled
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_wallet', function (Blueprint $table) {
            $table->dropColumn('last_gift_at');

            // Revert `updated_at` and `created_at` columns if necessary
            $table->timestamp('created_at')->nullable(false)->change();
            $table->timestamp('updated_at')->nullable(false)->change();
        });
    }
};
