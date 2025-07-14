<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class LatestNews extends Component
{
    public $latestNews = [];

    public function mount()
    {
        $this->loadLatestNews();
    }

    public function loadLatestNews()
    {
        $this->latestNews = Article::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(12)
            ->get();
    }

    public function render()
    {
        return view('livewire.latest-news');
    }
}
