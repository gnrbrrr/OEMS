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
            $table->string('fixed_asset_number')->length(20);
            $table->string('control_number')->length(50);
            $table->string('machine_name')->length(50);
            $table->string('line')->length(20);
            $table->string('model')->length(30);
            $table->string('machine_controller')->length(30);
            $table->string('serial_number')->length(25);
            $table->string('manufacturer')->length(20);
            $table->string('working_capacity')->length(20);
            $table->string('machine_location')->length(25);
            $table->string('location_user')->length(15);
            $table->date('date_made')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('padlock_number')->length(5);
            $table->string('remarks')->length(30);
            $table->string('image_name')->length(80);
            $table->string('status')->length(25);
            $table->string('registrant_id')->length(30);
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
