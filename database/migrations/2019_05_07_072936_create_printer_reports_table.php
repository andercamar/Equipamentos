<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrinterReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printer_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('Time')->nullable();
            $table->string('User')->nullable();
            $table->integer('Pages')->nullable();
            $table->integer('Copies')->nullable();
            $table->string('Printer')->nullable();
            $table->string('Paper Size')->nullable();
            $table->string('Duplex')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('printer_reports');
    }
}
