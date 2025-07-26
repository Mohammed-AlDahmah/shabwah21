<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class FeaturedNews extends Component
{
    public function render()
    {
        $featuredArticles = Cache::remember('featured_articles', 300, function() {
            return Article::select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'views_count', 'category_id', 'author_id')
                ->with(['category:id,name_ar,slug', 'author:id,name'])
                ->where('is_featured', true)
                ->where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->latest('published_at')
                ->take(5)
                ->get();
        });
        
        return view('livewire.featured-news', compact('featuredArticles'));
    }
}
