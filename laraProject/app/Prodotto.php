<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodotto extends Model
{
    protected $table ='prodotti';
    protected $primaryKey = 'eventoId';
    public $timestamps = false;
}
