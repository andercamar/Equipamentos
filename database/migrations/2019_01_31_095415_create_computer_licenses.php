<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputerLicenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_license', function (Blueprint $table) {
            $table->unsignedInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade')->onUpdade('cascade');
            $table->unsignedInteger('license_id');
            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade')->onUpdade('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computer_license');
    }
}
