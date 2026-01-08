<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\NewsArticle;
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

    public function store(StoreNewsRequest $request)
    {
        $validated = $request->validated();

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
        return view('admin.news.edit', ['article' => $news]);
    }

    public function update(UpdateNewsRequest $request, NewsArticle $news)
    {
        $validated = $request->validated();

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
        // Delete associated image if it exists
        if ($news->image) {
            \Storage::disk('public')->delete($news->image);
        }

        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News article deleted successfully.');
    }
}
