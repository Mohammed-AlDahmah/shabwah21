<header class="bg-white shadow-md sticky top-0 z-50 border-b-4 border-primary">
    <!-- الشريط العلوي -->
    <div class="bg-dark text-gray-200 border-b border-gray-800">
        <div class="container mx-auto px-4 py-2">
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        حضرموت، اليمن
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        {{ now()->format('Y-m-d') }}
                    </span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors" aria-label="Twitter">
                        <i class="bi bi-twitter-x text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors" aria-label="Facebook">
                        <i class="bi bi-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors" aria-label="YouTube">
                        <i class="bi bi-youtube text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- الهيدر الرئيسي -->
    <div class="container mx-auto px-4 py-4 bg-white shadow">
        <div class="flex items-center justify-between">
            <!-- الشعار -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 space-x-reverse">
                    <img src="/images/logo.png" alt="حضرموت21" class="h-12 w-auto">
                    <div class="hidden md:block">
                        <h1 class="text-2xl font-bold text-gray-900">حضرموت21</h1>
                        <p class="text-sm text-gray-600">موقع إخباري شامل</p>
                    </div>
                </a>
            </div>

            <!-- القائمة الرئيسية -->
            <nav class="hidden lg:flex items-center space-x-6 space-x-reverse relative bg-primary px-6 py-2 rounded-full shadow-lg">
                <div class="absolute -bottom-0.5 left-0 w-full h-0.5 bg-accent rounded"></div>
                <a href="{{ route('home') }}" class="px-3 py-1 rounded-md font-medium transition-colors text-white/90 hover:text-white {{ request()->routeIs('home') ? 'font-bold underline decoration-[var(--color-accent)] decoration-2' : '' }}">الرئيسية</a>
                @foreach($mainCategories as $cat)
                    @if($cat->children->count())
                        <div class="relative group">
                            <button class="px-3 py-1 rounded-md font-medium flex items-center gap-1 transition-colors focus:outline-none text-white/90 hover:text-white {{ request('category') == $cat->slug ? 'font-bold underline decoration-[var(--color-accent)] decoration-2' : '' }}">
                                {{ $cat->name_ar ?? $cat->name }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg z-20 opacity-0 group-hover:opacity-100 transition-opacity border border-gray-100">
                                @foreach($cat->children as $child)
                                    <a href="{{ route('news.category', $child->slug) }}" class="block px-4 py-2 text-gray-700 hover:bg-primary hover:text-white transition-colors {{ request('category') == $child->slug ? 'bg-primary text-white' : '' }}">
                                        {{ $child->name_ar ?? $child->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ route('news.category', $cat->slug) }}" class="px-3 py-1 rounded-md font-medium transition-colors text-white/90 hover:text-white {{ request('category') == $cat->slug ? 'font-bold underline decoration-[var(--color-accent)] decoration-2' : '' }}">
                            {{ $cat->name_ar ?? $cat->name }}
                        </a>
                    @endif
                @endforeach
                <a href="{{ route('videos.index') }}" class="px-3 py-1 rounded-md font-medium transition-colors text-white/90 hover:text-white {{ request()->routeIs('videos.index') ? 'font-bold underline decoration-[var(--color-accent)] decoration-2' : '' }}">فيديو</a>
            </nav>

            <!-- زر القائمة للموبايل -->
            <div class="lg:hidden">
                <button class="text-gray-700 hover:text-red-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- شريط البحث -->
    <div class="bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center gap-3">
                <div class="flex-1 relative">
                    <input type="text" placeholder="ابحث في الأخبار..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                    <button class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                <button class="bg-primary text-white px-5 py-2 rounded-md hover:bg-dark transition-colors text-sm font-medium">
                    بحث
                </button>
            </div>
        </div>
    </div>
</header>
