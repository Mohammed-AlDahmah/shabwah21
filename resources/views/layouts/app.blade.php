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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breaking-news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
    
    <style>
        /* تحديث الألوان الأساسية */
       
        /* أنماط الموقع الأساسية */
        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--light-bg);
            background-image: linear-gradient(45deg, var(--light-bg), var(--light-bg));
        }
        
        /* التخطيط الأساسي */
        #tie-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        #tie-wrapper {
            flex: 1;
        }
        
        /* الشريط الملون */
        .rainbow-line {
            height: 3px;
            background: linear-gradient(to right, #ff6b6b, #feca57, #48dbfb, #ff9ff3, #54a0ff);
        }
        
        /* الحاوي */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* التنسيق المتجاوب */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div id="tie-container" class="site tie-container">
        <div id="tie-wrapper">
            <div class="rainbow-line"></div>
            
            <!-- Header -->
            <livewire:header />
            @include('livewire.partials.hero')
            <!-- Breaking News Ticker -->
            <livewire:breaking-news-ticker />
            
            <!-- Main Content -->
            <main>
                @yield('content')
            </main>
            
            <!-- Footer -->
            <livewire:footer />
        </div>
    </div>
    
    <!-- Livewire Scripts -->
    @livewireScripts
    
    @stack('scripts')
</body>
</html>