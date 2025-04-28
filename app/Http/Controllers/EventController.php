<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_attendees' => 'required|integer|min:1',
        ]);

        Event::create([
            'name' => $request->name,
            'max_attendees' => $request->max_attendees,
            'attendees_count' => 0,
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id); // Find the event by its ID
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_attendees' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($id);
        $event->update([
            'name' => $request->name,
            'max_attendees' => $request->max_attendees,
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
{
    $event = Event::findOrFail($id);

    $event->delete();

    return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
}

}
