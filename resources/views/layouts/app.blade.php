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
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breaking-news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/featured-news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/infographics.css') }}">
    <link rel="stylesheet" href="{{ asset('css/infographics-enhanced.css') }}">
    <link rel="stylesheet" href="{{ asset('css/special-sections.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breaking-news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile-fixes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile-performance-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile-menu-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
  
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
    </div>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- نظام الإشعارات المخصص -->
    <script src="{{ asset('js/notifications.js') }}"></script>
    
    <!-- Lazy Loading Enhancement -->
    <script src="{{ asset('js/lazy-loading.js') }}"></script>
    
    <!-- Mobile Performance Enhancement -->
    <script src="{{ asset('js/mobile-performance.js') }}"></script>
    
    <!-- Header Fix Enhancement -->
    <script src="{{ asset('js/header-fix.js') }}"></script>
    
    <!-- Mobile Menu Fix -->
    <script src="{{ asset('js/mobile-menu-fix.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

    @stack('scripts')
  </body>
</html>