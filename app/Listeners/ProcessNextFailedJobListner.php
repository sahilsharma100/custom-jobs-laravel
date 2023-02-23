<?php

namespace App\Listeners;

use App\Http\Traits\CustomJobTrait;
use App\Events\ProcessNextFailedJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessNextFailedJobListner
{
    use CustomJobTrait;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProcessNextFailedJob  $event
     * @return void
     */
    public function handle(ProcessNextFailedJob $event)
    {
        $this->processFailedJob();
    }
}
