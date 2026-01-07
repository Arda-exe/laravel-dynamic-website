<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles.
     */
    public function index(): View
    {
        $articles = NewsArticle::with('user')
            ->published()
            ->latest()
            ->paginate(10);

        return view('news.index', compact('articles'));
    }

    /**
     * Display the specified news article.
     */
    public function show(string $slug): View
    {
        $article = NewsArticle::with('user')
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $comments = $article->comments()
            ->with('user')
            ->latest()
            ->paginate(20);

        return view('news.show', compact('article', 'comments'));
    }
}
