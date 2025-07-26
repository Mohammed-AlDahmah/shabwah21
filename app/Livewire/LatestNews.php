<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class LatestNews extends Component
{
    public $latestNews = [];
    public $page = 1;

    protected $listeners = ['loadMore' => 'loadMore'];

    public function mount()
    {
        $this->loadLatestNews();
    }

    public function loadLatestNews()
    {
        $cacheKey = "latest_news_page_{$this->page}";
        
        $this->latestNews = Cache::remember($cacheKey, 300, function() {
            return Article::select([
                'id', 'title', 'slug', 'excerpt', 'featured_image', 
                'published_at', 'views_count', 'category_id', 'author_id'
            ])
            ->with(['category:id,name_ar,slug', 'author:id,name'])
            ->optimized() // استخدام index محدد
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(12)->items();
        });
    }

    public function loadMore()
    {
        $this->page++;
        $cacheKey = "latest_news_page_{$this->page}";
        
        $more = Cache::remember($cacheKey, 300, function() {
            return Article::select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'views_count', 'category_id', 'author_id')
                ->with(['category:id,name_ar,slug', 'author:id,name'])
                ->where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->skip(12 * ($this->page - 1))
                ->take(12)
                ->get();
        });
        
        $this->latestNews = $this->latestNews->concat($more);
    }

    public function render()
    {
        return view('livewire.latest-news');
    }
}
