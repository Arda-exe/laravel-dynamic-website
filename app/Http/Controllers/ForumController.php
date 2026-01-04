<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use Illuminate\View\View;

class ForumController extends Controller
{
    public function index(): View
    {
        $categories = ForumCategory::withCount('threads')
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return view('forum.index', compact('categories'));
    }
}
