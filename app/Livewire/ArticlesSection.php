<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Facades\Cache;

class ArticlesSection extends Component
{
    public $articles = [];
    public $categories = [];

    public function mount()
    {
        $this->loadArticles();
        $this->loadCategories();
    }

    public function loadArticles()
    { 
        $this->articles = Cache::remember('articles_section', 600, function() {
            return Article::select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'views_count', 'category_id')
                ->with('category:id,name_ar,slug')
                ->where('is_published', true)
                ->where('type', 'article')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('views_count', 'desc')
                ->take(8)
                ->get();
        });
    }

    public function loadCategories()
    {
        $this->categories = Cache::remember('categories_section', 1800, function() {
            return Category::select('id', 'name_ar', 'slug', 'icon')
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->take(6)
                ->get();
        });
    }

    public function render()
    {
        return view('livewire.articles-section');
    }
}
