<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogCommentController extends Controller
{
    public function index(): View
    {
        $comments = BlogComment::with(['blogPost', 'parent'])
            ->latest()
            ->paginate(20);
            
        return view('admin.comments.index', compact('comments'));
    }

    public function pending(): View
    {
        $comments = BlogComment::with(['blogPost', 'parent'])
            ->pending()
            ->latest()
            ->paginate(20);
            
        return view('admin.comments.pending', compact('comments'));
    }

    public function approve(BlogComment $comment): RedirectResponse
    {
        $comment->approve(Auth::user());

        return redirect()
            ->back()
            ->with('success', 'Comment approved successfully.');
    }

    public function reject(BlogComment $comment): RedirectResponse
    {
        $comment->reject();

        return redirect()
            ->back()
            ->with('success', 'Comment rejected successfully.');
    }

    public function destroy(BlogComment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()
            ->back()
            ->with('success', 'Comment deleted successfully.');
    }

    public function bulkApprove(Request $request): RedirectResponse
    {
        $ids = $request->input('comment_ids', []);
        
        BlogComment::whereIn('id', $ids)->each(function ($comment) {
            $comment->approve(Auth::user());
        });

        return redirect()
            ->back()
            ->with('success', count($ids) . ' comments approved successfully.');
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $ids = $request->input('comment_ids', []);
        BlogComment::whereIn('id', $ids)->delete();

        return redirect()
            ->back()
            ->with('success', count($ids) . ' comments deleted successfully.');
    }
}
