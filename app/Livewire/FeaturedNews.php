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
            ->take(3)
            ->get();
    }

    public function render()
    {
        $featuredArticles = \Cache::remember('featured_articles', 300, function() {
            return \App\Models\Article::where('is_featured', true)
                ->where('is_published', true)
                ->latest('published_at')
                ->take(5)
                ->get();
        });
        return view('livewire.featured-news', compact('featuredArticles'));
    }
}
