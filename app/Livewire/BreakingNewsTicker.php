<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class BreakingNewsTicker extends Component
{
    public function render()
    {
        $breakingNews = Article::where('is_breaking', true)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
            
        return view('livewire.breaking-news-ticker', compact('breakingNews'));
    }
}