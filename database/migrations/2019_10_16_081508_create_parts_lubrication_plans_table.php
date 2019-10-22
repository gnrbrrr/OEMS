<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsLubricationPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts_lubrication_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lubrication_plan_id');
            $table->string('part');
            $table->integer('plan_unit_quantity');
            $table->integer('plan_lubricant_quantity');
            $table->integer('plan_total_quantity');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('parts_lubrication_plans');
    }
}
