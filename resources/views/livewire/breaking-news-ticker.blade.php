<div class="flex items-center">
    <div class="flex-shrink-0 bg-white text-red-600 px-3 py-1 rounded-md font-bold text-sm">
        <i class="bi bi-exclamation-triangle-fill"></i>
        عاجل
    </div>
    
    <div class="flex-1 mx-4 overflow-hidden">
        <div class="ticker-scroll">
            @forelse($breakingNews as $news)
                <a href="{{ route('news.show', $news->slug) }}" class="ticker-item text-white hover:text-yellow-300 transition-colors">
                    {{ $news->title }}
                </a>
                @if(!$loop->last)
                    <span class="ticker-separator">•</span>
                @endif
            @empty
                <span class="text-white">لا توجد أخبار عاجلة حالياً</span>
            @endforelse
        </div>
    </div>
    
    <div class="flex-shrink-0">
        <div class="text-white text-sm">
            {{ now()->format('H:i') }}
        </div>
    </div>
</div>

<style>
    .ticker-scroll {
        display: flex;
        animation: scroll-left 30s linear infinite;
        white-space: nowrap;
    }
    
    .ticker-item {
        margin-right: 2rem;
        font-weight: 500;
    }
    
    .ticker-separator {
        margin-right: 2rem;
        color: #fbbf24;
    }
    
    @keyframes scroll-left {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    
    @media (max-width: 768px) {
        .ticker-scroll {
            animation-duration: 20s;
        }
    }
</style>