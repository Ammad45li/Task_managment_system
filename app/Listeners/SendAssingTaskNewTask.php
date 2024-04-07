<?php

namespace App\Listeners;

use App\Events\AssingTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAssingTaskNewTask
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
    public function handle(AssingTask $event): void
    {
        
    }
}
