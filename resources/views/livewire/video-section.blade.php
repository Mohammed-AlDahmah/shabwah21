<section class="mb-8">
    @if($videos->count() > 0)
    <div class="mb-6 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">فيديو غرافيك شبوة21</h2>
        <div class="w-32 h-1 mx-auto rounded bg-yellow-400 mb-2"></div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- الفيديو الرئيسي -->
        @php $mainVideo = $videos->first(); @endphp
        <div class="relative col-span-2 rounded-2xl overflow-hidden shadow-lg">
            <a href="{{ route('videos.show', $mainVideo->slug) }}" class="block group">
                <img src="{{ $mainVideo->thumbnail ?: '/images/video-placeholder.jpg' }}" alt="{{ $mainVideo->title }}" class="w-full h-80 object-cover rounded-2xl">
                <!-- زر تشغيل -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-white/80 rounded-full p-4 shadow-lg group-hover:bg-yellow-400 transition-all">
                        <svg class="w-10 h-10 text-yellow-500 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.5 5.5A1.5 1.5 0 018 4h4a1.5 1.5 0 011.5 1.5v9A1.5 1.5 0 0112 16H8a1.5 1.5 0 01-1.5-1.5v-9zM8 5.5v9h4v-9H8z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <!-- نص فوق الفيديو -->
                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 via-black/30 to-transparent p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-full mr-2">{{ $mainVideo->category->name ?? 'فيديو' }}</span>
                        <span class="text-xs text-white opacity-80">{{ $mainVideo->created_at->format('Y-m-d') }}</span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-extrabold text-white leading-snug mb-2">
                        {{ $mainVideo->title }}
                    </h2>
                </div>
            </a>
        </div>
        <!-- قائمة الفيديوهات الجانبية -->
        <div class="flex flex-col gap-4">
            @foreach($videos->slice(1,5) as $video)
            <a href="{{ route('videos.show', $video->slug) }}" class="group flex items-center gap-3 bg-white rounded-xl shadow hover:shadow-lg transition-shadow duration-300 overflow-hidden p-2">
                <div class="relative flex-shrink-0">
                    <img src="{{ $video->thumbnail ?: '/images/video-placeholder.jpg' }}" alt="{{ $video->title }}" class="w-24 h-16 object-cover rounded-xl">
                    <!-- أيقونة فيديو -->
                    <div class="absolute top-2 left-2 bg-white/80 rounded-full p-1 shadow flex items-center justify-center">
                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4.293 6.707A1 1 0 015 6h6a1 1 0 01.707 1.707l-3 3a1 1 0 01-1.414 0l-3-3z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center mb-1">
                        <span class="bg-yellow-400 text-gray-900 text-xs font-bold px-2 py-0.5 rounded-full mr-2">{{ $video->category->name ?? 'فيديو' }}</span>
                        <span class="text-xs text-gray-500">{{ $video->created_at->format('Y-m-d') }}</span>
                    </div>
                    <h3 class="font-bold text-sm text-gray-900 group-hover:text-yellow-600 transition-colors line-clamp-2">
                        {{ $video->title }}
                    </h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</section>
