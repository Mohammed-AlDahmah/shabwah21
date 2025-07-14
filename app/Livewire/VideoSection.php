<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;

class VideoSection extends Component
{
    public $videos = [];

    public function mount()
    {
        $this->loadVideos();
    }

    public function loadVideos()
    {
        $this->videos = Video::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.video-section');
    }
}
