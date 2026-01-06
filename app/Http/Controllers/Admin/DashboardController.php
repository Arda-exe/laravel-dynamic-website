<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ContactSubmission;
use App\Models\ForumReply;
use App\Models\ForumThread;
use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_users' => User::count(),
            'total_news' => NewsArticle::count(),
            'published_news' => NewsArticle::whereNotNull('published_at')->count(),
            'total_comments' => Comment::count(),
            'total_threads' => ForumThread::count(),
            'total_replies' => ForumReply::count(),
        ];

        $recent_users = User::latest()->take(5)->get();
        $recent_news = NewsArticle::with('user')->latest()->take(5)->get();
        $recent_threads = ForumThread::with(['user', 'category'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_users', 'recent_news', 'recent_threads'));
    }
}
