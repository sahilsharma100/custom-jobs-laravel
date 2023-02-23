<?php

namespace App\Listeners;

use App\Events\ProcessNextJob;
use App\Http\Traits\CustomJobTrait;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessNextJobListner
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
     * @param  \App\Events\ProcessNextJob  $event
     * @return void
     */
    public function handle(ProcessNextJob $event)
    {
        // CustomJob::truncate();
        $this->getDataFromQueueAndProcess();
    }
}
