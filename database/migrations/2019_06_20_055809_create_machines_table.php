<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fixed_asset_number');
            $table->string('control_number');
            $table->string('machine_name');
            $table->string('line');
            $table->string('model');
            $table->string('machine_controller');
            $table->string('serial_number');
            $table->string('manufacturer');
            $table->string('working_capacity');
            $table->string('machine_location');
            $table->string('location_user');
            $table->date('date_made')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('padlock_number');
            $table->string('remarks')->nullable();
            $table->string('image_name');
            $table->integer('status')->default(0);
            $table->string('registrant_id');
            $table->date('disposal_date')->nullable();
              


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
