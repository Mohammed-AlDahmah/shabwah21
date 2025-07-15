<div>
    @if($featuredNews->count() > 0)
        <div class="relative aspect-video bg-slate-200 rounded-2xl overflow-hidden shadow-2xl">
            @if($featuredNews->first()->image)
                <img src="{{ asset('storage/' . $featuredNews->first()->image) }}" 
                     alt="{{ $featuredNews->first()->title }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-blue-600 to-purple-700 flex items-center justify-center">
                    <i class="bi bi-newspaper text-8xl text-white/50"></i>
                </div>
            @endif
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
            
            <!-- Content -->
            <div class="absolute bottom-0 left-0 right-0 p-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <i class="bi bi-star-fill ml-1"></i>مميز
                    </span>
                    <span class="bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs">
                        {{ is_object($featuredNews->first()->category) ? $featuredNews->first()->category->name : ($featuredNews->first()->category ?? 'أخبار') }}
                    </span>
                </div>
                
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4 line-clamp-2 leading-tight">
                    <a href="{{ route('news.show', $featuredNews->first()->slug) }}" class="hover:text-blue-200 transition-colors">
                        {{ $featuredNews->first()->title }}
                    </a>
                </h2>
                
                <p class="text-white/90 text-lg mb-6 line-clamp-2 leading-relaxed">
                    {{ $featuredNews->first()->excerpt }}
                </p>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-6 text-white/80">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-clock text-blue-300"></i>
                            <span class="text-sm">{{ $featuredNews->first()->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <i class="bi bi-eye text-blue-300"></i>
                            <span class="text-sm">{{ $featuredNews->first()->views_count ?? 0 }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <i class="bi bi-heart text-red-300"></i>
                            <span class="text-sm">{{ $featuredNews->first()->likes_count ?? 0 }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <button class="bg-white/20 hover:bg-white/30 text-white p-3 rounded-full transition-all duration-300 transform hover:scale-110" title="مشاركة الخبر">
                            <i class="bi bi-share"></i>
                        </button>
                        
                        <a href="{{ route('news.show', $featuredNews->first()->slug) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                            اقرأ المزيد
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Dots -->
            @if($featuredNews->count() > 1)
                <div class="absolute top-4 left-1/2 transform -translate-x-1/2 flex items-center gap-2">
                    @foreach($featuredNews->take(5) as $index => $news)
                        <button class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }} transition-all duration-300 hover:bg-white"></button>
                    @endforeach
                </div>
            @endif
        </div>
    @else
        <div class="aspect-video bg-gradient-to-br from-slate-300 to-slate-400 rounded-2xl flex items-center justify-center">
            <div class="text-center">
                <i class="bi bi-newspaper text-8xl text-slate-500 mb-6"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد أخبار مميزة</h3>
                <p class="text-slate-500">سيتم عرض الأخبار المميزة هنا</p>
            </div>
        </div>
    @endif
</div>