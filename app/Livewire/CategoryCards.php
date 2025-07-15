<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryCards extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->take(8)
            ->get();
            
        return view('livewire.category-cards', compact('categories'));
    }
}