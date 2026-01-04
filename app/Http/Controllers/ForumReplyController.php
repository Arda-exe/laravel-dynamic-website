<?php

namespace App\Http\Controllers;

use App\Models\ForumReply;
use App\Models\ForumThread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ForumReplyController extends Controller
{
    public function store(Request $request, ForumThread $thread): RedirectResponse
    {
        if ($thread->is_locked) {
            return back()->with('error', 'This thread is locked.');
        }

        $validated = $request->validate([
            'content' => 'required|string|max:5000',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['forum_thread_id'] = $thread->id;

        ForumReply::create($validated);

        return redirect()->route('forum.threads.show', $thread)
            ->with('success', 'Reply posted successfully.');
    }

    public function destroy(ForumReply $reply): RedirectResponse
    {
        $this->authorize('delete', $reply);

        $thread = $reply->thread;
        $reply->delete();

        return redirect()->route('forum.threads.show', $thread)
            ->with('success', 'Reply deleted successfully.');
    }
}
