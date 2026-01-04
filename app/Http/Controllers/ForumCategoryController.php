<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use Illuminate\View\View;

class ForumCategoryController extends Controller
{
    public function show(string $slug): View
    {
        $category = ForumCategory::where('slug', $slug)->firstOrFail();

        $threads = $category->threads()
            ->with(['user', 'replies'])
            ->withCount('replies')
            ->orderBy('is_pinned', 'desc')
            ->latest()
            ->paginate(15);

        return view('forum.category', compact('category', 'threads'));
    }
}
