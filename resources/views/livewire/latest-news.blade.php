<div class="latest-news-section">
    @if($latestNews->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($latestNews as $news)
                <div class="news-card">
                    <a href="{{ route('news.show', $news->slug) }}" class="block">
                        <div class="news-card-image">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" 
                                     alt="{{ $news->title }}"
                                     loading="lazy">
                            @else
                                <div class="absolute inset-0 bg-gray-300 flex items-center justify-center">
                                    <i class="bi bi-image text-gray-500 text-3xl"></i>
                                </div>
                            @endif
                            <div class="news-category-badge">
                                {{ $news->category->name }}
                            </div>
                        </div>
                    </a>
                    
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2 line-clamp-2 hover:text-primary transition">
                            <a href="{{ route('news.show', $news->slug) }}">
                                {{ $news->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                            {{ $news->summary ?? Str::limit(strip_tags($news->content), 100) }}
                        </p>
                        
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <div class="flex items-center gap-3">
                                <span><i class="bi bi-calendar3"></i> {{ $news->created_at->format('Y/m/d') }}</span>
                                <span><i class="bi bi-clock"></i> {{ $news->created_at->format('H:i') }}</span>
                            </div>
                            @if($news->views_count > 0)
                                <span><i class="bi bi-eye"></i> {{ number_format($news->views_count) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if($latestNews->hasMorePages())
            <div class="text-center mt-6">
                <button wire:click="loadMore" 
                        class="btn-primary">
                    <span wire:loading.remove>عرض المزيد</span>
                    <span wire:loading>جاري التحميل...</span>
                </button>
            </div>
        @endif
    @else
        <div class="text-center py-8 text-gray-500">
            <i class="bi bi-newspaper text-4xl mb-2"></i>
            <p>لا توجد أخبار حالياً</p>
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
</style>
