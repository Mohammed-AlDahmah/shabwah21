<section class="mb-8">
    @if($videos->count() > 0)
    <div class="mb-6 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">فيديو غرافيك شبوة21</h2>
        <div class="w-32 h-1 mx-auto rounded bg-yellow-400 mb-2"></div>
    </div>
    <div>
        @forelse($videos as $video)
            <div class="flex gap-6 p-6 border border-slate-200 rounded-2xl hover:shadow-lg transition-all duration-300 group">
                <div class="flex-shrink-0 w-32 h-24 bg-slate-200 rounded-xl overflow-hidden relative">
                    @if($video->thumbnail)
                        <img src="{{ asset('storage/' . $video->thumbnail) }}" 
                             alt="{{ $video->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                            <i class="bi bi-play-circle text-3xl text-white"></i>
                        </div>
                    @endif
                    
                    <!-- Play Button Overlay -->
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-white/90 hover:bg-white text-slate-700 p-3 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110">
                            <i class="bi bi-play-fill text-lg"></i>
                        </div>
                    </div>
                    
                    <!-- Duration Badge -->
                    @if($video->duration)
                        <div class="absolute bottom-2 right-2 bg-black/70 text-white px-2 py-1 rounded text-xs font-semibold">
                            {{ $video->duration }}
                        </div>
                    @endif
                </div>
                
                <div class="flex-1 min-w-0">
                    <h4 class="font-bold text-slate-800 text-lg mb-3 line-clamp-2 group-hover:text-red-600 transition-colors">
                        <a href="{{ route('videos.show', $video->slug) }}" class="hover:text-red-600 transition-colors">
                            {{ $video->title }}
                        </a>
                    </h4>
                    
                    <p class="text-slate-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                        {{ $video->description }}
                    </p>
                    
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-clock text-blue-500"></i>
                                <span>{{ $video->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <i class="bi bi-eye text-green-500"></i>
                                <span>{{ $video->views_count ?? 0 }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <i class="bi bi-heart text-red-500"></i>
                                <span>{{ $video->likes_count ?? 0 }}</span>
                            </div>
                        </div>
                        
                        @if($video->category)
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ is_object($video->category) ? $video->category->name : ($video->category ?? 'فيديو') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-16">
                <div class="bg-slate-50 rounded-2xl p-12">
                    <i class="bi bi-play-circle text-6xl text-slate-300 mb-6 block"></i>
                    <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد فيديوهات</h3>
                    <p class="text-slate-500">سيتم عرض الفيديوهات هنا عند إضافتها</p>
                </div>
            </div>
        @endforelse
    </div>
    @endif
</section>
