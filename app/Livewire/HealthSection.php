<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;

class HealthSection extends Component
{
    public $healthArticles = [];
    public $category;

    public function mount()
    {
        $this->category = Category::where('slug', 'health')->first();
        if ($this->category) {
            $this->healthArticles = Article::where('category_id', $this->category->id)
                ->where('is_published', true)
                ->latest('published_at')
                ->take(4)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.health-section');
    }
} 