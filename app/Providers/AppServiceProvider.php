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
        // Register Livewire components
        Livewire::component('admin.categories-manager', CategoriesManager::class);
        Livewire::component('admin.videos-manager', VideosManager::class);
        Livewire::component('admin.users-manager', UsersManager::class);
        Livewire::component('admin.articles-manager', ArticlesManager::class);
        Livewire::component('admin.settings-manager', SettingsManager::class);
        Livewire::component('admin.backup-manager', BackupManager::class);
        Livewire::component('admin.test-component', TestComponent::class);
    }
}
