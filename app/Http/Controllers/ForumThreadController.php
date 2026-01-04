<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use App\Models\ForumThread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ForumThreadController extends Controller
{
    public function create(Request $request): View
    {
        $categorySlug = $request->query('category');
        $category = $categorySlug ? ForumCategory::where('slug', $categorySlug)->first() : null;
        $categories = ForumCategory::orderBy('order')->orderBy('name')->get();

        return view('forum.threads.create', compact('categories', 'category'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'forum_category_id' => 'required|exists:forum_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(8);

        $thread = ForumThread::create($validated);

        return redirect()->route('forum.threads.show', $thread->slug)
            ->with('success', 'Thread created successfully.');
    }

    public function show(string $slug): View
    {
        $thread = ForumThread::with(['user', 'category'])
            ->where('slug', $slug)
            ->firstOrFail();

        $replies = $thread->replies()
            ->with('user')
            ->latest()
            ->paginate(20);

        return view('forum.threads.show', compact('thread', 'replies'));
    }

    public function edit(ForumThread $thread): View
    {
        $this->authorize('update', $thread);

        $categories = ForumCategory::orderBy('order')->orderBy('name')->get();

        return view('forum.threads.edit', compact('thread', 'categories'));
    }

    public function update(Request $request, ForumThread $thread): RedirectResponse
    {
        $this->authorize('update', $thread);

        $validated = $request->validate([
            'forum_category_id' => 'required|exists:forum_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);

        $thread->update($validated);

        return redirect()->route('forum.threads.show', $thread->slug)
            ->with('success', 'Thread updated successfully.');
    }

    public function destroy(ForumThread $thread): RedirectResponse
    {
        $this->authorize('delete', $thread);

        $categorySlug = $thread->category->slug;
        $thread->delete();

        return redirect()->route('forum.category.show', $categorySlug)
            ->with('success', 'Thread deleted successfully.');
    }
}
