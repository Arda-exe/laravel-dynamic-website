<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs.
     */
    public function index(Request $request): View
    {
        $categories = FaqCategory::orderBy('order')->get();

        $query = Faq::with('faqCategory');

        if ($request->has('category') && $request->category != '') {
            $query->where('faq_category_id', $request->category);
        }

        $faqs = $query->get()->groupBy('faq_category_id');

        return view('admin.faqs.index', compact('faqs', 'categories'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create(): View
    {
        $categories = FaqCategory::orderBy('order')->get();
        return view('admin.faqs.create', compact('categories'));
    }

    /**
     * Store a newly created FAQ.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'required|integer|min:0',
        ]);

        Faq::create([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order,
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit(Faq $faq): View
    {
        $categories = FaqCategory::orderBy('order')->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified FAQ.
     */
    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'required|integer|min:0',
        ]);

        $faq->update([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order,
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified FAQ.
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }
}
