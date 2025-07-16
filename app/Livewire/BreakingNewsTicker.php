<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class BreakingNewsTicker extends Component
{
    public function render()
    {
        $breakingNews = Article::published()
            ->breaking()
            ->with(['category'])
            ->latest('published_at')
            ->take(10)
            ->get();
            
        return view('livewire.breaking-news-ticker', compact('breakingNews'));
    }
}