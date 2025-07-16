@if($videos->count() > 0)
<div class="bg-white py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center flex items-center justify-center">
            <i class="bi bi-play-circle me-3 text-red-600 text-4xl"></i>
            أحدث الفيديوهات
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($videos as $video)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="relative">
                    <img src="{{ $video->thumbnail ?? 'https://via.placeholder.com/400x225' }}" 
                         alt="{{ $video->title }}" 
                         class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700 transition-colors cursor-pointer">
                            <i class="bi bi-play-fill text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-3 right-3 bg-black bg-opacity-70 text-white px-2 py-1 rounded text-xs">
                        05:30
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900 mb-3 text-lg hover:text-red-600 transition-colors">
                        <a href="{{ route('videos.show', $video->slug) }}">
                            {{ $video->title }}
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($video->description, 80) }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <span>{{ $video->published_at ? $video->published_at->diffForHumans() : '' }}</span>
                        <span class="flex items-center">
                            <i class="bi bi-play me-1"></i>
                            مشاهدة
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
