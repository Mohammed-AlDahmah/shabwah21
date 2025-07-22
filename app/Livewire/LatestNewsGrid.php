<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class LatestNewsGrid extends Component
{
    public function render()
    {
        $latestNews = \Cache::remember('latest_articles_home', 120, function() {
            return \App\Models\Article::where('is_published', true)
                ->latest('published_at')
                ->take(12)
                ->get();
        });
        return view('livewire.latest-news-grid', compact('latestNews'));
    }
}