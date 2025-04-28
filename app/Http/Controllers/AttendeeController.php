<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function create()
    {
        $events = Event::all();
        return view('attendees.register', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $event = Event::find($request->event_id);

        if ($event->attendees_count >= $event->max_attendees) {
            return redirect()->back()->with('error', 'Event is fully booked.');
        }

        Attendee::create([
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $event->increment('attendees_count');

        return redirect()->back()->with('success', 'Registration successful!');
    }
}
