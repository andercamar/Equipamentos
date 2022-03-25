<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputerHardware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_hardware', function (Blueprint $table) {
            $table->unsignedInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade')->onUpdade('cascade');
            $table->unsignedInteger('hardware_id');
            $table->foreign('hardware_id')->references('id')->on('hardware')->onDelete('cascade')->onUpdade('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computer_hardware');
    }
}
