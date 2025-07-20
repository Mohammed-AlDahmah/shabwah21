<div class="latest-news-grid">
    @if($latestNews->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($latestNews as $news)
                <article class="news-card group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-500 hover:transform hover:scale-105 border border-gray-100">
                    <!-- Image -->
                    <div class="aspect-video bg-gradient-to-br from-slate-200 to-slate-300 overflow-hidden relative">
                        @if($news->image)
                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($news->image) }}" 
                                 alt="{{ $news->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#C08B2D] via-[#B22B2B] to-[#C08B2D] flex items-center justify-center">
                                <i class="bi bi-newspaper text-4xl text-white/80 drop-shadow-lg"></i>
                            </div>
                        @endif
                        
                        <!-- Category Badge -->
                        <div class="absolute top-3 right-3 z-10">
                            <span class="bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                {{ is_object($news->category) ? $news->category->name : ($news->category ?? 'أخبار') }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="font-bold text-slate-800 mb-3 line-clamp-2 group-hover:text-[#C08B2D] transition-colors leading-tight">
                            <a href="{{ route('news.show', $news->slug) }}" class="hover:underline">
                                {{ $news->title }}
                            </a>
                        </h3>
                        
                        <p class="text-slate-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                            {{ $news->excerpt ?? Str::limit(strip_tags($news->content), 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between text-sm text-slate-500">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-1">
                                    <i class="bi bi-clock text-[#C08B2D]"></i>
                                    <span>{{ $news->time_ago }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="bi bi-eye text-[#C08B2D]"></i>
                                    <span>{{ $news->views_count ?? 0 }}</span>
                                </div>
                            </div>
                            
                            <button class="text-[#C08B2D] hover:text-[#B22B2B] p-2 rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-110">
                                <i class="bi bi-arrow-left"></i>
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <!-- Placeholder when no latest news -->
        <div class="text-center py-16">
            <div class="bg-slate-50 rounded-2xl p-12">
                <i class="bi bi-newspaper text-6xl text-slate-300 mb-6 block"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد أخبار حديثة</h3>
                <p class="text-slate-500">سيتم عرض آخر الأخبار هنا عند إضافتها</p>
            </div>
        </div>
    @endif
</div>