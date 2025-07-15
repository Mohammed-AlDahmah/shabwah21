<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class BreakingNews extends Component
{
    public function render()
    {
        $breakingNews = Article::where('is_breaking', true)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('livewire.breaking-news', compact('breakingNews'));
    }
}
