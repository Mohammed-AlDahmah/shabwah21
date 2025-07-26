<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class BreakingNews extends Component
{
    public function render()
    {
        $breakingNews = Article::select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'views_count', 'category_id', 'author_id')
            ->with(['category:id,name_ar,slug', 'author:id,name'])
            ->where('is_breaking', true)
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();
            
        return view('livewire.breaking-news', compact('breakingNews'));
    }
}
