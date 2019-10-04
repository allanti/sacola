<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Operadora extends Migration
{

    public function up()
    {
        Schema::create('operador', function ($table){
            $table->integer('matricula');
            $table->string('nome');
            $table->integer('id_sacolas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('operador');
    }
}
