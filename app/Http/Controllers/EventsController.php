<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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

        $relatedEvents = Event::where('is_active', true)
            ->where('id', '!=', $event->id)
            ->where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('pages.event-detail', compact('event', 'registrationsCount', 'availableSpots', 'relatedEvents'));
    }
}
