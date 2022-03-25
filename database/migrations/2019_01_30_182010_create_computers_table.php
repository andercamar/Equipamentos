<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('computer_patrimony')->unique();
            $table->string('computer_name')->unique();
            $table->string('computer_user');
            $table->date('computer_purchase');
            $table->integer('computer_invoice');
            $table->string('computer_type');
            $table->boolean('computer_active')->default('1');
            $table->unsignedInteger('departament_id');
            $table->foreign('departament_id')->references('id')->on('departaments')->onUpdate('cascade');
            $table->unsignedInteger('model_id');
            $table->foreign('model_id')->references('id')->on('computer_models')->onUpdate('cascade');
            $table->unsignedInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
