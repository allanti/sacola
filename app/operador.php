<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class operador extends Model
{
    public $timestamps = false;

    protected $fillable = array('nome', 'matricula', 'id_sacola');

    protected $table = "operador";

}
