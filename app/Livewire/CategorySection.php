<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Article;
use Livewire\Component;

class CategorySection extends Component
{
    public $categorySlug;
    public $limit = 4;
    public $showTitle = true;
    public $showViewAll = true;

    public function mount($categorySlug = null, $limit = 4, $showTitle = true, $showViewAll = true)
    {
        $this->categorySlug = $categorySlug;
        $this->limit = $limit;
        $this->showTitle = $showTitle;
        $this->showViewAll = $showViewAll;
    }

    public function render()
    {
        $category = Category::where('slug', $this->categorySlug)
            ->where('is_active', true)
            ->first();

        if (!$category) {
            return view('livewire.empty-section');
        }

        $articles = Article::with('category')
            ->where('is_published', true)
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->limit($this->limit)
            ->get();

        return view('livewire.category-section', compact('category', 'articles'));
    }
} 