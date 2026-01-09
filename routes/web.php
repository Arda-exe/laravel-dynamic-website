<?php

use App\Http\Controllers\Admin\ContactSubmissionController as AdminContactSubmissionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FaqCategoryController as AdminFaqCategoryController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForumCategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ForumReplyController;
use App\Http\Controllers\ForumThreadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Public News Routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Public FAQ Route
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Public Contact Routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Public Profile Route
Route::get('/user/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Public Forum Routes
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/category/{slug}', [ForumCategoryController::class, 'show'])->name('forum.category.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Comment Routes
    Route::post('/news/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Forum Thread Routes
    Route::get('/forum/threads/create', [ForumThreadController::class, 'create'])->name('forum.threads.create');
    Route::post('/forum/threads', [ForumThreadController::class, 'store'])->name('forum.threads.store');
    Route::get('/forum/threads/{thread}/edit', [ForumThreadController::class, 'edit'])->name('forum.threads.edit');
    Route::get('/forum/threads/{thread}', [ForumThreadController::class, 'show'])->name('forum.threads.show');
    Route::patch('/forum/threads/{thread}', [ForumThreadController::class, 'update'])->name('forum.threads.update');
    Route::delete('/forum/threads/{thread}', [ForumThreadController::class, 'destroy'])->name('forum.threads.destroy');
    Route::post('/forum/threads/{thread}/toggle-pin', [ForumThreadController::class, 'togglePin'])->name('forum.threads.togglePin');

    // Forum Reply Routes
    Route::post('/forum/threads/{thread}/replies', [ForumReplyController::class, 'store'])->name('forum.replies.store');
    Route::delete('/forum/replies/{reply}', [ForumReplyController::class, 'destroy'])->name('forum.replies.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('news', AdminNewsController::class);

    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    Route::resource('faq-categories', AdminFaqCategoryController::class);
    Route::resource('faqs', AdminFaqController::class);

    Route::get('/contact-submissions', [AdminContactSubmissionController::class, 'index'])->name('contact-submissions.index');
    Route::get('/contact-submissions/{contactSubmission}', [AdminContactSubmissionController::class, 'show'])->name('contact-submissions.show');
    Route::delete('/contact-submissions/{contactSubmission}', [AdminContactSubmissionController::class, 'destroy'])->name('contact-submissions.destroy');
});

require __DIR__.'/auth.php';
