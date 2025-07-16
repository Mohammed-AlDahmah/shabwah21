<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class LatestNewsGrid extends Component
{
    public function render()
    {
        $latestNews = Article::published()
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();
            
        return view('livewire.latest-news-grid', compact('latestNews'));
    }
}