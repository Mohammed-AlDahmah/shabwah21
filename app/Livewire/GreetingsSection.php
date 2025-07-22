<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;

class GreetingsSection extends Component
{
    public $greetings = [];
    public $category;

    public function mount()
    {
        $this->category = Category::where('slug', 'greetings')->first();
        if ($this->category) {
            $this->greetings = Article::where('category_id', $this->category->id)
                ->where('is_published', true)
                ->latest('published_at')
                ->take(4)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.greetings-section');
    }
} 