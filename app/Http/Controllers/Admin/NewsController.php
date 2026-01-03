<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $articles = NewsArticle::with('user')->latest()->paginate(15);
        return view('admin.news.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = auth()->id();
        $validated['published_at'] = $request->is_published ? now() : null;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        NewsArticle::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article created successfully.');
    }

    public function edit(NewsArticle $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, NewsArticle $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published_at'] = $request->is_published ? ($news->published_at ?? now()) : null;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully.');
    }

    public function destroy(NewsArticle $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News article deleted successfully.');
    }
}
