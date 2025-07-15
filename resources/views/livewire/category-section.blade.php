<div class="category-section">
    @if($news->count() > 0)
        @if(($view ?? 'grid') == 'grid')
            <!-- عرض الشبكة -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($news as $item)
                    <div class="news-card">
                        <a href="{{ route('news.show', $item->slug) }}" class="block">
                            <div class="news-card-image">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" 
                                         alt="{{ $item->title }}"
                                         loading="lazy">
                                @else
                                    <div class="absolute inset-0 bg-gray-300 flex items-center justify-center">
                                        <i class="bi bi-image text-gray-500 text-3xl"></i>
                                    </div>
                                @endif
                            </div>
                        </a>
                        
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2 line-clamp-2 hover:text-primary transition">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            
                            <div class="flex items-center text-xs text-gray-500">
                                <span><i class="bi bi-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                                @if($item->views_count > 0)
                                    <span class="mr-3"><i class="bi bi-eye"></i> {{ number_format($item->views_count) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- عرض القائمة -->
            <div class="space-y-3">
                @foreach($news as $item)
                    <div class="news-list-item">
                        <div class="flex gap-3">
                            @if($item->image)
                                <a href="{{ route('news.show', $item->slug) }}" class="block w-24 h-20 flex-shrink-0">
                                    <img src="{{ asset('storage/' . $item->image) }}" 
                                         alt="{{ $item->title }}"
                                         class="w-full h-full object-cover rounded"
                                         loading="lazy">
                                </a>
                            @endif
                            
                            <div class="flex-1">
                                <h4 class="font-semibold text-sm mb-1 line-clamp-2 hover:text-primary transition">
                                    <a href="{{ route('news.show', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                                <div class="text-xs text-gray-500">
                                    <span><i class="bi bi-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <div class="text-center py-8 text-gray-500">
            <i class="bi bi-folder2-open text-4xl mb-2"></i>
            <p>لا توجد أخبار في هذا القسم</p>
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
    
    .news-list-item {
        background: white;
        padding: 12px;
        border-radius: 8px;
        transition: all 0.3s;
    }
    
    .news-list-item:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
</style> 