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
        // Get settings from database using correct keys
        $contactData = (object) [
            'address' => setting('contact_address', '120 Main Street, City, Country'),
            'email' => setting('contact_email', 'info@example.com'),
            'phone' => setting('contact_phone', '+1 234 567 890'),
            'map_embed' => setting('contact_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127065.05676088775!2d11.451049671874998!3d3.8689867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf7a309a7977%3A0x7f54bad35e693c51!2sYaound%C3%A9%2C%20Cameroon!5e0!3m2!1sen!2sus!4v1706886000000!5m2!1sen!2sus'),
            'working_hours' => setting('business_hours', 'Mon - Fri: 8:00 AM - 6:00 PM'),
        ];

        $stats = [
            'projects' => setting('happy_families', '2'),
        ];

        return view('pages.contact', compact('contactData', 'stats'));
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
