<?php

namespace App\Observers;

use App\Models\VehicleInfo;

class VehicleInfoObserver
{
    /**
     * Handle the VehicleInfo "created" event.
     */
    public function created(VehicleInfo $vehicleInfo): void
    {
        //
    }

    /**
     * Handle the VehicleInfo "updated" event.
     */
    public function updated(VehicleInfo $vehicleInfo): void
    {
        //
    }

    /**
     * Handle the VehicleInfo "deleted" event.
     */
    public function deleted(VehicleInfo $vehicleInfo): void
    {
        //
    }

    /**
     * Handle the VehicleInfo "restored" event.
     */
    public function restored(VehicleInfo $vehicleInfo): void
    {
        //
    }

    /**
     * Handle the VehicleInfo "force deleted" event.
     */
    public function forceDeleted(VehicleInfo $vehicleInfo): void
    {
        //
    }
}
