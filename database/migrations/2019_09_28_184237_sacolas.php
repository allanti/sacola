<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sacolas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacolas', function ($table){
            $table->bigIncrements('id');
            $table->date('data');
            $table->integer('retirada');
            $table->integer('devolucao');
            $table->integer('matricula_operador');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sacolas');
    }
}
