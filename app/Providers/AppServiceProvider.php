<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Livewire\Admin\CategoriesManager;
use App\Livewire\Admin\VideosManager;
use App\Livewire\Admin\UsersManager;
use App\Livewire\Admin\ArticlesManager;
use App\Livewire\Admin\SettingsManager;
use App\Livewire\Admin\BackupManager;
use App\Livewire\Admin\TestComponent;
use App\Models\Article;
use App\Observers\ArticleObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Livewire Components
        Livewire::component('admin.dashboard', \App\Livewire\Admin\Dashboard::class);
        Livewire::component('admin.articles-manager', \App\Livewire\Admin\ArticlesManager::class);
        Livewire::component('admin.categories-manager', \App\Livewire\Admin\CategoriesManager::class);
        Livewire::component('admin.videos-manager', \App\Livewire\Admin\VideosManager::class);
        Livewire::component('admin.users-manager', \App\Livewire\Admin\UsersManager::class);
        Livewire::component('admin.settings-manager', \App\Livewire\Admin\SettingsManager::class);
        Livewire::component('admin.backup-manager', \App\Livewire\Admin\BackupManager::class);
        
        // New specific content type managers
        Livewire::component('admin.news-manager', \App\Livewire\Admin\NewsManager::class);
        Livewire::component('admin.reports-manager', \App\Livewire\Admin\ReportsManager::class);
        Livewire::component('admin.opinions-manager', \App\Livewire\Admin\OpinionsManager::class);
        Livewire::component('admin.infographics-manager', \App\Livewire\Admin\InfographicsManager::class);
        Livewire::component('admin.authors-manager', \App\Livewire\Admin\AuthorsManager::class);

        // تسجيل المكونات الجديدة للأقسام المخصصة
        Livewire::component('infographics-section', \App\Livewire\InfographicsSection::class);
        Livewire::component('poems-section', \App\Livewire\PoemsSection::class);
        Livewire::component('health-section', \App\Livewire\HealthSection::class);
        Livewire::component('greetings-section', \App\Livewire\GreetingsSection::class);
        Livewire::component('condolences-section', \App\Livewire\CondolencesSection::class);

        Article::observe(ArticleObserver::class);
    }
}
