<?php

// database/migrations/xxxx_xx_xx_create_activity_log_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_name')->nullable();
            $table->bigInteger('subject_id')->nullable();
            $table->string('subject_type')->nullable();
            $table->bigInteger('causer_id')->nullable();
            $table->string('causer_type')->nullable();
            $table->json('properties')->nullable();
            $table->timestamps();

            $table->index(['log_name', 'subject_id', 'subject_type']);
            $table->index(['causer_id', 'causer_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_log');
    }
};