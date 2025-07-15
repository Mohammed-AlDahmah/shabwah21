<div>
    <!-- الشريط العلوي -->
    <div class="top-bar bg-gray-900 text-white py-2 text-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <span><i class="bi bi-calendar3"></i> {{ now()->format('l d F Y') }}</span>
                    <span><i class="bi bi-clock"></i> <span id="live-time">{{ now()->format('H:i:s') }}</span></span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#" class="hover:text-primary transition"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="bi bi-telegram"></i></a>
                    <a href="#" class="hover:text-primary transition"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- شريط الأخبار العاجلة -->
    <div class="breaking-news-ticker">
        <div class="container mx-auto px-4 flex items-center">
            <span class="breaking-news-label">عاجل</span>
            <div class="breaking-news-content">
                @foreach($breakingNews as $news)
                    <span class="mx-8">{{ $news->title }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- الهيدر الرئيسي -->
    <header class="main-header">
        <div class="container mx-auto px-4">
            <div class="logo-section">
                <div class="flex items-center gap-4">
                    <a href="/" class="site-logo">
                        شبوة<span>21</span>
                    </a>
                </div>
                
                <!-- البحث -->
                <div class="hidden md:flex items-center gap-4">
                    <form class="relative" action="{{ route('news.search') }}" method="GET">
                        <input type="text" name="q" placeholder="بحث..." 
                               class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                        <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    
                    <!-- أيقونة القائمة للموبايل -->
                    <button class="md:hidden text-2xl" onclick="toggleMobileMenu()">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- القائمة الرئيسية -->
    <nav class="main-nav">
        <div class="container mx-auto px-4">
            <ul id="main-menu" class="flex">
                <li>
                    <a href="/" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i> الرئيسية
                    </a>
                </li>
                
                @foreach($categories as $category)
                    <li class="group">
                        <a href="{{ route('news.category', $category->slug) }}" 
                           class="{{ request()->segment(2) == $category->slug ? 'active' : '' }}">
                            {{ $category->name }}
                            @if($category->children->count() > 0)
                                <i class="bi bi-chevron-down text-xs"></i>
                            @endif
                        </a>
                        
                        @if($category->children->count() > 0)
                            <ul class="dropdown-menu">
                                @foreach($category->children as $child)
                                    <li>
                                        <a href="{{ route('news.category', $child->slug) }}">
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                
                <li>
                    <a href="{{ route('videos.index') }}" class="{{ request()->routeIs('videos.*') ? 'active' : '' }}">
                        <i class="bi bi-play-circle"></i> فيديو
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('contact') }}">
                        <i class="bi bi-envelope"></i> اتصل بنا
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- القائمة للموبايل -->
    <div id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white w-80 h-full overflow-y-auto">
            <div class="p-4 border-b">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">القائمة</h3>
                    <button onclick="toggleMobileMenu()" class="text-2xl">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            </div>
            
            <ul class="mobile-nav">
                <li>
                    <a href="/" class="block px-4 py-3 border-b hover:bg-gray-50">
                        <i class="bi bi-house-door"></i> الرئيسية
                    </a>
                </li>
                
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('news.category', $category->slug) }}" 
                           class="block px-4 py-3 border-b hover:bg-gray-50">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
                
                <li>
                    <a href="{{ route('videos.index') }}" class="block px-4 py-3 border-b hover:bg-gray-50">
                        <i class="bi bi-play-circle"></i> فيديو
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('contact') }}" class="block px-4 py-3 border-b hover:bg-gray-50">
                        <i class="bi bi-envelope"></i> اتصل بنا
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    // تحديث الوقت المباشر
    setInterval(function() {
        const now = new Date();
        document.getElementById('live-time').textContent = 
            now.toLocaleTimeString('ar-YE', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }, 1000);
    
    // تبديل القائمة للموبايل
    function toggleMobileMenu() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    }
</script>
