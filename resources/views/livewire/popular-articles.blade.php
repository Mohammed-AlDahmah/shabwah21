<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-primary text-white p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3 space-x-reverse">
                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold">الأكثر قراءة</h2>
            </div>
        </div>
    </div>
    
    <div class="p-4">
        <div class="space-y-3">
            @forelse($popularArticles as $index => $article)
            <div class="group flex space-x-3 space-x-reverse border-b border-gray-100 pb-3 last:border-b-0 hover:bg-gray-50 p-2 rounded transition-colors duration-300">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-primary text-white text-xs font-bold rounded-full flex items-center justify-center">
                        {{ $index + 1 }}
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-semibold text-dark hover:text-primary transition-colors duration-300 line-clamp-2 mb-1">
                        <a href="{{ route('news.show', $article->slug) }}">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <span>{{ $article->created_at->format('Y-m-d') }}</span>
                        <span>{{ $article->views_count ?? 0 }} مشاهدة</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center text-gray-500 py-8">
                <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm">لا توجد أخبار متاحة حالياً</p>
            </div>
            @endforelse
        </div>
    </div>
</div> 