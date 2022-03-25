<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComputerSoftware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_software',function (Blueprint $table){
            $table->unsignedInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade')->onUpdade('cascade');
            $table->unsignedInteger('software_id');
            $table->foreign('software_id')->references('id')->on('software')->onDelete('cascade')->onUpdade('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computer_software');
    }
}
