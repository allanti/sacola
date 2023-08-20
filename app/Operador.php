<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    public $timestamps = false;

    protected $fillable = array('nome', 'matricula');

    protected $table = "operador";

}
