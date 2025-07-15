@forelse($mostReadArticles as $index => $article)
    <div class="flex items-start gap-3 pb-4 {{ !$loop->last ? 'border-b border-gray-200' : '' }} mb-4">
        <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold">
            {{ $index + 1 }}
        </div>
        
        <div class="flex-1 min-w-0">
            <h4 class="font-semibold text-gray-800 text-sm leading-tight mb-1 line-clamp-2">
                <a href="{{ route('news.show', $article->slug) }}" class="hover:text-blue-600 transition-colors">
                    {{ $article->title }}
                </a>
            </h4>
            
            <div class="flex items-center gap-3 text-xs text-gray-500">
                <div class="flex items-center gap-1">
                    <i class="bi bi-eye"></i>
                    <span>{{ $article->views_count ?? 0 }}</span>
                </div>
                
                <div class="flex items-center gap-1">
                    <i class="bi bi-clock"></i>
                    <span>{{ $article->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="text-center py-8">
        <i class="bi bi-graph-up text-4xl text-gray-300 mb-2"></i>
        <p class="text-gray-500 text-sm">لا توجد مقالات</p>
    </div>
@endforelse