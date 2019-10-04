<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estoque extends Model
{
    public $timestamps = false;

    protected $fillable = array('id', 'total');

}
