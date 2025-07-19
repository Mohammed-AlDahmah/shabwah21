<div class="featured-news-hero">
    @if($featuredNews)
        <article class="main-featured-article group bg-white rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl transition-all duration-700 relative hover-lift">
            <!-- Image Container -->
            <div class="featured-image-container aspect-[16/9] bg-gradient-to-br from-slate-200 to-slate-300 overflow-hidden relative">
                @if($featuredNews->image)
                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($featuredNews->image) }}" 
                         alt="{{ $featuredNews->title }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-[#C08B2D] via-[#B22B2B] to-[#C08B2D] flex items-center justify-center">
                        <i class="bi bi-newspaper text-8xl text-white/80 drop-shadow-lg"></i>
                    </div>
                @endif
                
                <!-- Premium Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-80"></div>
                
                <!-- Category Badge -->
                <div class="absolute top-6 right-6 z-10">
                    <span class="featured-badge bg-gradient-to-r from-[#B22B2B] to-[#C08B2D] text-white px-6 py-3 rounded-full text-sm font-bold shadow-xl backdrop-blur-sm border border-white/20">
                        {{ is_object($featuredNews->category) ? $featuredNews->category->name : ($featuredNews->category ?? 'أخبار') }}
                    </span>
                </div>
                
                <!-- Featured Badge -->
                <div class="absolute top-6 left-6 z-10">
                    <div class="featured-badge bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg backdrop-blur-sm border border-white/20 flex items-center gap-2">
                        <i class="bi bi-star-fill rotate-on-hover"></i>
                        <span>مميز</span>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="absolute bottom-0 left-0 right-0 p-8 z-10">
                    <h3 class="featured-title text-3xl md:text-4xl font-bold text-white mb-6 line-clamp-2 group-hover:text-yellow-200 transition-colors leading-tight">
                        <a href="{{ route('news.show', $featuredNews->slug) }}" class="hover:underline">
                            {{ $featuredNews->title }}
                        </a>
                    </h3>
                    
                    <p class="text-white/90 text-xl mb-6 line-clamp-3 leading-relaxed">
                        {{ $featuredNews->excerpt ?? Str::limit(strip_tags($featuredNews->content), 200) }}
                    </p>
                    
                    <!-- Meta Information -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-6 text-white/80">
                            <div class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm">
                                <i class="bi bi-clock text-yellow-300 featured-icon"></i>
                                <span class="font-medium">{{ $featuredNews->time_ago }}</span>
                            </div>
                            <div class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm">
                                <i class="bi bi-eye text-yellow-300 featured-icon"></i>
                                <span class="font-medium">{{ $featuredNews->views_count ?? 0 }}</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <button class="ripple-effect bg-white/20 hover:bg-white/30 text-white p-4 rounded-full transition-all duration-300 transform hover:scale-110 backdrop-blur-sm" title="مشاركة الخبر">
                                <i class="bi bi-share text-lg"></i>
                            </button>
                            <button class="ripple-effect bg-white/20 hover:bg-white/30 text-white p-4 rounded-full transition-all duration-300 transform hover:scale-110 backdrop-blur-sm" title="حفظ الخبر">
                                <i class="bi bi-bookmark text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @else
        <!-- Placeholder when no featured news -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden p-12 text-center">
            <div class="bg-gradient-to-br from-[#C08B2D] via-[#B22B2B] to-[#C08B2D] w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="bi bi-newspaper text-4xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-4">لا توجد أخبار مميزة</h3>
            <p class="text-slate-600">سيتم عرض الأخبار المميزة هنا عند إضافتها</p>
        </div>
    @endif
</div>