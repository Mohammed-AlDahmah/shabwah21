<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'حضرموت21') }} - @yield('title', 'الصفحة الرئيسية')</title>
    
    <meta name="description" content="@yield('description', 'موقع حضرموت21 الإخباري - آخر الأخبار والتقارير من حضرموت واليمن')">
    <meta name="keywords" content="@yield('keywords', 'أخبار, حضرموت, اليمن, إخبارية')">
    <meta name="author" content="حضرموت21">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', config('app.name', 'حضرموت21'))">
    <meta property="og:description" content="@yield('og_description', 'موقع حضرموت21 الإخباري')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', '/images/logo.png')">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'حضرموت21'))">
    <meta name="twitter:description" content="@yield('twitter_description', 'موقع حضرموت21 الإخباري')">
    <meta name="twitter:image" content="@yield('twitter_image', '/images/logo.png')">
    
    <!-- الخطوط العربية -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .sidebar-bg { background: #23272b; }
        .nav-link.active, .nav-link:hover { background: #C08B2D !important; color: #fff !important; }
        .nav-link { transition: background 0.2s, color 0.2s; }
    </style>
</head>
<body class="bg-gray-50 font-arabic">
    @livewire('breaking-news')
    @livewire('header')
    
    <main class="min-h-screen">
        {{-- يتم عرض محتوى الصفحة هنا عبر @section('content') في كل صفحة --}}
        @yield('content')
    </main>
    
    @livewire('footer')
    @livewireScripts
    
    <!-- إضافة تأثيرات إضافية -->
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
        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>