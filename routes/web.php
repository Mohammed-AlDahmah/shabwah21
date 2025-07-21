<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ArticlesManager;
use App\Livewire\Admin\CategoriesManager;
use App\Livewire\Admin\VideosManager;
use App\Livewire\Admin\UsersManager;
use App\Livewire\Admin\SettingsManager;
use App\Livewire\Admin\BackupManager;
use App\Livewire\Admin\AdminHome;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect login to admin login
Route::redirect('/login', '/admin/login');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

// News routes
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/search', [NewsController::class, 'search'])->name('search');
    Route::get('/category/{category:slug}', [NewsController::class, 'category'])->name('category');
    Route::get('/{article:slug}', [NewsController::class, 'show'])->name('show');
});

// Videos routes
Route::prefix('videos')->name('videos.')->group(function () {
    Route::get('/', function () {
        return view('videos.index');
    })->name('index');
    Route::get('/{video:slug}', function () {
        return view('videos.show');
    })->name('show');
});

// Pages routes
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

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/news', function () {
        return view('admin.news');
    })->name('admin.news');
    
    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');
    
    Route::get('/opinions', function () {
        return view('admin.opinions');
    })->name('admin.opinions');
    
    Route::get('/infographics', function () {
        return view('admin.infographics');
    })->name('admin.infographics');
    
    Route::get('/articles', function () {
        return view('admin.articles');
    })->name('admin.articles');
    
    Route::get('/authors', function () {
        return view('admin.authors');
    })->name('admin.authors');
    Route::get('/categories', function () {
        return view('admin.categories');
    })->name('admin.categories');
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
    Route::get('/videos', VideosManager::class)->name('admin.videos');
    
    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
    
    Route::get('/backup', function () {
        return view('admin.backup');
    })->name('admin.backup');
    
    Route::get('/roles', function () {
        return view('admin.roles');
    })->name('admin.roles');
});