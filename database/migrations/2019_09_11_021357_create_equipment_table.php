<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('equipment_control_number');
            $table->string('equipment_name');
            $table->string('model');
            $table->string('equipment_controller');
            $table->string('serial_number');
            $table->string('fixed_asset_number')->nullable();
            $table->string('manufacturer');
            $table->string('working_capacity');
            $table->string('line');
            $table->string('equipment_location');
            $table->string('section');
            $table->date('date_made')->nullable();
            $table->date('date_arrived')->nullable();
            $table->string('remarks')->nullable();
            $table->string('registrant_id');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('equipment');
    }
}
