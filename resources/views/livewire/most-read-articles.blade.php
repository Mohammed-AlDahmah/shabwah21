<div class="most-read-articles">
    @if($mostReadArticles->count() > 0)
        <div class="space-y-4">
            @foreach($mostReadArticles as $index => $article)
                <div class="flex items-start gap-4 pb-4 {{ !$loop->last ? 'border-b border-slate-200' : '' }} group">
                    <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-[#C08B2D] to-[#B22B2B] text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">
                        {{ $index + 1 }}
                    </div>
                    
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-slate-800 text-sm leading-tight mb-2 line-clamp-2 group-hover:text-[#C08B2D] transition-colors">
                            <a href="{{ route('news.show', $article->slug) }}" class="hover:underline">
                                {{ $article->title }}
                            </a>
                        </h4>
                        
                        <div class="flex items-center justify-between text-xs text-slate-500">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <i class="bi bi-clock text-[#C08B2D]"></i>
                                    <span>{{ $article->time_ago }}</span>
                                </div>
                                
                                <div class="flex items-center gap-1">
                                    <i class="bi bi-eye text-[#C08B2D]"></i>
                                    <span>{{ $article->views_count ?? 0 }}</span>
                                </div>
                            </div>
                            
                            @if($article->category)
                                <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded-full text-xs">
                                    {{ is_object($article->category) ? $article->category->name : ($article->category ?? 'أخبار') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Placeholder when no most read articles -->
        <div class="text-center py-8">
            <i class="bi bi-graph-up text-4xl text-slate-300 mb-4 block"></i>
            <h4 class="text-lg font-bold text-slate-600 mb-2">لا توجد مقالات</h4>
            <p class="text-slate-500 text-sm">سيتم عرض المقالات الأكثر مشاهدة هنا</p>
        </div>
    @endif
</div>