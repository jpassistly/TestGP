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
            $table->timestamp('edited_at')->nullable();
            $table->unsignedBigInteger('edited_product_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers_subscription', function (Blueprint $table) {
            $table->dropColumn('edited_at');
        $table->dropColumn('edited_product_id');
        });
    }
};
