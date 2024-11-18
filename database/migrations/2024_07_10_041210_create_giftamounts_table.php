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
        Schema::create('giftamounts', function (Blueprint $table) {
            $table->id();
            $table->integer('walet_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->double('amount')->nullable();
            $table->string('debit_credit_status')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('notes')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->boolean('del')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giftamounts');
    }
};
