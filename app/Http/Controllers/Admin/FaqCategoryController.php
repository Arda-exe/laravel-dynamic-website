<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of FAQ categories.
     */
    public function index(): View
    {
        $categories = FaqCategory::withCount('faqs')->orderBy('order')->get();
        return view('admin.faq-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new FAQ category.
     */
    public function create(): View
    {
        $nextOrder = FaqCategory::max('order') + 1;
        return view('admin.faq-categories.create', compact('nextOrder'));
    }

    /**
     * Store a newly created FAQ category.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'order' => 'required|integer|min:0',
        ]);

        FaqCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'order' => $request->order,
        ]);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'FAQ category created successfully.');
    }

    /**
     * Show the form for editing the specified FAQ category.
     */
    public function edit(FaqCategory $faqCategory): View
    {
        $faqCategory->loadCount('faqs');
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }

    /**
     * Update the specified FAQ category.
     */
    public function update(Request $request, FaqCategory $faqCategory): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'order' => 'required|integer|min:0',
        ]);

        $faqCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'order' => $request->order,
        ]);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'FAQ category updated successfully.');
    }

    /**
     * Remove the specified FAQ category.
     */
    public function destroy(FaqCategory $faqCategory): RedirectResponse
    {
        // Prevent deletion if category has FAQs
        if ($faqCategory->faqs()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete category that contains FAQs. Please delete or reassign the FAQs first.');
        }

        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'FAQ category deleted successfully.');
    }
}
