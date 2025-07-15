<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;

class MostReadArticles extends Component
{
    public function render()
    {
        $mostReadArticles = News::where('is_published', true)
            ->orderBy('views_count', 'desc')
            ->take(5)
            ->get();
            
        return view('livewire.most-read-articles', compact('mostReadArticles'));
    }
}