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
        $popularArticles = \Cache::remember('popular_articles', 600, function() {
            return \App\Models\Article::orderBy('views_count', 'desc')
                ->where('is_published', true)
                ->take(10)
                ->get();
        });
        return view('livewire.popular-articles', compact('popularArticles'));
    }
} 