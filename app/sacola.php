<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sacola extends Model
{
    public $timestamps = false;

    protected $fillable = array('id', 'data', 'retirada','devolucao','matricula_operador','sobra');


}
