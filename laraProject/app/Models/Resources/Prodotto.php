<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;


class prodotto extends Model
{
    protected $table ='prodotti';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    protected $guarded = ['ID'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'modello', 'categoriaID', 'descrizione', 'specifiche', 'guida_installazione', 'note_uso', 'utenteID'
    ];

    public function malfunzionamenti(){
        return $this->hasMany(Malfunzionamento::class,'prodottoID');
    }

    public function staff(){
        return $this->belongsTo('app\User', 'utenteID');
    }
}
