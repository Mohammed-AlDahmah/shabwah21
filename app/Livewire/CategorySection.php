<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Article;
use Livewire\Component;

class CategorySection extends Component
{
    public function render()
    {
        $categories = Category::select('id', 'name_ar', 'slug', 'icon')
            ->where('is_active', true)
            ->take(6)
            ->get();

        return view('livewire.category-section', compact('categories'));
    }
} 