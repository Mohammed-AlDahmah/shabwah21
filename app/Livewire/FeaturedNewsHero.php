<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class FeaturedNewsHero extends Component
{
    public function render()
    {
        $featuredNews = Article::where('is_featured', true)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->first();
            
        return view('livewire.featured-news-hero', compact('featuredNews'));
    }
}