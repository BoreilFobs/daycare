<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::latest()->get();
        
        return view('admin.messages.index', compact('messages'));
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
    public function show(Message $message)
    {
        $message->markAsRead(auth()->user());
        
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        
        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }

    /**
     * Mark message as read
     */
    public function markRead(Message $message)
    {
        $message->markAsRead(auth()->user());
        
        return response()->json(['success' => true]);
    }

    /**
     * Mark message as unread
     */
    public function markUnread(Message $message)
    {
        $message->markAsUnread();
        
        return response()->json(['success' => true]);
    }
}
