<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table = 'utenti';
    protected $primaryKey = 'utenteId';
    protected $guarded = ['role'];

    public $timestamps = false;
}
