<div class="breaking-news-ticker">
    @if(isset($breakingNews) && $breakingNews->count() > 0)
        <div class="breaking-news-container overflow-hidden">
            <div class="container mx-auto px-4">
                <div class="flex items-center py-2">
                    <div class="ticker-badge flex items-center bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-4 py-2 rounded-full font-bold text-sm shadow-lg">
                        <i class="bi bi-lightning-charge mr-2"></i>
                        عاجل
                    </div>
                    <div class="ticker-content flex-1 mr-4">
                        <div class="ticker-item flex items-center">
                            @foreach($breakingNews as $index => $news)
                                @if($index > 0)
                                    <span class="ticker-separator mx-6 text-yellow-400 text-lg">●</span>
                                @endif
                                <a href="{{ route('news.show', $news->slug) }}" class="ticker-item hover:text-yellow-200 transition-colors duration-200 inline-block text-white font-medium">
                                    {{ $news->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Placeholder when no breaking news -->
        <div class="breaking-news-container overflow-hidden">
            <div class="container mx-auto px-4">
                <div class="flex items-center py-2">
                    <div class="ticker-badge flex items-center bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-4 py-2 rounded-full font-bold text-sm shadow-lg">
                        <i class="bi bi-lightning-charge mr-2"></i>
                        عاجل
                    </div>
                    <div class="ticker-content flex-1 mr-4">
                        <div class="ticker-item flex items-center">
                            <span class="text-white font-medium">لا توجد أخبار عاجلة حالياً</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>