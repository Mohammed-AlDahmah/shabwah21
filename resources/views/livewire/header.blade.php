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
            
            <!-- Mobile Header - يظهر فقط في الموبايل -->
            <div class="mobile-header-container md:hidden">
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
                            
                            {{-- فيديو --}}
                            @if($showVideo)
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
                            @endif
                            
                            {{-- عن الموقع --}}
                            @if($showAbout)
                            <li class="mobile-nav-item">
                                <a href="{{ route('about') }}" 
                                   class="mobile-nav-link"
                                   @click="open = false">
                                    <div class="mobile-nav-link-content">
                                        <i class="bi bi-info-circle mobile-nav-icon"></i>
                                        <span class="mobile-nav-text">عن الموقع</span>
                                    </div>
                                    <i class="bi bi-arrow-left mobile-nav-arrow"></i>
                                </a>
                            </li>
                            @endif
                            
                            {{-- اتصل بنا --}}
                            @if($showContact)
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
                            @endif

                            {{-- أيقونات التواصل الاجتماعي --}}
                            @if($showSocial)
                                {{-- ضع هنا كود أيقونات التواصل الاجتماعي --}}
                            @endif
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