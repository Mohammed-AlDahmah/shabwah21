<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class FeaturedNewsHero extends Component
{
    public function render()
    {
        $featuredNews = Article::published()
            ->featured()
            ->with(['category'])
            ->latest('published_at')
            ->first();
            
        return view('livewire.featured-news-hero', compact('featuredNews'));
    }
}