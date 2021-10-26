<?php

namespace App\Observers;

use App\Models\Resources\Prodotto;
use Illuminate\Support\Facades\Storage;

class ProdottoObserver
{
    /**
     * Handle the prodotto "created" event.
     *
     * @param  \App\Models\Resources\Prodotto  $prodotto
     * @return void
     */
    public function created(Prodotto $prodotto)
    {
        //
    }

    /**
     * Handle the prodotto "updated" event.
     *
     * @param  \App\Models\Resources\Prodotto  $prodotto
     * @return void
     */
    public function updated(Prodotto $prodotto)
    {
        //
    }

    /**
     * Handle the prodotto "deleted" event.
     *
     * @param  \App\Models\Resources\Prodotto  $prodotto
     * @return void
     */
    public function deleted(Prodotto $prodotto)
    {
        if($prodotto->file_img != null || !empty($prodotto->file_img))
            Storage::delete('/public/images/products/' . $prodotto->file_img);
    }

    /**
     * Handle the prodotto "restored" event.
     *
     * @param  \App\Models\Resources\Prodotto  $prodotto
     * @return void
     */
    public function restored(Prodotto $prodotto)
    {
        //
    }

    /**
     * Handle the prodotto "force deleted" event.
     *
     * @param  \App\Models\Resources\Prodotto  $prodotto
     * @return void
     */
    public function forceDeleted(Prodotto $prodotto)
    {
        if($prodotto->file_img != null || !empty($prodotto->file_img))
            Storage::delete('/public/images/products/' . $prodotto->file_img);
    }
}
