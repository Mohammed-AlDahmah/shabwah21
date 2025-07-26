<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class SpecialSection extends Component
{
    public $specials = [];

    public function mount()
    {
        $this->specials = Article::where('type', 'special')
            ->where('is_published', true)
            ->latest('published_at')
            ->take(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.special-section');
    }
} 