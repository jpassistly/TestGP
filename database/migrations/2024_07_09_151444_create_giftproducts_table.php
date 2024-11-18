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
        Schema::create('giftproducts', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->double('price')->nullable();
            $table->string('delivery_status')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('product_id')->nullable();
            $table->double('quantity')->nullable();
            $table->double('measurment')->nullable();
            $table->double('unit')->nullable();
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
        Schema::dropIfExists('giftproducts');
    }
};
