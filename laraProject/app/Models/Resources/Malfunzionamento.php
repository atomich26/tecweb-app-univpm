<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Malfunzionamento extends Model
{
    protected $table = 'malfunzionamenti';
    protected $primaryKey = 'ID';

    public function soluzioni(){
        return $this->hasMany(Soluzione::class,'malfunzionamentoID');
    }

    public function prodotto(){
        return $this->belongsTo(Pordotto::class, 'prodottoID');
    }
}
