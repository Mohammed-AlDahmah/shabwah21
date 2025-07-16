@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- عنوان الفيديو -->
        <div class="mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 leading-tight">
                {{ $video->title }}
            </h1>
            
            <!-- معلومات الفيديو -->
            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                    شبوة21
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $video->published_at ? $video->published_at->format('Y-m-d H:i') : '' }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                    </svg>
                    10:30 دقيقة
                </span>
            </div>
            
            <!-- شارات الفيديو -->
            <div class="flex gap-2">
                @if($video->is_featured)
                    <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">مميز</span>
                @endif
                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold">فيديو</span>
            </div>
        </div>
        
        <!-- مشغل الفيديو -->
        <div class="mb-6">
            <div class="relative bg-black rounded-lg overflow-hidden" style="padding-bottom: 56.25%;">
                @if(str_contains($video->video_url, 'youtube.com') || str_contains($video->video_url, 'youtu.be'))
                    <!-- YouTube Embed -->
                    <iframe src="{{ str_replace('watch?v=', 'embed/', $video->video_url) }}" 
                            class="absolute inset-0 w-full h-full"
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                @elseif(str_contains($video->video_url, 'vimeo.com'))
                    <!-- Vimeo Embed -->
                    <iframe src="{{ str_replace('vimeo.com', 'player.vimeo.com/video', $video->video_url) }}" 
                            class="absolute inset-0 w-full h-full"
                            frameborder="0" 
                            allow="autoplay; fullscreen; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                @else
                    <!-- Custom Video Player -->
                    <video controls class="absolute inset-0 w-full h-full">
                        <source src="{{ $video->video_url }}" type="video/mp4">
                        متصفحك لا يدعم تشغيل الفيديو.
                    </video>
                @endif
            </div>
        </div>
        
        <!-- وصف الفيديو -->
        @if($video->description)
            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">وصف الفيديو</h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ $video->description }}
                </p>
            </div>
        @endif
        
        <!-- أزرار المشاركة -->
        <div class="flex flex-wrap gap-2 mb-8">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
               target="_blank"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                مشاركة على فيسبوك
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($video->title) }}" 
               target="_blank"
               class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors duration-200">
                مشاركة على تويتر
            </a>
            <a href="https://wa.me/?text={{ urlencode($video->title . ' ' . request()->url()) }}" 
               target="_blank"
               class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200">
                مشاركة على واتساب
            </a>
            <a href="{{ $video->video_url }}" 
               target="_blank"
               class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                مشاهدة على المنصة الأصلية
            </a>
        </div>
        
        <!-- فيديوهات ذات صلة -->
        <div class="bg-gray-50 rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">فيديوهات ذات صلة</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                    $relatedVideos = \App\Models\Video::where('id', '!=', $video->id)
                        ->where('is_published', true)
                        ->orderBy('published_at', 'desc')
                        ->take(4)
                        ->get();
                @endphp
                
                @foreach($relatedVideos as $related)
                    <div class="bg-white rounded-lg p-3 shadow-sm">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-20 h-16 bg-gray-200 rounded overflow-hidden">
                                @if($related->thumbnail)
                                    <img src="{{ $related->thumbnail }}" 
                                         alt="{{ $related->title }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-500 to-red-700">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-gray-800 line-clamp-2">
                                    <a href="{{ route('video.show', $related->slug) }}" 
                                       class="hover:text-red-600 transition-colors duration-200">
                                        {{ $related->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $related->published_at ? $related->published_at->diffForHumans() : '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection 