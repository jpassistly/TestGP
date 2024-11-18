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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id', 50);
            $table->unsignedInteger('customer_id');
            $table->integer('price');
            $table->date('delivery_date')->nullable();
            $table->string('delivery_status', 255);
            $table->unsignedInteger('delivered_by')->nullable();
            $table->timestamp('delivery_at')->useCurrent();
            $table->string('pincode')->nullable();
            $table->string('area')->nullable();
            $table->string('cus_lat_lon')->nullable();
            $table->string('delivery_lat_lon')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
