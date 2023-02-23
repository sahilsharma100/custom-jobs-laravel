<?php

namespace App\Providers;

use App\Events\ProcessNextJob;
use App\Events\ProcessNextFailedJob;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ProcessNextJobListner;
use App\Listeners\ProcessNextFailedJobListner;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            ProcessNextJob::class,
            [ProcessNextJobListner::class, 'handle']
        );

        Event::listen(
            ProcessNextFailedJob::class,
            [ProcessNextFailedJobListner::class, 'handle']
        );
    }
}
