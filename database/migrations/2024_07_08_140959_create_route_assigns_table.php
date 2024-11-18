<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('route_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_line_id');
            $table->unsignedBigInteger('pincode_id');
            $table->unsignedBigInteger('area_id');
            $table->boolean('del')->default(false); // Assuming del is a boolean indicating deletion status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
};
