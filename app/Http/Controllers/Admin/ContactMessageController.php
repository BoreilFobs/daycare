<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function unread(): View
    {
        $messages = ContactMessage::unread()->latest()->paginate(20);
        return view('admin.messages.unread', compact('messages'));
    }

    public function show(ContactMessage $message): View
    {
        // Mark as read when viewed
        if ($message->isUnread) {
            $message->markAsRead(Auth::user());
        }

        return view('admin.messages.show', compact('message'));
    }

    public function markAsRead(ContactMessage $message): RedirectResponse
    {
        $message->markAsRead(Auth::user());

        return redirect()->back()->with('success', 'Message marked as read.');
    }

    public function markAsReplied(ContactMessage $message): RedirectResponse
    {
        $message->markAsReplied();

        return redirect()->back()->with('success', 'Message marked as replied.');
    }

    public function archive(ContactMessage $message): RedirectResponse
    {
        $message->archive();

        return redirect()->back()->with('success', 'Message archived.');
    }

    public function destroy(ContactMessage $message): RedirectResponse
    {
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted.');
    }

    public function updateNotes(Request $request, ContactMessage $message): RedirectResponse
    {
        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $message->update(['admin_notes' => $request->input('admin_notes')]);

        return redirect()->back()->with('success', 'Notes updated successfully.');
    }
}
