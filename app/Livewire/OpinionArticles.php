<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;

class OpinionArticles extends Component
{
    public $limit = 3;

    public function mount($limit = 3)
    {
        $this->limit = $limit;
    }

    public function render()
    {
        $opinionCategory = Category::where('slug', 'opinion')->first();
        $opinionArticles = Article::where('is_published', true)
            ->when($opinionCategory, function($query, $opinionCategory) {
                return $query->where('category_id', $opinionCategory->id);
            })
            ->orderBy('created_at', 'desc')
            ->take($this->limit)
            ->get();
        return view('livewire.opinion-articles', compact('opinionArticles'));
    }
}