<?php

namespace App\Observers;

use App\Models\Model;

class ModelObserver
{
    /**
     * Handle the Model "created" event.
     *
     * @param  \App\Models\Model  $model
     * @return void
     */
    public function created(Model $model)
    {
        //
    }

    /**
     * Handle the Model "updated" event.
     *
     * @param  \App\Models\Model  $model
     * @return void
     */
    public function updated(Model $model)
    {
        //
    }

    /**
     * Handle the Model "deleted" event.
     *
     * @param  \App\Models\Model  $model
     * @return void
     */
    public function deleted(Model $model)
    {
        //
    }

    /**
     * Handle the Model "restored" event.
     *
     * @param  \App\Models\Model  $model
     * @return void
     */
    public function restored(Model $model)
    {
        //
    }

    /**
     * Handle the Model "force deleted" event.
     *
     * @param  \App\Models\Model  $model
     * @return void
     */
    public function forceDeleted(Model $model)
    {
        //
    }
}
