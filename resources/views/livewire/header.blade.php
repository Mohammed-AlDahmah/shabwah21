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
x-init="$watch('isSticky', value => window.adjustBodyPaddingForHeader(value))"
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
            
            <!-- Mobile Header - يظهر فقط في الموبايل -->
            <div class="md:hidden">
                <header x-data="{ open: false, searchOpen: false }" class="bg-white shadow-md">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-14 items-center">
                            <!-- Logo -->
                            <div class="flex-shrink-0">
                                <a href="{{ route('home') }}" class="flex items-center">
                                    <img src="{{ asset('images/logo.png') }}" alt="شبوة21" class="h-8 w-auto">
                                </a>
                            </div>

                            <!-- أزرار التحكم في الجوال -->
                            <div class="flex items-center gap-3">
                                <!-- زر البحث -->
                                <button @click="searchOpen = !searchOpen" 
                                        class="text-gray-700 hover:text-primary focus:outline-none p-2 rounded-md transition-colors duration-200"
                                        :class="{ 'text-primary bg-primary/10': searchOpen }">
                                    <i class="bi bi-search text-lg"></i>
                                </button>
                                
                                <!-- زر القائمة في الجوال -->
                                <button @click="open = !open" 
                                        class="text-gray-700 hover:text-primary focus:outline-none p-2 rounded-md transition-colors duration-200"
                                        :class="{ 'text-primary bg-primary/10': open }">
                                    <i class="bi bi-list text-lg" x-show="!open"></i>
                                    <i class="bi bi-x-lg text-lg" x-show="open"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- شريط البحث في الموبايل -->
                    <div x-show="searchOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="bg-white border-t border-gray-200 px-4 py-3">
                        <form method="get" action="{{ route('news.search') }}" class="flex">
                            <input type="text" name="q" placeholder="ابحث في الأخبار والمقالات..." 
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-primary text-sm"
                                   @keyup.enter="$el.form.submit()">
                            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-l-md hover:bg-primary/90 text-sm transition-colors duration-200">
                                بحث
                            </button>
                        </form>
                    </div>

                    <!-- روابط القائمة في الشاشات الصغيرة -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="bg-white shadow-md border-t border-gray-200" >
                        <nav class="px-4 py-3 space-y-1">
                            <!-- الرئيسية -->
                            <a href="{{ route('home') }}" 
                               class="flex items-center text-gray-700 hover:text-primary py-2 px-3 rounded-md text-sm font-medium transition-colors duration-200"
                               @click="open = false">
                                <i class="bi bi-house-door ml-3 text-lg !block !inline-block" style="display: inline-block !important;"></i>
                                الرئيسية
                            </a>
                            
                            <!-- الفئات الرئيسية مع الفئات الفرعية -->
                            @foreach($mainCategories as $category)
                                <div class="mobile-category-group">
                                    <a href="{{ route('news.category', $category->slug) }}" 
                                       class="flex items-center text-gray-700 hover:text-primary py-2 px-3 rounded-md text-sm font-medium transition-colors duration-200"
                                       @click="open = false">
                                        <i class="bi bi-folder ml-3 text-lg !block !inline-block" style="display: inline-block !important;"></i>
                                        {{ $category->name }}
                                    </a>
                                    
                                    <!-- الفئات الفرعية -->
                                    @if($category->children && $category->children->count() > 0)
                                        <div class="mobile-subcategories ml-4 mt-1 space-y-1">
                                            @foreach($category->children as $subCategory)
                                                <a href="{{ route('news.category', $subCategory->slug) }}" 
                                                   class="flex items-center text-gray-600 hover:text-primary py-1 px-3 rounded-md text-xs transition-colors duration-200"
                                                   @click="open = false">
                                                    <i class="bi bi-chevron-right ml-2 text-sm !block !inline-block" style="display: inline-block !important;"></i>
                                                    {{ $subCategory->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            
                            <!-- فيديو -->
                            <a href="{{ route('videos.index') }}" 
                               class="flex items-center text-gray-700 hover:text-primary py-2 px-3 rounded-md text-sm font-medium transition-colors duration-200"
                               @click="open = false">
                                <i class="bi bi-play-circle ml-3 text-lg !block !inline-block" style="display: inline-block !important;"></i>
                                فيديو
                            </a>
                            
                            <!-- عن الموقع -->
                            <a href="{{ route('about') }}" 
                               class="flex items-center text-gray-700 hover:text-primary py-2 px-3 rounded-md text-sm font-medium transition-colors duration-200"
                               @click="open = false">
                                <i class="bi bi-info-circle ml-3 text-lg !block !inline-block" style="display: inline-block !important;"></i>
                                عن الموقع
                            </a>
                            
                            <!-- اتصل بنا -->
                            <a href="{{ route('contact') }}" 
                               class="flex items-center text-gray-700 hover:text-primary py-2 px-3 rounded-md text-sm font-medium transition-colors duration-200"
                               @click="open = false">
                                <i class="bi bi-envelope ml-3 text-lg !block !inline-block" style="display: inline-block !important;"></i>
                                اتصل بنا
                            </a>
                            
                            <!-- البحث -->
                            <a href="{{ route('news.search') }}" 
                               class="flex items-center text-gray-700 hover:text-primary py-2 px-3 rounded-md text-sm font-medium transition-colors duration-200"
                               @click="open = false">
                                <i class="bi bi-search ml-3 text-lg !block !inline-block" style="display: inline-block !important;"></i>
                                البحث
                            </a>
                        </nav>
                    </div>
                </header>
            </div>
            
            <!-- Desktop Header - يظهر فقط في الديسكتوب -->
            <div class="desktop-header-container hidden md:block">
            <!-- Top Navigation - Desktop -->
                <nav id="top-nav" class="top-nav header-nav">
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
                <div class="main-nav-wrapper bg-white shadow-sm">
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
                                        
                                            {{-- فيديو --}}
                                            @if($showVideo)
                                        <li class="menu-item">
                                            <a href="{{ route('videos.index') }}" 
                                               class="hover:text-primary-color transition-colors font-medium flex items-center gap-1">
                                                <i class="bi bi-play-circle"></i>
                                                فيديو
                                            </a>
                                        </li>
                                            @endif

                                            {{-- عن الموقع --}}
                                            @if($showAbout)
                                            <li class="menu-item">
                                                <a href="{{ route('about') }}" 
                                                   class="hover:text-primary-color transition-colors font-medium flex items-center gap-1">
                                                    <i class="bi bi-info-circle"></i>
                                                    عن الموقع
                                                </a>
                                            </li>
                                            @endif

                                            {{-- اتصل بنا --}}
                                            @if($showContact)
                                            <li class="menu-item">
                                                <a href="{{ route('contact') }}" 
                                                   class="hover:text-primary-color transition-colors font-medium flex items-center gap-1">
                                                    <i class="bi bi-envelope"></i>
                                                    اتصل بنا
                                                </a>
                                            </li>
                                            @endif

                                            {{-- أيقونات التواصل الاجتماعي --}}
                                            @if($showSocial)
                                                {{-- ضع هنا كود أيقونات التواصل الاجتماعي --}}
                                            @endif
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
            </div>
        </header>

<script>
// Enhanced Header Scroll Effects for Chrome and Mobile compatibility
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.theme-header');
    const mobileHeader = document.querySelector('.mobile-header-container');
    const desktopHeader = document.querySelector('.desktop-header-container');
    let lastScrollTop = 0;
    let scrollTimeout;
    let ticking = false;
    
    function updateHeader() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollThreshold = 30;
        const hideThreshold = 80;
        const isMobile = window.innerWidth <= 768;
        
        // إزالة الكلاسات السابقة
        header.classList.remove('header-scrolled', 'header-compact');
        
        if (scrollTop > scrollThreshold) {
            // إخفاء الـ top navigation مباشرة
            header.classList.add('header-compact');
        }
        
        if (scrollTop > hideThreshold) {
            // إخفاء الـ top navigation عند التمرير للأسفل
            if (scrollTop > lastScrollTop) {
                header.classList.add('header-scrolled');
            } else {
                // إظهار الـ top navigation عند التمرير للأعلى
                header.classList.remove('header-scrolled');
            }
        }
        
        // Mobile-specific sticky handling
        if (isMobile && mobileHeader) {
            if (scrollTop > 100) {
                // Ensure mobile header is sticky
                mobileHeader.style.position = 'fixed';
                mobileHeader.style.top = '0';
                mobileHeader.style.left = '0';
                mobileHeader.style.right = '0';
                mobileHeader.style.width = '100%';
                mobileHeader.style.zIndex = '1001';
                mobileHeader.style.transform = 'translateZ(0)';
                mobileHeader.style.webkitTransform = 'translateZ(0)';
                mobileHeader.style.willChange = 'transform';
                mobileHeader.style.background = 'rgba(255, 255, 255, 0.95)';
                mobileHeader.style.backdropFilter = 'blur(10px)';
                mobileHeader.style.webkitBackdropFilter = 'blur(10px)';
            } else {
                // Reset mobile header to normal
                mobileHeader.style.position = 'relative';
                mobileHeader.style.background = 'white';
                mobileHeader.style.backdropFilter = 'none';
                mobileHeader.style.webkitBackdropFilter = 'none';
            }
        }
        
        lastScrollTop = scrollTop;
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateHeader);
            ticking = true;
        }
    }
    
    // إضافة event listener للتمرير مع throttling
    window.addEventListener('scroll', function() {
        requestTick();
    }, { passive: true });
    
    // إضافة event listener للتمرير مع debouncing للـ resize
    window.addEventListener('resize', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(updateHeader, 100);
    }, { passive: true });
    
    // تفعيل عند تحميل الصفحة
    updateHeader();
    
    // Chrome-specific fixes
    if (navigator.userAgent.indexOf('Chrome') !== -1) {
        // Force reflow for Chrome
        header.style.transform = 'translateZ(0)';
        header.style.webkitTransform = 'translateZ(0)';
        
        // Ensure sticky positioning works
        if (header.classList.contains('sticky-header')) {
            header.style.position = 'fixed';
            header.style.top = '0';
            header.style.left = '0';
            header.style.right = '0';
            header.style.width = '100%';
            header.style.zIndex = '1001';
        }
        
        // Mobile header Chrome fixes
        if (mobileHeader) {
            mobileHeader.style.transform = 'translateZ(0)';
            mobileHeader.style.webkitTransform = 'translateZ(0)';
            mobileHeader.style.willChange = 'transform';
        }
    }
    
    // Mutation observer for dynamic content changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                if (header.classList.contains('sticky-header')) {
                    // Ensure sticky header is properly positioned
                    header.style.position = 'fixed';
                    header.style.top = '0';
                    header.style.left = '0';
                    header.style.right = '0';
                    header.style.width = '100%';
                    header.style.zIndex = '1001';
                    header.style.transform = 'translateZ(0)';
                    header.style.webkitTransform = 'translateZ(0)';
                    
                    // Mobile header specific fixes
                    if (mobileHeader && window.innerWidth <= 768) {
                        mobileHeader.style.position = 'fixed';
                        mobileHeader.style.top = '0';
                        mobileHeader.style.left = '0';
                        mobileHeader.style.right = '0';
                        mobileHeader.style.width = '100%';
                        mobileHeader.style.zIndex = '1001';
                        mobileHeader.style.transform = 'translateZ(0)';
                        mobileHeader.style.webkitTransform = 'translateZ(0)';
                        mobileHeader.style.background = 'rgba(255, 255, 255, 0.95)';
                        mobileHeader.style.backdropFilter = 'blur(10px)';
                        mobileHeader.style.webkitBackdropFilter = 'blur(10px)';
                    }
                }
            }
        });
    });
    
    observer.observe(header, {
        attributes: true,
        attributeFilter: ['class']
    });
});

