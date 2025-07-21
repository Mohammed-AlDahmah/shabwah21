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

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    });

    // Protected routes
    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        // Test component
        Route::get('/test', function () {
            return view('admin.test');
        })->name('test');
        
        // Articles management
        Route::get('/articles', function () {
            return view('admin.articles');
        })->name('articles.index');
        
        // Categories management
        Route::get('/categories', function () {
            return view('admin.categories');
        })->name('categories.index');
        
        // Videos management
        Route::get('/videos', function () {
            return view('admin.videos');
        })->name('videos.index');
        
        // Users management
        Route::get('/users', function () {
            return view('admin.users');
        })->name('users.index');
        
        // Settings
        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('settings.index');
        
        // Backup
        Route::get('/backup', function () {
            return view('admin.backup');
        })->name('backup.index');
        Route::get('/backup/download/{path}', [AdminController::class, 'downloadBackup'])->name('backup.download');
        
        // Roles (placeholder)
        Route::get('/roles', function () {
            return view('admin.roles.index');
        })->name('roles.index');
        
        // Logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});