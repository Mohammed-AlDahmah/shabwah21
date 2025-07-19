<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\NewsManager;

Route::get('/', function () {
    return view('livewire.homepage');
})->name('home');
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// News routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/category/{slug}', [NewsController::class, 'category'])->name('news.category');

// Legacy routes for backward compatibility
Route::get('/article/{slug}', [NewsController::class, 'show'])->name('article.show');
Route::get('/category/{slug}', [NewsController::class, 'category'])->name('category.show');

// Video routes
Route::get('/videos', [NewsController::class, 'videos'])->name('videos.index');
Route::get('/videos/{slug}', [NewsController::class, 'video'])->name('videos.show');

Route::get('/search', [NewsController::class, 'search'])->name('news.search');

// Static pages
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/login', Login::class)->name('login');
Route::post('/login', Login::class); // This handles the form submission

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    // Other admin routes
});

  

 
// Remove duplicate routes - these are already defined above

Route::get('/english-news', function () {
    return view('english-news-page');
})->name('english.news');

Route::get('/articles', function () {
    return view('articles-index');
})->name('articles.index');

// Livewire component route (if you want to test the header in isolation)
// Route::livewire('/header-test', Header::class);