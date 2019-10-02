<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayableDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payable_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier');
            $table->integer('payable');
            $table->date('date');
            $table->string('description');
            $table->string('unit');
            $table->string('quantity');
            $table->string('rate');
            $table->string('amount');
            $table->string('remarks');
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
        Schema::dropIfExists('payable_details');
    }
}
