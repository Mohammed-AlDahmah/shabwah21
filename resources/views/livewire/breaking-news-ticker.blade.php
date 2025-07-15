<div>
    @if($breakingNews->count() > 0)
        <div class="relative w-full overflow-hidden bg-gradient-to-r from-red-600 via-red-700 to-red-600 breaking-news shadow-lg">
            <div class="container mx-auto flex items-center px-4 py-3 gap-4">
                <!-- Breaking News Icon -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-red-600 font-extrabold text-lg shadow-lg animate-pulse">
                        <i class="bi bi-broadcast text-xl"></i>
                    </div>
                    <span class="text-white font-bold text-lg hidden sm:block">عاجل</span>
                </div>
                
                <!-- News Ticker -->
                <div class="flex-1 overflow-hidden">
                    <div class="flex items-center gap-8 animate-scroll">
                        @foreach($breakingNews as $news)
                            <div class="flex-shrink-0 flex items-center gap-4">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                <a href="{{ route('news.show', $news->slug) }}" 
                                   class="text-white hover:text-yellow-200 transition-colors font-medium text-sm sm:text-base line-clamp-1">
                                    {{ $news->title }}
                                </a>
                            </div>
                        @endforeach
                        
                        <!-- Duplicate for seamless loop -->
                        @foreach($breakingNews as $news)
                            <div class="flex-shrink-0 flex items-center gap-4">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                <a href="{{ route('news.show', $news->slug) }}" 
                                   class="text-white hover:text-yellow-200 transition-colors font-medium text-sm sm:text-base line-clamp-1">
                                    {{ $news->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Live Indicator -->
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-white rounded-full animate-pulse"></div>
                    <span class="text-white font-semibold text-sm hidden md:block">مباشر</span>
                </div>
            </div>
        </div>
    @endif
    
    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        .animate-scroll {
            animation: scroll 30s linear infinite;
        }
        
        .breaking-news {
            background: linear-gradient(90deg, #dc2626 0%, #b91c1c 50%, #dc2626 100%);
            background-size: 200% 100%;
            animation: gradient 3s ease infinite;
        }
        
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>