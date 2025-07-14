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
            <div class="flex-1 overflow-hidden">
                <div class="marquee whitespace-nowrap flex items-center gap-6 text-white text-sm font-medium">
                    @foreach($breakingNews as $news)
                        <a href="{{ route('news.show', $news->slug) }}" class="hover:text-yellow-200 transition-colors duration-200 flex items-center gap-2 group">
                            <span class="font-medium group-hover:font-semibold">{{ $news->title }}</span>
                            <span class="opacity-60 text-xs bg-white/20 px-2 py-1 rounded-full">{{ $news->time_ago }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        
        <style>
        .marquee {
            display: flex;
            animation: marquee 40s linear infinite;
        }
        .breaking-news:hover .marquee {
            animation-play-state: paused;
        }
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        </style>
    </div>
    @endif
</div>
