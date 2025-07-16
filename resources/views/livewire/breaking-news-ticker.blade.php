<div>
@if(isset($breakingNews) && $breakingNews->count() > 0)
<div id="tie-block_581" class="mag-box breaking-news-outer">
    <div class="breaking bg-gradient-to-r from-red-600 to-red-700 text-white shadow-lg">
        <div class="container mx-auto">
            <div class="flex items-center py-3">
                <!-- Breaking News Label -->
                <span class="breaking-title flex items-center gap-2">
                    <span class="tie-icon-bolt breaking-icon text-yellow-400 text-lg animate-pulse">
                        <i class="bi bi-lightning-charge"></i>
                    </span>
                    <span class="breaking-title-text font-bold text-white">شريط الاخبار</span>
                </span>
                
                <!-- Breaking News Ticker -->
                <div class="ticker-wrapper has-js ticker-dir-right flex-1 overflow-hidden relative mr-4">
                    <div class="ticker">
                        <div class="ticker-content text-white animate-marquee">
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
    </div>
</div>

<style>
    /* تنسيق الأخبار العاجلة */
    .breaking-news-outer {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    
    .breaking {
        background: linear-gradient(135deg, var(--secondary-color), #dc2626);
        position: relative;
        overflow: hidden;
    }
    
    .breaking-title {
        background: var(--secondary-color);
        padding: 0.75rem 1.5rem;
        border-radius: 0 25px 25px 0;
        white-space: nowrap;
        position: relative;
        z-index: 2;
    }
    
    .breaking-title-text {
        font-size: 1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .ticker-wrapper {
        position: relative;
        height: 100%;
        padding: 0.75rem 0;
    }
    
    .ticker-content {
        display: inline-block;
        white-space: nowrap;
        animation: scroll-right 60s linear infinite;
        font-weight: 500;
        font-size: 0.95rem;
    }
    
    .ticker-item {
        text-decoration: none;
        color: white;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .ticker-item:hover {
        color: #fbbf24;
        text-decoration: none;
    }
    
    .ticker-separator {
        color: #fbbf24;
        font-weight: bold;
        opacity: 0.7;
    }
    
    /* الحركة */
    @keyframes scroll-right {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
    
    /* توقيف الحركة عند التفاعل */
    .breaking:hover .ticker-content {
        animation-play-state: paused;
    }
    
    /* تنسيق الأيقونات */
    .tie-icon-bolt {
        animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    /* تنسيق متجاوب */
    @media (max-width: 768px) {
        .breaking-title {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        
        .breaking-title-text {
            font-size: 0.9rem;
        }
        
        .ticker-content {
            font-size: 0.85rem;
            animation-duration: 40s;
        }
        
        .ticker-separator {
            margin: 0 1rem;
        }
    }
    
    @media (max-width: 480px) {
        .breaking-title {
            padding: 0.4rem 0.8rem;
        }
        
        .breaking-title-text {
            font-size: 0.8rem;
        }
        
        .ticker-content {
            font-size: 0.8rem;
            animation-duration: 30s;
        }
    }
</style>
@endif
</div>