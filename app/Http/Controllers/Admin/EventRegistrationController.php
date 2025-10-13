<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventRegistrationController extends Controller
{
    public function index(): View
    {
        $registrations = EventRegistration::with('event')->latest()->paginate(20);
        return view('admin.registrations.index', compact('registrations'));
    }

    public function pending(): View
    {
        $registrations = EventRegistration::with('event')->pending()->latest()->paginate(20);
        return view('admin.registrations.pending', compact('registrations'));
    }

    public function show(EventRegistration $registration): View
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function confirm(EventRegistration $registration): RedirectResponse
    {
        $registration->confirm(Auth::user());

        return redirect()->back()->with('success', 'Registration confirmed successfully.');
    }

    public function cancel(EventRegistration $registration): RedirectResponse
    {
        $registration->cancel();

        return redirect()->back()->with('success', 'Registration cancelled.');
    }

    public function destroy(EventRegistration $registration): RedirectResponse
    {
        $registration->delete();

        return redirect()->back()->with('success', 'Registration deleted.');
    }

    public function updateNotes(Request $request, EventRegistration $registration): RedirectResponse
    {
        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $registration->update(['admin_notes' => $request->input('admin_notes')]);

        return redirect()->back()->with('success', 'Notes updated successfully.');
    }
}
