<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class BreakingNewsTicker extends Component
{
    public function render()
    {
        // استخدام Cache لتحسين الأداء
        $breakingNews = Cache::remember('breaking_news_ticker', 300, function() {
            return Article::select('id', 'title', 'slug', 'published_at')
                ->where('is_breaking', true)
                ->where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->take(10)
                ->get()
                ->map(function($article) {
                    $article->time_ago = $article->published_at->diffForHumans();
                    return $article;
                });
        });
            
        return view('livewire.breaking-news-ticker', compact('breakingNews'));
    }
}