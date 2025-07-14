<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class BreakingNews extends Component
{
    public $breakingNews = [];

    public function mount()
    {
        $this->loadBreakingNews();
    }

    public function loadBreakingNews()
    {
        $this->breakingNews = Article::where('is_breaking', true)
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.breaking-news');
    }
}
