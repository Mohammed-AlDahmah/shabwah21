<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;

class DashboardStats extends Component
{
    public function render()
    {
        $articlesCount = Article::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        $videosCount = Video::count();
        return view('livewire.admin.dashboard-stats', compact('articlesCount', 'categoriesCount', 'usersCount', 'videosCount'));
    }
} 