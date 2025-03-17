<?php

namespace App\Observers;

use App\Models\GoldPrices;
use App\Models\History_Price;

class GoldPricesObserver
{
    /**
     * Handle the GoldPrices "created" event.
     */
    public function created(GoldPrices $goldPrices): void
    {
        History_Price::create([
            'id_gold_prices' => $goldPrices->id,
            'date_enregistrement' => now(),
        ]);
    }

    /**
     * Handle the GoldPrices "updated" event.
     */
    public function updated(GoldPrices $goldPrices): void
    {
        //
    }

    /**
     * Handle the GoldPrices "deleted" event.
     */
    public function deleted(GoldPrices $goldPrices): void
    {
        //
    }

    /**
     * Handle the GoldPrices "restored" event.
     */
    public function restored(GoldPrices $goldPrices): void
    {
        //
    }

    /**
     * Handle the GoldPrices "force deleted" event.
     */
    public function forceDeleted(GoldPrices $goldPrices): void
    {
        //
    }
}
