<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class prodotto extends Model
{
    protected $table ='prodotti';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
