<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::with('event')->latest()->get();
        
        return view('admin.registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();
        
        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Registration deleted successfully.');
    }

    /**
     * Confirm registration
     */
    public function confirm(Registration $registration)
    {
        $registration->confirm(auth()->user());
        
        return redirect()->back()->with('success', 'Registration confirmed successfully.');
    }

    /**
     * Cancel registration
     */
    public function cancel(Registration $registration)
    {
        $registration->cancel();
        
        return redirect()->back()->with('success', 'Registration cancelled successfully.');
    }

    /**
     * Bulk confirm registrations
     */
    public function bulkConfirm(Request $request)
    {
        Registration::whereIn('id', $request->ids)->update(['status' => 'confirmed']);
        
        return response()->json(['success' => true]);
    }

    /**
     * Bulk cancel registrations
     */
    public function bulkCancel(Request $request)
    {
        Registration::whereIn('id', $request->ids)->update(['status' => 'cancelled']);
        
        return response()->json(['success' => true]);
    }
}
