<?php

namespace App\Listeners;

use App\Events\CodeFound;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddHistory
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
     * @param  CodeFound  $event
     * @return void
     */
    public function handle(CodeFound $event)
    {
        $code = $event->code;
        $code->history()->create(['ip' => request()->ip()]);
    }
}
