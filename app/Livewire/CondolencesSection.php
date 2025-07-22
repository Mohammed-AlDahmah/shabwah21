<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;

class CondolencesSection extends Component
{
    public $condolences = [];
    public $category;

    public function mount()
    {
        $this->category = Category::where('slug', 'condolences')->first();
        if ($this->category) {
            $this->condolences = Article::where('category_id', $this->category->id)
                ->where('is_published', true)
                ->latest('published_at')
                ->take(4)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.condolences-section');
    }
} 