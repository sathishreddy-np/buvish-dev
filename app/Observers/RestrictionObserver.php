<?php

namespace App\Observers;

use App\Models\Restriction;

class RestrictionObserver
{
    /**
     * Handle the Restriction "created" event.
     */
    public function created(Restriction $restriction): void
    {
    }

    /**
     * Handle the Restriction "updated" event.
     */
    public function updated(Restriction $restriction): void
    {
        //
    }

    /**
     * Handle the Restriction "deleted" event.
     */
    public function deleted(Restriction $restriction): void
    {
        //
    }

    /**
     * Handle the Restriction "restored" event.
     */
    public function restored(Restriction $restriction): void
    {
        //
    }

    /**
     * Handle the Restriction "force deleted" event.
     */
    public function forceDeleted(Restriction $restriction): void
    {
        //
    }
}
