<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Operador extends Migration
{

    public function up()
    {
        Schema::create('operador', function ($table){
            $table->integer('id');
            $table->string('nome');
        });
    }

    public function down()
    {
        Schema::dropIfExists('operador');
    }
}
