<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use App\Models\Category;

class OpinionArticles extends Component
{
    public function render()
    {
        $opinionCategory = Category::where('slug', 'opinion')->first();
        
        $opinionArticles = News::where('is_published', true)
            ->when($opinionCategory, function($query, $opinionCategory) {
                return $query->where('category_id', $opinionCategory->id);
            })
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            
        return view('livewire.opinion-articles', compact('opinionArticles'));
    }
}