<?php

namespace App\Http\Controllers;

use App\Models\ForumThread;
use App\Models\NewsArticle;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $latest_news = NewsArticle::with('user')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();

        $latest_threads = ForumThread::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get();

        return view('home', compact('latest_news', 'latest_threads'));
    }
}
