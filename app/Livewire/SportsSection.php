<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use App\Models\Category;

class SportsSection extends Component
{
    public function render()
    {
        $sportsCategory = Category::where('slug', 'sports')->first();
        
        $sportsNews = News::where('is_published', true)
            ->when($sportsCategory, function($query, $sportsCategory) {
                return $query->where('category_id', $sportsCategory->id);
            })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
            
        return view('livewire.sports-section', compact('sportsNews'));
    }
}