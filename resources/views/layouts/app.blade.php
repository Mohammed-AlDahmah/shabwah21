<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'شبوة21') }} - @yield('title', 'الصفحة الرئيسية')</title>
    
    <meta name="description" content="@yield('description', 'موقع شبوة21 الإخباري - آخر الأخبار والتقارير من شبوة واليمن')">
    <meta name="keywords" content="@yield('keywords', 'أخبار, شبوة, اليمن, إخبارية')">
    <meta name="author" content="شبوة21">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', config('app.name', 'شبوة21'))">
    <meta property="og:description" content="@yield('og_description', 'موقع شبوة21 الإخباري')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', '/images/logo.png')">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'شبوة21'))">
    <meta name="twitter:description" content="@yield('twitter_description', 'موقع شبوة21 الإخباري')">
    <meta name="twitter:image" content="@yield('twitter_image', '/images/logo.png')">
    
    <!-- الخطوط العربية -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        /* تخصيصات إضافية */
        :root {
            --primary-color: #C08B2D;
            --secondary-color: #FF0000;
        }
        
        /* تأثيرات الحركة */
        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* تحسينات للتصميم المتجاوب */
        @media (max-width: 768px) {
            .site-logo {
                font-size: 2rem;
            }
            
            .tabs-nav {
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div id="app">
        @livewire('header')
        
        <main>
            @yield('content')
        </main>
        
        @livewire('footer')
    </div>
    
    @livewireScripts
    
    <script>
        // تأثير التمرير السلس
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // تأثير ظهور العناصر عند التمرير
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // مراقبة جميع البطاقات
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.news-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>