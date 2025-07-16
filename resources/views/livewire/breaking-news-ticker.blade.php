<div>
@if(isset($breakingNews) && $breakingNews->count() > 0)
 
<div class="breaking-news-container overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex items-center py-1">
            <div class="ticker-badge flex items-center">
                <i class="fas fa-bolt mr-2"></i>
                عاجل
            </div>
            <div class="ticker-content flex-1">
                <div class="ticker-item">
                @foreach($breakingNews as $index => $news)
                @if($index > 0)
                <span class="ticker-separator mx-8 text-yellow-400">●</span>
                @endif
                                <a href="{{ route('news.show', $news->slug) }}" class="ticker-item hover:text-yellow-200 transition-colors duration-200 inline-block">
                                    {{ $news->title }}
                                </a>
                            @endforeach  
            </div>
               
                
                
            </div>
        </div>
    </div>
</div>
 
@endif
</div>