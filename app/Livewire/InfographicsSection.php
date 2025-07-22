<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class InfographicsSection extends Component
{
    public $infographics = [];

    public function mount()
    {
        $this->infographics = Article::where('type', 'infographic')
            ->where('is_published', true)
            ->latest('published_at')
            ->take(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.infographics-section');
    }
} 