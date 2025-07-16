<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryCards extends Component
{
    public function render()
    {
        $categories = Category::active()
            ->withCount(['articles' => function($query) {
                $query->published();
            }])
            ->having('articles_count', '>', 0)
            ->take(5)
            ->get();
            
        return view('livewire.category-cards', compact('categories'));
    }
}