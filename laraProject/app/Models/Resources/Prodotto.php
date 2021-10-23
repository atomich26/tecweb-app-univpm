<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Listeners\ProdottoDeleted;


class Prodotto extends Model
{
    protected $table ='prodotti';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    protected $guarded = ['ID', 'utenteID', 'categoriaID'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'modello', 'descrizione', 'specifiche', 'guida_installazione', 'note_uso'
    ];

    public function malfunzionamenti(){
        return $this->hasMany(Malfunzionamento::class,'prodottoID');
    }

    public function staff(){
        return $this->belongsTo('app\User', 'utenteID');
    }
}
