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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Noto+Sans+Arabic:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1a1a1a;
            --secondary-color: #e74c3c;
            --accent-color: #f39c12;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --bg-light: #f8f9fa;
            --bg-white: #ffffff;
            --border-color: #e9ecef;
        }
        
        body { 
            font-family: 'Cairo', 'Noto Sans Arabic', sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
        }
        
        .nav-link {
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary-color);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .breaking-news {
            background: linear-gradient(90deg, var(--secondary-color), #c0392b);
            color: white;
            padding: 8px 0;
            font-weight: 600;
        }
        
        .breaking-news .ticker {
            animation: ticker 30s linear infinite;
        }
        
        @keyframes ticker {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .featured-card .card-img-top {
            height: 300px;
        }
        
        .category-badge {
            background: var(--secondary-color);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 2;
        }
        
        .news-meta {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .sidebar-card {
            background: var(--bg-white);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .sidebar-title {
            color: var(--primary-color);
            font-weight: 700;
            border-bottom: 3px solid var(--secondary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .latest-news-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }
        
        .latest-news-item:hover {
            background: var(--bg-light);
            padding-right: 10px;
        }
        
        .latest-news-item:last-child {
            border-bottom: none;
        }
        
        .latest-news-img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            margin-left: 15px;
        }
        
        .footer {
            background: var(--primary-color);
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer h5 {
            color: var(--accent-color);
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: var(--accent-color);
        }
        
        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--secondary-color);
            color: white;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            border-radius: 25px;
            border: 2px solid var(--border-color);
            padding: 10px 45px 10px 20px;
            transition: all 0.3s ease;
        }
        
        .search-box input:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
        }
        
        .search-box button {
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--secondary-color);
            border: none;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .search-box button:hover {
            background: var(--accent-color);
        }
        
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }
            
            .breaking-news {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    @livewire('header')
    
    <main>
        @yield('content')
    </main>
    
    @livewire('footer')
    @livewireScripts
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
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
        
        // تأثير التمرير للشريط العلوي
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
</body>
</html>