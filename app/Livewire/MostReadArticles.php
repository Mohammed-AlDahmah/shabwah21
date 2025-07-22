<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class MostReadArticles extends Component
{
    public function render()
    {
        $mostReadArticles = \Cache::remember('most_read_articles', 600, function() {
            return \App\Models\Article::orderBy('views_count', 'desc')
                ->where('is_published', true)
                ->take(8)
                ->get();
        });
        return view('livewire.most-read-articles', compact('mostReadArticles'));
    }
}