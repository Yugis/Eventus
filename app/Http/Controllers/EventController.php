<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index', ['events' => Event::latest()->get()]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);

        auth()->user()->events()->create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect(route('events.index'));
    }

    public function show(Event $event)
    {
        return view('events.show', ['event' => $event->load('registrants')]);
    }

    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('events.index'));
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect(route('events.index'));
    }
}
