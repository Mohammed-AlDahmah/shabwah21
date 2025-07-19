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
            <div class="mobile-header-container">
                <div class="mobile-header-wrapper">
                    <div class="mobile-logo-section">
                        <a href="{{ route('home') }}" class="mobile-logo-link">
                            <img src="{{ asset('images/logo.png') }}" alt="شبوة21" class="mobile-logo-img">
                        </a>
                    </div>
                    <div class="mobile-controls-section">
                        <button @click="searchOpen = !searchOpen" 
                                class="mobile-control-btn mobile-search-btn"
                                :class="{ 'active': searchOpen }"
                                title="بحث">
                            <i class="bi bi-search"></i>
                        </button>
                        <button @click="open = !open" 
                                class="mobile-control-btn mobile-menu-btn"
                                :class="{ 'active': open }"
                                title="القائمة">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Mobile Search Bar -->
                <div x-show="searchOpen" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                     class="mobile-search-container">
                    <form method="get" action="{{ route('news.search') }}" class="mobile-search-form">
                        <div class="mobile-search-input-wrapper">
                            <i class="bi bi-search mobile-search-icon"></i>
                            <input type="text" name="q" placeholder="ابحث في الأخبار والمقالات..." 
                                   class="mobile-search-input"
                                   x-model="searchQuery"
                                   @keyup.enter="$el.form.submit()">
                        </div>
                        <button type="submit" class="mobile-search-submit-btn">
                            <span>بحث</span>
                        </button>
                    </form>
                </div>
                
                <!-- Mobile Navigation Menu -->
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-full"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-x-0"
                     x-transition:leave-end="opacity-0 transform translate-x-full"
                     class="mobile-nav-menu"
                     @click.away="open = false">
                    
                    <!-- Mobile Menu Header -->
                    <div class="mobile-nav-header">
                        <div class="mobile-nav-title-section">
                            <h3 class="mobile-nav-title">القائمة الرئيسية</h3>
                            <p class="mobile-nav-subtitle">شبوة21 - موقع إخباري احترافي</p>
                        </div>
                        <button @click="open = false" class="mobile-nav-close-btn" title="إغلاق">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    
                    <!-- Mobile Menu Content -->
                    <div class="mobile-nav-content">
                        <ul class="mobile-nav-list">
                            <!-- الصفحة الرئيسية -->
                            <li class="mobile-nav-item">
                                <a href="{{ route('home') }}" 
                                   class="mobile-nav-link mobile-nav-link-primary"
                                   @click="open = false">
                                    <div class="mobile-nav-link-content">
                                        <i class="bi bi-house-door mobile-nav-icon"></i>
                                        <span class="mobile-nav-text">الصفحة الرئيسية</span>
                                    </div>
                                    <i class="bi bi-arrow-left mobile-nav-arrow"></i>
                                </a>
                            </li>
                            
                            <!-- الفئات الرئيسية -->
                            @foreach($mainCategories as $category)
                                <li class="mobile-nav-item">
                                    <a href="{{ route('news.category', $category->slug) }}" 
                                       class="mobile-nav-link"
                                       @click="open = false">
                                        <div class="mobile-nav-link-content">
                                            @if($category->icon)
                                                <i class="{{ $category->icon }} mobile-nav-icon"></i>
                                            @else
                                                <i class="bi bi-folder mobile-nav-icon"></i>
                                            @endif
                                            <span class="mobile-nav-text">{{ $category->name }}</span>
                                        </div>
                                        @if($category->children->count() > 0)
                                            <i class="bi bi-chevron-down mobile-nav-arrow"></i>
                                        @else
                                            <i class="bi bi-arrow-left mobile-nav-arrow"></i>
                                        @endif
                                    </a>
                                    
                                    <!-- الفئات الفرعية -->
                                    @if($category->children->count() > 0)
                                        <ul class="mobile-sub-nav-list">
                                            @foreach($category->children as $child)
                                                <li class="mobile-sub-nav-item">
                                                    <a href="{{ route('news.category', $child->slug) }}" 
                                                       class="mobile-sub-nav-link"
                                                       @click="open = false">
                                                        <div class="mobile-sub-nav-content">
                                                            @if($child->icon)
                                                                <i class="{{ $child->icon }} mobile-sub-nav-icon"></i>
                                                            @else
                                                                <i class="bi bi-dot mobile-sub-nav-icon"></i>
                                                            @endif
                                                            <span class="mobile-sub-nav-text">{{ $child->name }}</span>
                                                        </div>
                                                        <i class="bi bi-arrow-left mobile-sub-nav-arrow"></i>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            
                            <!-- فيديو -->
                            <li class="mobile-nav-item">
                                <a href="{{ route('videos.index') }}" 
                                   class="mobile-nav-link"
                                   @click="open = false">
                                    <div class="mobile-nav-link-content">
                                        <i class="bi bi-play-circle mobile-nav-icon"></i>
                                        <span class="mobile-nav-text">فيديو</span>
                                    </div>
                                    <i class="bi bi-arrow-left mobile-nav-arrow"></i>
                                </a>
                            </li>
                            
                            <!-- اتصل بنا -->
                            <li class="mobile-nav-item">
                                <a href="{{ route('contact') }}" 
                                   class="mobile-nav-link"
                                   @click="open = false">
                                    <div class="mobile-nav-link-content">
                                        <i class="bi bi-envelope mobile-nav-icon"></i>
                                        <span class="mobile-nav-text">اتصل بنا</span>
                                    </div>
                                    <i class="bi bi-arrow-left mobile-nav-arrow"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Mobile Menu Footer -->
                    <div class="mobile-nav-footer">
                        <div class="mobile-social-section">
                            <h4 class="mobile-social-title">تابعنا على</h4>
                            <div class="mobile-social-links">
                                <a href="#" class="mobile-social-link" title="فيسبوك">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="#" class="mobile-social-link" title="تويتر">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="#" class="mobile-social-link" title="إنستغرام">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="#" class="mobile-social-link" title="يوتيوب">
                                    <i class="bi bi-youtube"></i>
                                </a>
                                <a href="#" class="mobile-social-link" title="تليجرام">
                                    <i class="bi bi-telegram"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="mobile-footer-info">
                            <p class="mobile-footer-text">© 2025 شبوة21 - جميع الحقوق محفوظة</p>
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
                            <div class="image-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="شبوة21">
                                </a>
                            </div>
                            
                            <!-- Navigation Menu -->
                            <div class="main-menu main-menu-wrap">
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
                            <div class="main-page-btn">
                                <a href="{{ route('home') }}" class="flex items-center gap-2">
                                    <i class="bi bi-house-door"></i>
                                    الصفحة الرئيسية
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>