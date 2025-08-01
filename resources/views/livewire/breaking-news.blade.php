<div>
    @if($breakingNews->count() > 0)
    <div class="relative w-full overflow-hidden bg-gradient-to-r from-red-600 to-red-700 breaking-news shadow-lg">
        <div class="container mx-auto flex items-center px-4 py-3 gap-4">
            <!-- أيقونة عاجل -->
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white text-red-600 font-extrabold text-sm shadow-md animate-pulse">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="font-bold text-white text-sm md:text-base">عاجل</span>
            </div>
            
            <!-- الأخبار المتحركة -->
            <div class="flex-1 overflow-hidden relative">
                <div class="ticker flex items-center gap-10 text-white text-sm font-medium" x-init="$el.innerHTML += $el.innerHTML" style="animation: ticker 40s linear infinite;">
                    @foreach($breakingNews as $news)
                        <a href="{{ route('news.show', $news->slug) }}" class="hover:text-yellow-200 transition-colors duration-200 flex items-center gap-2 group whitespace-nowrap">
                            <span class="font-medium group-hover:font-semibold">{{ $news->title }}</span>
                            <span class="opacity-60 text-xs bg-white/20 px-2 py-1 rounded-full">{{ $news->time_ago }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        
        <style>
        .breaking-news:hover .ticker {
            animation-play-state: paused;
        }
        @keyframes ticker {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
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
    </div>

    @endif


       <div class="breaking-news-container overflow-hidden">
                <div class="container mx-auto px-4">
                    <div class="flex items-center py-1">
                        <div class="ticker-badge flex items-center">
                            <i class="fas fa-bolt mr-2"></i>
                            عاجل
                        </div>
                        <div class="ticker-content flex-1">
                            <div class="ticker-item">
                                <span>انعقاد جلسة طارئة لمجلس محافظة شبوة لبحث الأوضاع الأمنية</span>
                            </div>
                            <div class="ticker-item">
                                <span>إطلاق مشروع تنموي جديد بتمويل سعودي في منطقة حبان</span>
                            </div>
                            <div class="ticker-item">
                                <span>وزير الداخلية يزور شبوة للاطلاع على سير العمل الأمني</span>
                            </div>
                            <div class="ticker-item">
                                <span>انطلاق فعاليات مهرجان التراث الشبووي السنوي</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>



