<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;

class VideoSection extends Component
{
    public function render()
    {
        $videos = Video::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('livewire.video-section', compact('videos'));
    }
}
