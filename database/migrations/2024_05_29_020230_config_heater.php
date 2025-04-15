<?php

// database/migrations/xxxx_xx_xx_create_config_heater_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('config_heaters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('device_id')->unsigned();
            $table->enum('mode', ['auto', 'manual'])->nullable();
            $table->boolean('status')->nullable();
            $table->float('max_temp')->nullable();
            $table->float('min_temp')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('config_heater');
    }
};

