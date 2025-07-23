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
    <link rel="stylesheet" href="{{ asset('css/special-sections.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breaking-news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile-fixes.css') }}">
  
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
        </div>
    </div>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Livewire Scripts -->
    @livewireScripts
    
    @stack('scripts')
</body>
</html>