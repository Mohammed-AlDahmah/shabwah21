<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class FeaturedNews extends Component
{
    public $featuredNews = [];

    public function mount()
    {
        $this->loadFeaturedNews();
    }

    public function loadFeaturedNews()
    {
        $this->featuredNews = Article::where('is_featured', true)
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.featured-news');
    }
}
