<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $totalArticles = 0;
    public $publishedArticles = 0;
    public $totalViews = 0;
    public $totalCategories = 0;
    public $articlesGrowth = 0;
    public $publishedGrowth = 0;
    public $viewsGrowth = 0;
    public $recentArticles = [];
    public $popularCategories = [];

    protected $listeners = [
        'articleDeleted' => 'loadStats',
        'articleCreated' => 'loadStats',
        'articleUpdated' => 'loadStats',
        'categoryDeleted' => 'loadStats',
        'categoryCreated' => 'loadStats',
        'categoryUpdated' => 'loadStats',
    ];

    public function mount()
    {
        $this->loadStats();
        $this->loadRecentArticles();
        $this->loadPopularCategories();
    }

    public function loadStats()
    {
        // Total Articles
        $this->totalArticles = Article::count();
        
        // Published Articles
        $this->publishedArticles = Article::where('is_published', true)->count();
        
        // Total Views
        $this->totalViews = Article::sum('views_count');
        
        // Total Categories
        $this->totalCategories = Category::count();
        
        // Growth Calculations
        $this->calculateGrowth();
    }

    public function calculateGrowth()
    {
        $now = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();
        
        // Articles Growth
        $currentMonthArticles = Article::whereMonth('created_at', $now->month)->count();
        $lastMonthArticles = Article::whereMonth('created_at', $lastMonth->month)->count();
        $this->articlesGrowth = $lastMonthArticles > 0 ? round((($currentMonthArticles - $lastMonthArticles) / $lastMonthArticles) * 100, 1) : 0;
        
        // Published Articles Growth
        $currentMonthPublished = Article::where('is_published', true)->whereMonth('created_at', $now->month)->count();
        $lastMonthPublished = Article::where('is_published', true)->whereMonth('created_at', $lastMonth->month)->count();
        $this->publishedGrowth = $lastMonthPublished > 0 ? round((($currentMonthPublished - $lastMonthPublished) / $lastMonthPublished) * 100, 1) : 0;
        
        // Views Growth
        $currentMonthViews = Article::whereMonth('created_at', $now->month)->sum('views_count');
        $lastMonthViews = Article::whereMonth('created_at', $lastMonth->month)->sum('views_count');
        $this->viewsGrowth = $lastMonthViews > 0 ? round((($currentMonthViews - $lastMonthViews) / $lastMonthViews) * 100, 1) : 0;
    }

    public function loadRecentArticles()
    {
        $this->recentArticles = Article::with('category')
            ->latest('created_at')
            ->take(5)
            ->get();
    }

    public function loadPopularCategories()
    {
        $categories = Category::withCount('articles')->get();
        $totalArticles = $categories->sum('articles_count');
        
        $this->popularCategories = $categories->map(function ($category) use ($totalArticles) {
            $category->percentage = $totalArticles > 0 ? round(($category->articles_count / $totalArticles) * 100, 1) : 0;
            return $category;
        })->sortByDesc('articles_count')->take(5);
    }

    public function deleteArticle($articleId)
    {
        $article = Article::find($articleId);
        
        if ($article) {
            $article->delete();
            $this->loadStats();
            $this->loadRecentArticles();
            
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحذف بنجاح',
                'message' => 'تم حذف المقال بنجاح'
            ]);
        } else {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ',
                'message' => 'لم يتم العثور على المقال'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
