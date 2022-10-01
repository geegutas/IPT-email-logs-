<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserLog;
use App\Models\log;

class LogListener
{
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserLog $event)
    {
        log::create([
            'user_id'   => auth()->user()->id,
            'log_entry' => $event->log_entry
        ]);
    }
}