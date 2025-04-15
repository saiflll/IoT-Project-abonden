<?php

// database/migrations/xxxx_xx_xx_create_data_sensors_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('data_sensors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('device_id')->unsigned();
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->float('light_intensity')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_sensors');
    }
};
