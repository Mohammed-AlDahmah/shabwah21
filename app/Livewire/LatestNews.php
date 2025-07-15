<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

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
        $this->latestNews = Article::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(12)->items();
    }

    public function loadMore()
    {
        $this->page++;
        $more = Article::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->skip(12 * ($this->page - 1))
            ->take(12)
            ->get();
        $this->latestNews = $this->latestNews->concat($more);
    }

    public function render()
    {
        return view('livewire.latest-news');
    }
}
