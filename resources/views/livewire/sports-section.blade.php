<div class="sports-section-container">
    @forelse($sportsNews as $news)
        <div class="sports-news-item">
            <div class="sports-news-image">
                @if($news->image)
                    @if(filter_var($news->image, FILTER_VALIDATE_URL))
                        <img src="{{ $news->image }}" 
                             alt="{{ $news->title }}" 
                             loading="lazy">
                    @else
                        <img src="{{ asset('storage/' . $news->image) }}" 
                             alt="{{ $news->title }}" 
                             loading="lazy">
                    @endif
                @else
                    <div class="sports-news-placeholder">
                        <i class="bi bi-trophy"></i>
                    </div>
                @endif
            </div>
            
            <div class="sports-news-content">
                <div>
                    <h4 class="sports-news-title">
                        <a href="{{ route('news.show', $news->slug) }}">
                            {{ $news->title }}
                        </a>
                    </h4>
                    
                    <p class="sports-news-excerpt">
                        {{ $news->excerpt }}
                    </p>
                </div>
                
                <div class="sports-news-meta">
                    <div class="sports-news-meta-left">
                        <div class="sports-meta-item">
                            <i class="bi bi-clock sports-meta-icon clock"></i>
                            <span>{{ $news->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <div class="sports-meta-item">
                            <i class="bi bi-eye sports-meta-icon eye"></i>
                            <span>{{ $news->views_count ?? 0 }}</span>
                        </div>
                        
                        <div class="sports-meta-item">
                            <i class="bi bi-star sports-meta-icon star"></i>
                            <span>{{ $news->likes_count ?? 0 }}</span>
                        </div>
                    </div>
                    
                    @if($news->category)
                        <span class="sports-category-badge">
                            {{ is_object($news->category) ? $news->category->name : ($news->category ?? 'رياضة') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="sports-empty-state">
            <div class="sports-empty-container">
                <i class="bi bi-trophy sports-empty-icon"></i>
                <h3 class="sports-empty-title">لا توجد أخبار رياضية</h3>
                <p class="sports-empty-description">سيتم عرض الأخبار الرياضية هنا عند إضافتها</p>
            </div>
        </div>
    @endforelse
</div>