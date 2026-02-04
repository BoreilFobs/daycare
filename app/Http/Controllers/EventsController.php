<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\PageSection;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'upcoming');

        $query = Event::where('is_active', true);

        if ($filter === 'upcoming') {
            $query->where('event_date', '>=', now()->toDateString());
        } elseif ($filter === 'past') {
            $query->where('event_date', '<', now()->toDateString());
        }

        $events = $query->orderBy('event_date', 'asc')
            ->orderBy('start_time', 'asc')
            ->paginate(9);

        $upcomingCount = Event::where('is_active', true)
            ->where('event_date', '>=', now()->toDateString())
            ->count();

        $pastCount = Event::where('is_active', true)
            ->where('event_date', '<', now()->toDateString())
            ->count();

        return view('pages.events', compact('events', 'filter', 'upcomingCount', 'pastCount'));
    }

    public function show($id)
    {
        $event = Event::where('is_active', true)->findOrFail($id);

        $registrationsCount = $event->registrations()
            ->where('status', 'confirmed')
            ->count();

        $availableSpots = $event->max_attendees ? ($event->max_attendees - $registrationsCount) : null;

        $upcomingEvents = Event::where('is_active', true)
            ->where('id', '!=', $event->id)
            ->where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('pages.event-detail', compact('event', 'registrationsCount', 'availableSpots', 'upcomingEvents'));
    }

    public function register(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'attendees' => 'required|integer|min:1|max:10',
        ]);

        EventRegistration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'attendees' => $validated['attendees'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Registration successful! We will contact you shortly with confirmation details.');
    }
}
