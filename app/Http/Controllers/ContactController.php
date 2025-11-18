<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSection;
use App\Models\Message;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $message = Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'unread',
        ]);

        // TODO: Send email notification to admin

        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
