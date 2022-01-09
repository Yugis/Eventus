<?php

namespace App\Http\Controllers;

use App\Mail\RegisteredInEvent;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventRegistrationController extends Controller
{
    public function store(Event $event)
    {
        EventRegistration::create([
            'event_id' => $event->id,
            'user_id' => auth()->id()
        ]);

        Mail::to(auth()->user())
        ->queue(new RegisteredInEvent($event));

        return redirect(route('events.show', ['event' => $event]));
    }
}
