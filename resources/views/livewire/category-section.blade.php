<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($showTitle)
    <div class="bg-red-600 text-white p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3 space-x-reverse">
                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold">{{ $category->name_ar }}</h2>
            </div>
            @if($showViewAll && $articles->count() > 0)
            <a href="{{ route('news.category', $category->slug) }}" class="text-white hover:text-yellow-200 text-sm transition-colors flex items-center">
                عرض الكل
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
            @endif
        </div>
    </div>
    @endif
    
    <div class="p-4">
        <div class="space-y-3">
            @forelse($articles as $index => $article)
            <div class="group flex space-x-3 space-x-reverse border-b border-gray-100 pb-3 last:border-b-0 hover:bg-gray-50 p-2 rounded transition-colors duration-300">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-red-600 text-white text-xs font-bold rounded flex items-center justify-center">
                        {{ $index + 1 }}
                    </div>
                </div>
                
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-semibold text-gray-900 hover:text-red-600 transition-colors duration-300 line-clamp-2 mb-1">
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
                <p class="text-sm">لا توجد أخبار في هذا القسم حالياً</p>
            </div>
            @endforelse
        </div>
        
        @if($showViewAll && $articles->count() > 0)
        <div class="mt-4 pt-3 border-t border-gray-200">
            <a href="{{ route('news.category', $category->slug) }}" 
               class="block w-full text-center bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200 transition-colors text-sm">
                عرض جميع أخبار {{ $category->name_ar }}
            </a>
        </div>
        @endif
    </div>
</div> 