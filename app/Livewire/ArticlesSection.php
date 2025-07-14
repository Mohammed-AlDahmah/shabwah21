<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;

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
        $this->articles = Article::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('views_count', 'desc')
            ->take(8)
            ->get();
    }

    public function loadCategories()
    {
        $this->categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.articles-section');
    }
}
