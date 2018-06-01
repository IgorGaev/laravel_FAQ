<?php

namespace Faq\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use PDO;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Faq\Events\Event' => [
            'Faq\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
    
    //FETCH_ASSOC вкл.
//    public function boot()
//    {
//        parent::boot();
//
//        Event::listen('Illuminate\Database\Events\StatementPrepared', function ($event) {
//
//            $event->statement->setFetchMode(PDO::FETCH_ASSOC);
//
//        });
//
//    }
}
