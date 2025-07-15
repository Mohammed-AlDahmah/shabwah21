<header class="bg-white shadow-lg sticky top-0 z-50">
    <!-- الشريط العلوي -->
    <div class="bg-slate-900 text-white">
        <div class="container mx-auto px-4 py-2">
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 ml-1 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        حضرموت، اليمن
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 ml-1 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        {{ now()->format('Y-m-d') }}
                    </span>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="text-xs text-gray-400">تابعنا على:</span>
                    <a href="#" class="hover:text-blue-400 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-blue-400 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-blue-400 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- الهيدر الرئيسي -->
    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center justify-between">
            <!-- الشعار -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-4 space-x-reverse">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7v10c0 5.55 3.84 9.74 9 11 5.16-1.26 9-5.45 9-11V7l-10-5z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-slate-800 leading-none">شبوة21</h1>
                        <p class="text-sm text-slate-600 mt-1">بوابة الأخبار الأولى</p>
                    </div>
                </a>
            </div>

            <!-- البحث -->
            <div class="hidden md:flex items-center max-w-md mx-8 flex-1">
                <div class="relative w-full">
                    <input type="text" placeholder="ابحث في الأخبار..." 
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <button class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- أدوات إضافية -->
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="hidden lg:flex items-center space-x-3 space-x-reverse">
                    <span class="text-sm text-gray-600">الطقس:</span>
                    <div class="flex items-center space-x-2 space-x-reverse bg-blue-50 px-3 py-1 rounded-full">
                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        <span class="text-sm font-medium text-blue-800">28°</span>
                    </div>
                </div>
                
                <!-- زر القائمة للموبايل -->
                <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- القائمة الرئيسية -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 border-t border-blue-700">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-3">
                <div class="flex items-center space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg font-medium text-white transition-all duration-200 {{ request()->routeIs('home') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                        <svg class="w-4 h-4 inline-block ml-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                        </svg>
                        الرئيسية
                    </a>
                    
                    @foreach($mainCategories as $cat)
                        @if($cat->children->count())
                            <div class="relative group">
                                <button class="px-4 py-2 rounded-lg font-medium text-white flex items-center gap-2 transition-all duration-200 {{ request('category') == $cat->slug ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                                    {{ $cat->name_ar ?? $cat->name }}
                                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl z-20 opacity-0 group-hover:opacity-100 transition-all duration-200 border border-gray-100">
                                    <div class="py-2">
                                        @foreach($cat->children as $child)
                                            <a href="{{ route('news.category', $child->slug) }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-b border-gray-50 last:border-b-0 {{ request('category') == $child->slug ? 'bg-blue-50 text-blue-600' : '' }}">
                                                {{ $child->name_ar ?? $child->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('news.category', $cat->slug) }}" class="px-4 py-2 rounded-lg font-medium text-white transition-all duration-200 {{ request('category') == $cat->slug ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                                {{ $cat->name_ar ?? $cat->name }}
                            </a>
                        @endif
                    @endforeach
                    
                    <a href="{{ route('videos.index') }}" class="px-4 py-2 rounded-lg font-medium text-white transition-all duration-200 {{ request()->routeIs('videos.index') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                        <svg class="w-4 h-4 inline-block ml-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        فيديو
                    </a>
                </div>
                
                <div class="hidden lg:flex items-center space-x-3 space-x-reverse">
                    <span class="text-blue-100 text-sm">المزيد:</span>
                    <a href="{{ route('contact') }}" class="text-white hover:text-blue-200 transition-colors text-sm">اتصل بنا</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-blue-200 transition-colors text-sm">من نحن</a>
                </div>
            </nav>
        </div>
    </div>
</header>
