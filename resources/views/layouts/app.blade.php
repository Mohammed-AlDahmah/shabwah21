<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'شبوة21 - موقع إخباري احترافي')</title>
    <meta name="description" content="@yield('description', 'موقع شبوة21 الإخباري - آخر الأخبار والتقارير من حضرموت واليمن')">
    <meta name="keywords" content="@yield('keywords', 'أخبار, حضرموت, اليمن, إخبارية')">
    <meta name="author" content="شبوة21">
    
    <!-- الخطوط العربية -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile-menu-fix.css') }}">
  
    @yield('styles')
</head>
<body>
    
    <div id="tie-container" class="site tie-container">
        <div id="tie-wrapper">
            <div class="rainbow-line"></div>
            
            <!-- Header -->
            <livewire:header />
            
            
            
            <!-- Main Content -->
            <main>
                @yield('content')
            </main>
            
            <!-- Footer -->
            <livewire:footer />
            
            <!-- Scroll to Top Button -->
            <button class="scroll-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                <i class="bi bi-arrow-up"></i>
            </button>
            
            <!-- Scroll Progress Indicator -->
            <div class="scroll-indicator"></div>
        </div>
        
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Main JavaScript File -->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/mobile-menu-fix.js') }}"></script>
        <script src="{{ asset('js/livewire-compat.js') }}"></script>

        <!-- Livewire Scripts -->
        @livewireScripts

        @stack('scripts')
        
        <!-- Breaking News Ticker JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // تأكد من عمل شريط البريكينج نيوز
                const breakingNewsScroll = document.querySelector('.breaking-news-scroll');
                if (breakingNewsScroll) {
                    // إعادة تشغيل الحركة إذا توقفت
                    breakingNewsScroll.style.animation = 'none';
                    breakingNewsScroll.offsetHeight; // trigger reflow
                    breakingNewsScroll.style.animation = null;
                    
                    // إضافة event listener للتأكد من استمرار الحركة
                    breakingNewsScroll.addEventListener('animationend', function() {
                        this.style.animation = 'none';
                        this.offsetHeight;
                        this.style.animation = null;
                    });
                }
                
                // تحسين الأداء للشريط المتحرك
                const breakingNewsContainer = document.querySelector('.breaking-news');
                if (breakingNewsContainer) {
                    breakingNewsContainer.addEventListener('mouseenter', function() {
                        const scroll = this.querySelector('.breaking-news-scroll');
                        if (scroll) {
                            scroll.style.animationPlayState = 'paused';
                        }
                    });
                    
                    breakingNewsContainer.addEventListener('mouseleave', function() {
                        const scroll = this.querySelector('.breaking-news-scroll');
                        if (scroll) {
                            scroll.style.animationPlayState = 'running';
                        }
                    });
                }
                
                // Mobile menu toggle
                const toggleButton = document.querySelector('[data-collapse-toggle]');
                const navMenu = document.getElementById('navbar-default');

                if (toggleButton && navMenu) {
                    toggleButton.addEventListener('click', function () {
                        navMenu.classList.toggle('hidden');
                    });
                }
            });
        </script>
    </body>
</html>