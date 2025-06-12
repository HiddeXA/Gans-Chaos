<?php

namespace App\Listeners;

use IlluminateAuthEventsLogout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ResetPlayerOnLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(IlluminateAuthEventsLogout $event): void
    {
        $event->user->resetLobbyArgs();
    }
}
