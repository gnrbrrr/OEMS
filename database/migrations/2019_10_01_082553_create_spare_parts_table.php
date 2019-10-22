<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('specification')->nullable();
            $table->string('brand')->nullable();
            $table->string('type');
            $table->string('line');
            $table->string('location');
            $table->integer('stock_quantity');
            $table->integer('minimum_stock');
            $table->string('unit');
            $table->string('alternative_unit')->nullable();
            $table->string('currency');
            $table->integer('price');
            $table->string('supplier');
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
        Schema::dropIfExists('spare_parts');
    }
}
