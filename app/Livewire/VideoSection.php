<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;

class VideoSection extends Component
{
    public $limit = 3;

    public function mount($limit = 3)
    {
        $this->limit = $limit;
    }

    public function render()
    {
        $videos = Video::select('id', 'title', 'slug', 'video_url', 'thumbnail', 'duration', 'published_at')
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take($this->limit)
            ->get();

        return view('livewire.video-section', compact('videos'));
    }
}
