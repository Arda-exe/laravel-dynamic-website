<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ContactSubmission;
use App\Models\Faq;
use App\Models\FaqCategory;
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
            'total_faqs' => Faq::count(),
            'total_faq_categories' => FaqCategory::count(),
            'unread_contacts' => ContactSubmission::where('is_read', false)->count(),
        ];

        // Recent users (last 5)
        $recent_users = User::latest()->take(5)->get();

        // Recent news articles (last 5)
        $recent_news = NewsArticle::with('user')->latest()->take(5)->get();

        // Recent contact submissions (last 5)
        $recent_contacts = ContactSubmission::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_users', 'recent_news', 'recent_contacts'));
    }
}
