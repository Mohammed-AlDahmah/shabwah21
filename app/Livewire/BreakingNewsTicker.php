<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;

class BreakingNewsTicker extends Component
{
    public function render()
    {
        $breakingNews = News::where('is_breaking', true)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
            
        return view('livewire.breaking-news-ticker', compact('breakingNews'));
    }
}