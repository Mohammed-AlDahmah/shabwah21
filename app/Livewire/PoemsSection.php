<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;

class PoemsSection extends Component
{
    public $poems = [];
    public $category;

    public function mount()
    {
        $this->category = Category::where('slug', 'poems')->first();
        if ($this->category) {
            $this->poems = Article::where('category_id', $this->category->id)
                ->where('is_published', true)
                ->latest('published_at')
                ->take(4)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.poems-section');
    }
} 