// Additional Chrome and Mobile-specific fixes
if (navigator.userAgent.indexOf('Chrome') !== -1) {
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('.theme-header');
        const mobileHeader = document.querySelector('.mobile-header-container');
        
        // Force hardware acceleration
        header.style.transform = 'translateZ(0)';
        header.style.webkitTransform = 'translateZ(0)';
        header.style.willChange = 'transform';
        
        if (mobileHeader) {
            mobileHeader.style.transform = 'translateZ(0)';
            mobileHeader.style.webkitTransform = 'translateZ(0)';
            mobileHeader.style.willChange = 'transform';
        }
        
        // Ensure proper stacking context
        header.style.zIndex = '1000';
        
        // Fix for Chrome's sticky positioning issues
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const isMobile = window.innerWidth <= 768;
            
            if (header.classList.contains('sticky-header')) {
                header.style.position = 'fixed';
                header.style.top = '0';
                header.style.left = '0';
                header.style.right = '0';
                header.style.width = '100%';
                header.style.zIndex = '1001';
                
                // Mobile header specific fixes
                if (isMobile && mobileHeader) {
                    mobileHeader.style.position = 'fixed';
                    mobileHeader.style.top = '0';
                    mobileHeader.style.left = '0';
                    mobileHeader.style.right = '0';
                    mobileHeader.style.width = '100%';
                    mobileHeader.style.zIndex = '1001';
                    mobileHeader.style.background = 'rgba(255, 255, 255, 0.95)';
                    mobileHeader.style.backdropFilter = 'blur(10px)';
                    mobileHeader.style.webkitBackdropFilter = 'blur(10px)';
                }
            }
        }, { passive: true });
    });
}

// Mobile-specific fixes for all browsers
document.addEventListener('DOMContentLoaded', function() {
    const mobileHeader = document.querySelector('.mobile-header-container');
    
    if (mobileHeader) {
        // Ensure mobile header has proper positioning
        mobileHeader.style.position = 'relative';
        mobileHeader.style.zIndex = '1000';
        
        // Handle mobile header sticky behavior
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const isMobile = window.innerWidth <= 768;
            
            if (isMobile && scrollTop > 100) {
                mobileHeader.style.position = 'fixed';
                mobileHeader.style.top = '0';
                mobileHeader.style.left = '0';
                mobileHeader.style.right = '0';
                mobileHeader.style.width = '100%';
                mobileHeader.style.zIndex = '1001';
                mobileHeader.style.background = 'rgba(255, 255, 255, 0.95)';
                mobileHeader.style.backdropFilter = 'blur(10px)';
                mobileHeader.style.webkitBackdropFilter = 'blur(10px)';
            } else if (isMobile) {
                mobileHeader.style.position = 'relative';
                mobileHeader.style.background = 'white';
                mobileHeader.style.backdropFilter = 'none';
                mobileHeader.style.webkitBackdropFilter = 'none';
            }
        }, { passive: true });
    }
});
</script>