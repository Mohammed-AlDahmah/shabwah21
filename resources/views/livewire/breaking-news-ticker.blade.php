<div class="breaking-news-ticker-wrapper">
    @if(isset($breakingNews) && $breakingNews->count() > 0)
        <div class="relative w-full overflow-hidden breaking-news shadow-lg" style="background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);">
            <div class="container mx-auto flex items-center px-4 py-3 gap-4">
                <!-- أيقونة عاجل -->
                <div class="flex items-center gap-3 flex-shrink-0">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white shadow-md animate-pulse" style="color: #B22B2B;">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-white text-sm md:text-base whitespace-nowrap drop-shadow-md">عاجل</span>
                </div>
                
                <!-- الأخبار المتحركة -->
                <div class="flex-1 overflow-hidden relative">
                    <div class="breaking-news-scroll" style="
                        display: inline-block;
                        white-space: nowrap;
                        color: #ffffff;
                        font-weight: 600;
                        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
                        animation: scroll-ltr 120s linear infinite;
                        will-change: transform;
                        backface-visibility: hidden;
                    ">
                        <!-- المجموعة الأولى -->
                        @foreach($breakingNews as $index => $news)
                            <a href="{{ route('news.show', $news->slug) }}" 
                               style="color: #ffffff; text-decoration: none; margin-left: 2rem; display: inline-block;"
                               class="hover:text-yellow-200 transition-colors duration-200">
                                <span style="color: inherit;">{{ $news->title }}</span>
                                <span style="color: inherit; opacity: 0.8; font-size: 0.75rem; background: rgba(255, 255, 255, 0.25); padding: 0.25rem 0.5rem; border-radius: 50px; margin-right: 0.5rem;">{{ $news->time_ago }}</span>
                            </a>
                            <span style="color: #fef3c7; margin: 0 1.5rem;">•</span>
                        @endforeach
                        
                        <!-- المجموعة الثانية (تكرار) -->
                        @foreach($breakingNews as $index => $news)
                            <a href="{{ route('news.show', $news->slug) }}" 
                               style="color: #ffffff; text-decoration: none; margin-left: 2rem; display: inline-block;"
                               class="hover:text-yellow-200 transition-colors duration-200">
                                <span style="color: inherit;">{{ $news->title }}</span>
                                <span style="color: inherit; opacity: 0.8; font-size: 0.75rem; background: rgba(255, 255, 255, 0.25); padding: 0.25rem 0.5rem; border-radius: 50px; margin-right: 0.5rem;">{{ $news->time_ago }}</span>
                            </a>
                            <span style="color: #fef3c7; margin: 0 1.5rem;">•</span>
                        @endforeach
                        
                        <!-- المجموعة الثالثة (تكرار إضافي) -->
                        @foreach($breakingNews as $index => $news)
                            <a href="{{ route('news.show', $news->slug) }}" 
                               style="color: #ffffff; text-decoration: none; margin-left: 2rem; display: inline-block;"
                               class="hover:text-yellow-200 transition-colors duration-200">
                                <span style="color: inherit;">{{ $news->title }}</span>
                                <span style="color: inherit; opacity: 0.8; font-size: 0.75rem; background: rgba(255, 255, 255, 0.25); padding: 0.25rem 0.5rem; border-radius: 50px; margin-right: 0.5rem;">{{ $news->time_ago }}</span>
                            </a>
                            <span style="color: #fef3c7; margin: 0 1.5rem;">•</span>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- CSS للحركة المستمرة -->
            <style>
                @keyframes scroll-ltr {
                    0% {
                        transform: translateX(-100%);
                    }
                    100% {
                        transform: translateX(0%);
                    }
                }
                
                .breaking-news:hover .breaking-news-scroll {
                    animation-play-state: paused;
                }
                
                @media (max-width: 768px) {
                    .breaking-news-scroll {
                        animation-duration: 150s !important;
                    }
                }
                
                @media (max-width: 480px) {
                    .breaking-news-scroll {
                        animation-duration: 120s !important;
                    }
                }
                
                @media (max-width: 360px) {
                    .breaking-news-scroll {
                        animation-duration: 100s !important;
                    }
                }
            </style>
        </div>
    @else
        <!-- Placeholder when no breaking news -->
        <div class="relative w-full overflow-hidden breaking-news shadow-lg" style="background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);">
            <div class="container mx-auto flex items-center px-4 py-3 gap-4">
                <div class="flex items-center gap-3 flex-shrink-0">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white shadow-md animate-pulse" style="color: #B22B2B;">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-white text-sm md:text-base whitespace-nowrap drop-shadow-md">عاجل</span>
                </div>
                <div class="flex-1 overflow-hidden relative">
                    <div style="color: #ffffff; font-weight: 600; text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);">
                        <span>لا توجد أخبار عاجلة حالياً</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>