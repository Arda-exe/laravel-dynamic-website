<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\NewsArticle;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, NewsArticle $article)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $article->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('news.show', $article->slug)
            ->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $articleSlug = $comment->newsArticle->slug;
        $comment->delete();

        return redirect()->route('news.show', $articleSlug)
            ->with('success', 'Comment deleted successfully.');
    }
}
