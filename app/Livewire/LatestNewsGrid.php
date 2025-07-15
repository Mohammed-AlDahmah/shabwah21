<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;

class LatestNewsGrid extends Component
{
    public function render()
    {
        $latestNews = News::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
            
        return view('livewire.latest-news-grid', compact('latestNews'));
    }
}