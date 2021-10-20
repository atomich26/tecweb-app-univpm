<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Listeners\ProdottoDeleted;


class prodotto extends Model
{
    protected $table ='prodotti';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    protected $guarded = ['ID'];

    protected $dispatchesEvents = [
        'deleted' => ProdottoDeleted::class,
    ];

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
