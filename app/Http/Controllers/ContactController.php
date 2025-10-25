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
        $pageSections = all_page_sections('contact');

        // Get contact info from page sections
        $contactInfo = $pageSections['info'] ?? collect();

        return view('pages.contact', compact('pageSections', 'contactInfo'));
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
