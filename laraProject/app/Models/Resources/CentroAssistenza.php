<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class CentroAssistenza extends Model
{
    protected $table = 'centri_assistenza';
    protected $primaryKey = 'ID';
    protected $guarded = ['ID'];
    public $timestamps = true;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ragione_sociale', 'telefono','email', 'sito_web', 'descrizione', 'via', 'città', 'cap',
    ];
}
