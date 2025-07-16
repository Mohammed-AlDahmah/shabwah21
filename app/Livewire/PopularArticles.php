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
        $popularArticles = Article::published()
            ->with(['category'])
            ->orderBy('views_count', 'desc')
            ->take($this->limit)
            ->get();

        return view('livewire.popular-articles', compact('popularArticles'));
    }
} 