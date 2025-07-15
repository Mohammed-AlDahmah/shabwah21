<div class="featured-news-section">
    @if($featuredNews->count() > 0)
        @php $mainNews = $featuredNews->first(); @endphp
        
        <!-- الخبر الرئيسي -->
        <div class="main-featured-news mb-4">
            <div class="news-card news-card-large">
                <a href="{{ route('news.show', $mainNews->slug) }}" class="block">
                    <div class="news-card-image" style="padding-bottom: 50%;">
                        @if($mainNews->image)
                            <img src="{{ asset('storage/' . $mainNews->image) }}" 
                                 alt="{{ $mainNews->title }}"
                                 class="absolute inset-0 w-full h-full object-cover">
                        @else
                            <div class="absolute inset-0 bg-gray-300 flex items-center justify-center">
                                <i class="bi bi-image text-gray-500 text-4xl"></i>
                            </div>
                        @endif
                        <div class="news-category-badge">
                            {{ $mainNews->category->name }}
                        </div>
                    </div>
                </a>
                <div class="p-4">
                    <h2 class="text-2xl font-bold mb-2 hover:text-primary transition">
                        <a href="{{ route('news.show', $mainNews->slug) }}">
                            {{ $mainNews->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-3 line-clamp-2">
                        {{ $mainNews->summary }}
                    </p>
                    <div class="flex items-center text-sm text-gray-500">
                        <span><i class="bi bi-calendar3 ml-1"></i> {{ $mainNews->created_at->format('Y-m-d') }}</span>
                        <span class="mx-2">|</span>
                        <span><i class="bi bi-clock ml-1"></i> {{ $mainNews->created_at->format('H:i') }}</span>
                        @if($mainNews->views_count > 0)
                            <span class="mx-2">|</span>
                            <span><i class="bi bi-eye ml-1"></i> {{ number_format($mainNews->views_count) }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- الأخبار الثانوية -->
        @if($featuredNews->count() > 1)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($featuredNews->skip(1)->take(4) as $news)
                    <div class="news-card news-card-small">
                        <div class="flex gap-3">
                            <a href="{{ route('news.show', $news->slug) }}" class="block w-1/3">
                                <div class="relative pb-20 overflow-hidden rounded">
                                    @if($news->image)
                                        <img src="{{ asset('storage/' . $news->image) }}" 
                                             alt="{{ $news->title }}"
                                             class="absolute inset-0 w-full h-full object-cover">
                                    @else
                                        <div class="absolute inset-0 bg-gray-300 flex items-center justify-center">
                                            <i class="bi bi-image text-gray-500"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div class="flex-1">
                                <span class="text-xs text-primary font-semibold">
                                    {{ $news->category->name }}
                                </span>
                                <h3 class="font-bold text-sm mb-1 line-clamp-2 hover:text-primary transition">
                                    <a href="{{ route('news.show', $news->slug) }}">
                                        {{ $news->title }}
                                    </a>
                                </h3>
                                <div class="text-xs text-gray-500">
                                    <span><i class="bi bi-clock"></i> {{ $news->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <div class="text-center py-8 text-gray-500">
            <i class="bi bi-newspaper text-4xl mb-2"></i>
            <p>لا توجد أخبار مميزة حالياً</p>
        </div>
    @endif
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .news-card-large {
        height: 100%;
    }
    
    .news-card-small {
        background: white;
        padding: 12px;
        border-radius: 8px;
        transition: all 0.3s;
    }
    
    .news-card-small:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
</style>
