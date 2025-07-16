<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Article;
use Livewire\Component;

class CategorySection extends Component
{
    public function render()
    {
        $categories = Category::active()
            ->withCount(['articles' => function($query) {
                $query->published();
            }])
            ->having('articles_count', '>', 0)
            ->take(6)
            ->get();

        return view('livewire.category-section', compact('categories'));
    }
} 