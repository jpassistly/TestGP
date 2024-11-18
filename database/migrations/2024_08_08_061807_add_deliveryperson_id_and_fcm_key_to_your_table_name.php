<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('deliverypersons_fcm', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing primary key column
            $table->unsignedBigInteger('deliveryperson_id')->nullable();
            $table->text('fcm_key')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('deliverypersons_fcm');
    }
};
