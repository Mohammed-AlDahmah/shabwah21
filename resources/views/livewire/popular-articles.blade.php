<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <h3 class="text-xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-3 flex items-center">
        <i class="bi bi-fire text-red-600 me-3 text-2xl"></i>
        الأكثر قراءة
    </h3>
    <div class="space-y-4">
        @foreach($popularArticles as $index => $article)
        <div class="flex items-start gap-3">
            <span class="bg-red-600 text-white text-sm px-3 py-1 rounded-full font-bold flex-shrink-0">
                {{ $index + 1 }}
            </span>
            <div class="flex-1">
                <h4 class="text-sm font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer mb-1">
                    <a href="{{ route('news.show', $article->slug) }}">
                        {{ $article->title }}
                    </a>
                </h4>
                <div class="flex items-center gap-2 text-xs text-gray-500">
                    <span>{{ $article->time_ago }}</span>
                    <span class="flex items-center">
                        <i class="bi bi-eye me-1"></i>
                        {{ number_format($article->views_count) }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> 