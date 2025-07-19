<div class="popular-articles">
    @if($popularArticles->count() > 0)
        <div class="space-y-4">
            @foreach($popularArticles as $index => $article)
                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors">
                    <span class="bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white text-sm px-3 py-1 rounded-full font-bold flex-shrink-0">
                        {{ $index + 1 }}
                    </span>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-semibold text-slate-800 hover:text-[#C08B2D] transition-colors cursor-pointer mb-1 line-clamp-2">
                            <a href="{{ route('news.show', $article->slug) }}" class="hover:underline">
                                {{ $article->title }}
                            </a>
                        </h4>
                        <div class="flex items-center gap-2 text-xs text-slate-500">
                            <span>{{ $article->time_ago }}</span>
                            <span class="flex items-center">
                                <i class="bi bi-eye me-1"></i>
                                {{ number_format($article->views_count ?? 0) }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Placeholder when no popular articles -->
        <div class="text-center py-8">
            <i class="bi bi-fire text-3xl text-slate-300 mb-3 block"></i>
            <p class="text-slate-500 text-sm">لا توجد مقالات شائعة</p>
        </div>
    @endif
</div> 