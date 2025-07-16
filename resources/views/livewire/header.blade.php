<header x-data="{ 
    open: false, 
    searchOpen: false, 
    searchQuery: '', 
    isSticky: false,
    currentDate: new Date().toLocaleDateString('ar-SA', { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    })
}" 
@scroll.window="isSticky = window.pageYOffset > 100"
class="theme-header"
:class="{ 'sticky-header': isSticky }">
            
            <!-- Mobile Menu Overlay -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="mobile-menu-overlay"
                 @click="open = false">
            </div>
            
            <!-- Mobile Header -->
            <div class="container header-container md:hidden">
                <div class="logo-container">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img src="{{ asset('images/logo.svg') }}" alt="شبوة21" class="h-12">
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="searchOpen = !searchOpen" 
                                class="p-2 text-gray-700 hover:text-primary-color transition-colors rounded-full hover:bg-gray-100"
                                :class="{ 'bg-primary-color text-white': searchOpen }">
                            <i class="bi bi-search"></i>
                        </button>
                        <button @click="open = !open" 
                                class="p-2 text-gray-700 hover:text-primary-color transition-colors rounded-full hover:bg-gray-100"
                                :class="{ 'bg-primary-color text-white': open }">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Mobile Search -->
                <div x-show="searchOpen" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                     class="mobile-search py-3 border-t">
                    <form method="get" action="{{ route('news.search') }}" class="flex items-center gap-2">
                        <input type="text" name="q" placeholder="ابحث في الأخبار والمقالات..." 
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary-color focus:border-transparent"
                               x-model="searchQuery"
                               @keyup.enter="$el.form.submit()">
                        <button type="submit" 
                                class="bg-primary-color text-white px-4 py-2 rounded-md hover:bg-opacity-90 transition-colors flex items-center gap-1">
                            <i class="bi bi-search"></i>
                            <span class="text-xs">بحث</span>
                        </button>
                    </form>
                </div>
                
                <!-- Mobile Menu -->
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-full"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-x-0"
                     x-transition:leave-end="opacity-0 transform translate-x-full"
                     class="mobile-menu"
                     @click.away="open = false">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-primary-color">القائمة الرئيسية</h3>
                        <button @click="open = false" class="text-gray-500 hover:text-gray-700 p-1 rounded-full hover:bg-gray-100">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('home') }}" 
                               class="font-bold text-primary-color flex items-center gap-2 p-3 rounded-lg hover:bg-gray-50 transition-colors"
                               @click="open = false">
                                <i class="bi bi-house-door"></i>
                                الصفحة الرئيسية
                            </a>
                        </li>
                        
                        @foreach($mainCategories as $category)
                            <li>
                                <a href="{{ route('news.category', $category->slug) }}" 
                                   class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors"
                                   @click="open = false">
                                    <div class="flex items-center gap-2">
                                        @if($category->icon)
                                            <i class="{{ $category->icon }} text-primary-color"></i>
                                        @endif
                                        <span>{{ $category->name }}</span>
                                    </div>
                                    @if($category->children->count() > 0)
                                        <i class="bi bi-chevron-down text-xs text-gray-400"></i>
                                    @endif
                                </a>
                                @if($category->children->count() > 0)
                                    <ul class="mt-1 space-y-1 pr-4">
                                        @foreach($category->children as $child)
                                            <li>
                                                <a href="{{ route('news.category', $child->slug) }}" 
                                                   class="text-sm flex items-center gap-2 p-2 rounded-lg hover:bg-gray-50 transition-colors"
                                                   @click="open = false">
                                                    @if($child->icon)
                                                        <i class="{{ $child->icon }} text-gray-500"></i>
                                                    @endif
                                                    {{ $child->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        
                        <li>
                            <a href="{{ route('videos.index') }}" 
                               class="flex items-center gap-2 p-3 rounded-lg hover:bg-gray-50 transition-colors"
                               @click="open = false">
                                <i class="bi bi-play-circle text-primary-color"></i>
                                فيديو
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" 
                               class="flex items-center gap-2 p-3 rounded-lg hover:bg-gray-50 transition-colors"
                               @click="open = false">
                                <i class="bi bi-envelope text-primary-color"></i>
                                اتصل بنا
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Mobile Menu Footer -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-center gap-4">
                            <a href="#" class="text-gray-500 hover:text-primary-color transition-colors">
                                <i class="bi bi-facebook text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-primary-color transition-colors">
                                <i class="bi bi-twitter-x text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-primary-color transition-colors">
                                <i class="bi bi-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-primary-color transition-colors">
                                <i class="bi bi-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Top Navigation - Desktop -->
            <nav id="top-nav" class="top-nav header-nav hidden md:block">
                <div class="container">
                    <div class="topbar-wrapper">
                        <!-- التاريخ -->
                        <div class="topbar-today-date">
                            <span x-text="currentDate"></span>
                        </div>
                        
                        <!-- الروابط والأيقونات -->
                        <div class="flex items-center gap-4">
                            <ul class="components flex items-center gap-2">
                                <li class="social-icons-item">
                                    <a href="#" title="RSS" class="tooltip">
                                        <i class="bi bi-rss"></i>
                                    </a>
                                </li>
                                <li class="social-icons-item">
                                    <a href="#" title="فيسبوك" class="tooltip">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </li>
                                <li class="social-icons-item">
                                    <a href="#" title="تويتر" class="tooltip">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                </li>
                                <li class="social-icons-item">
                                    <a href="#" title="لينكد إن" class="tooltip">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </li>
                                <li class="social-icons-item">
                                    <a href="#" title="يوتيوب" class="tooltip">
                                        <i class="bi bi-youtube"></i>
                                    </a>
                                </li>
                                <li class="social-icons-item">
                                    <a href="#" title="إنستغرام" class="tooltip">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li class="social-icons-item">
                                    <a href="#" title="تليجرام" class="tooltip">
                                        <i class="bi bi-telegram"></i>
                                    </a>
                                </li>
                                <li class="menu-item custom-menu-link">
                                    <a href="#" title="مقال عشوائي" class="tooltip">
                                        <i class="bi bi-shuffle"></i>
                                        <span class="hidden md:inline">مقال عشوائي</span>
                                    </a>
                                </li>
                                <li class="menu-item custom-menu-link">
                                    <a href="#" title="القائمة" class="tooltip">
                                        <i class="bi bi-list"></i>
                                        <span class="hidden md:inline">القائمة</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <!-- شريط البحث -->
                            <div class="search-bar menu-item custom-menu-link">
                                <form method="get" action="{{ route('news.search') }}" class="relative">
                                    <input type="text" name="q" placeholder="ابحث في الأخبار والمقالات..." 
                                           class="search-input px-4 py-1.5 pr-10 text-sm"
                                           x-model="searchQuery"
                                           @keyup.enter="$el.form.submit()">
                                    <button type="submit" class="search-submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            
            <!-- Main Navigation - Desktop -->
            <div class="main-nav-wrapper bg-white shadow-sm hidden md:block">
                <nav id="main-nav" class="main-nav header-nav">
                    <div class="container">
                        <div class="main-menu-wrapper">
                            <!-- Logo -->
                            
                            <div class="main-page-btn">
                                <a href="{{ route('home') }}" class="flex items-center gap-2">
                                    <i class="bi bi-house-door"></i>
                                    الصفحة الرئيسية
                                </a>
                            </div>
                            <!-- Navigation Menu -->
                            <div class="main-menu main-menu-wrap flex-1 mx-8">
                                <div id="main-nav-menu" class="main-menu header-menu">
                                    <ul class="menu">
                                        @foreach($mainCategories as $category)
                                            <li class="menu-item group relative">
                                                <a href="{{ route('news.category', $category->slug) }}" 
                                                   class="hover:text-primary-color transition-colors font-medium flex items-center gap-1">
                                                    @if($category->icon)
                                                        <i class="{{ $category->icon }}"></i>
                                                    @endif
                                                    {{ $category->name }}
                                                    @if($category->children->count() > 0)
                                                        <i class="bi bi-chevron-down text-xs"></i>
                                                    @endif
                                                </a>
                                                @if($category->children->count() > 0)
                                                    <ul>
                                                        @foreach($category->children as $child)
                                                            <li>
                                                                <a href="{{ route('news.category', $child->slug) }}" 
                                                                   class="flex items-center">
                                                                    @if($child->icon)
                                                                        <i class="{{ $child->icon }} ml-2"></i>
                                                                    @endif
                                                                    {{ $child->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                        
                                        <li class="menu-item">
                                            <a href="{{ route('videos.index') }}" 
                                               class="hover:text-primary-color transition-colors font-medium flex items-center gap-1">
                                                <i class="bi bi-play-circle"></i>
                                                فيديو
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Main Page Button -->
                          
                        </div>
                    </div>
                </nav>
            </div>
        </header>