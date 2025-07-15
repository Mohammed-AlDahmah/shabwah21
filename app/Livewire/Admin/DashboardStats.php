<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DashboardStats extends Component
{
    public $totalArticles;
    public $totalUsers;
    public $totalViews;
    public $totalComments;
    public $articlesCount;
    public $usersCount;
    public $categoriesCount;
    public $videosCount;

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        // هنا يمكنك إضافة الاستعلامات الفعلية لقاعدة البيانات
        // مثال:
        // $this->totalArticles = Article::count();
        // $this->totalUsers = User::count();
        // $this->totalViews = Article::sum('views');
        // $this->totalComments = Comment::count();
        
        // بيانات تجريبية للعرض
        $this->totalArticles = 247;
        $this->totalUsers = 1854;
        $this->totalViews = '45.2K';
        $this->totalComments = 892;
        
        // للتوافق مع العرض السابق
        $this->articlesCount = $this->totalArticles;
        $this->usersCount = $this->totalUsers;
        $this->categoriesCount = 24;
        $this->videosCount = 87;
    }

    public function render()
    {
        return view('livewire.admin.dashboard-stats');
    }
} 