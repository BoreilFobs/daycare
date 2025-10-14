<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('blogPost')->latest()->get();
        
        return view('admin.comments.index', compact('comments'));
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
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return redirect()
            ->route('admin.comments.index')
            ->with('success', 'Comment deleted successfully.');
    }

    /**
     * Approve comment
     */
    public function approve(Comment $comment)
    {
        $comment->approve(auth()->user());
        
        return redirect()->back()->with('success', 'Comment approved successfully.');
    }

    /**
     * Reject comment
     */
    public function markAsSpam(Comment $comment)
    {
        $comment->reject();
        
        return redirect()->back()->with('success', 'Comment rejected.');
    }

    /**
     * Bulk approve comments
     */
    public function bulkApprove(Request $request)
    {
        Comment::whereIn('id', $request->ids)->update(['status' => 'approved', 'approved_at' => now()]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Bulk delete comments
     */
    public function bulkDelete(Request $request)
    {
        Comment::whereIn('id', $request->ids)->delete();
        
        return response()->json(['success' => true]);
    }
}
