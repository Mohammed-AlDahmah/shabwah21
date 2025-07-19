<div class="featured-news-section">
    @if($featuredNews->count() > 0)
        <div class="space-y-4">
            @foreach($featuredNews->take($limit ?? 4) as $index => $news)
                <article class="side-featured-card group bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:transform hover:scale-105 border border-gray-100">
                    <div class="flex gap-4 p-4">
                        <!-- Image -->
                        <div class="flex-shrink-0 w-24 h-20 bg-gradient-to-br from-slate-200 to-slate-300 rounded-xl overflow-hidden relative">
                            @if($news->image)
                                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($news->image) }}" 
                                     alt="{{ $news->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#C08B2D] via-[#B22B2B] to-[#C08B2D] flex items-center justify-center">
                                    <i class="bi bi-newspaper text-2xl text-white/80 drop-shadow-lg"></i>
                                </div>
                            @endif
                            
                            <!-- Number Badge -->
                            <div class="absolute top-1 left-1 z-10">
                                <div class="number-badge w-6 h-6 bg-gradient-to-r from-[#B22B2B] to-[#C08B2D] text-white rounded-full flex items-center justify-center text-xs font-bold shadow-lg">
                                    {{ $index + 1 }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <h4 class="featured-title font-bold text-slate-800 mb-2 line-clamp-2 group-hover:text-[#C08B2D] transition-colors text-sm leading-tight">
                                <a href="{{ route('news.show', $news->slug) }}" class="hover:underline">
                                    {{ $news->title }}
                                </a>
                            </h4>
                            
                            <p class="text-slate-600 text-xs mb-3 line-clamp-2 leading-relaxed">
                                {{ $news->excerpt ?? Str::limit(strip_tags($news->content), 100) }}
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <div class="flex items-center gap-1">
                                        <i class="bi bi-clock text-[#C08B2D] featured-icon"></i>
                                        <span>{{ $news->time_ago }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <i class="bi bi-eye text-[#C08B2D] featured-icon"></i>
                                        <span>{{ $news->views_count ?? 0 }}</span>
                                    </div>
                                </div>
                                
                                <button class="expand-on-hover text-[#C08B2D] hover:text-[#B22B2B] p-1 rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-110">
                                    <i class="bi bi-arrow-left text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <!-- Placeholder when no featured news -->
        <div class="text-center py-8">
            <div class="bg-slate-50 rounded-2xl p-8">
                <i class="bi bi-newspaper text-4xl text-slate-300 mb-4 block"></i>
                <h3 class="text-lg font-bold text-slate-600 mb-2">لا توجد أخبار مميزة</h3>
                <p class="text-slate-500 text-sm">سيتم عرض الأخبار المميزة هنا عند إضافتها</p>
            </div>
        </div>
    @endif
</div>
