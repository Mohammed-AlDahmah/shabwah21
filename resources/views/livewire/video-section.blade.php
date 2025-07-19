<div class="video-section">
    @if($videos->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($videos as $video)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative">
                        <img src="{{ $video->thumbnail ?? 'https://via.placeholder.com/400x225' }}" 
                             alt="{{ $video->title }}" 
                             class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300 cursor-pointer">
                                <i class="bi bi-play-fill text-white text-2xl"></i>
                            </div>
                        </div>
                        <div class="absolute bottom-3 right-3 bg-black bg-opacity-70 text-white px-2 py-1 rounded text-xs">
                            {{ $video->duration ?? '05:30' }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-slate-800 mb-3 text-lg hover:text-[#C08B2D] transition-colors line-clamp-2">
                            <a href="{{ route('videos.show', $video->slug) }}" class="hover:underline">
                                {{ $video->title }}
                            </a>
                        </h3>
                        <p class="text-slate-600 text-sm mb-4 line-clamp-2">{{ Str::limit($video->description, 80) }}</p>
                        <div class="flex items-center justify-between text-xs text-slate-500">
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
    @else
        <!-- Placeholder when no videos -->
        <div class="text-center py-16">
            <div class="bg-slate-50 rounded-2xl p-12">
                <i class="bi bi-play-circle text-6xl text-slate-300 mb-6 block"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد فيديوهات</h3>
                <p class="text-slate-500">سيتم عرض أحدث الفيديوهات هنا عند إضافتها</p>
            </div>
        </div>
    @endif
</div>
