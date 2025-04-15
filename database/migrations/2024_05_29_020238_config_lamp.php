<?php

// database/migrations/xxxx_xx_xx_create_config_lamp_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration

{
    public function up()
    {
        Schema::create('config_lamps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('device_id')->unsigned();
            $table->boolean('status')->nullable();
            $table->time('time_on')->nullable();
            $table->time('time_off')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('config_lamp');
    }
};

