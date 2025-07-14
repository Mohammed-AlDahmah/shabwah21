<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class PopularArticles extends Component
{
    public $limit = 5;

    public function mount($limit = 5)
    {
        $this->limit = $limit;
    }

    public function render()
    {
        $popularArticles = Article::with('category')
            ->where('is_published', true)
            ->orderBy('views_count', 'desc')
            ->limit($this->limit)
            ->get();

        return view('livewire.popular-articles', compact('popularArticles'));
    }
} 