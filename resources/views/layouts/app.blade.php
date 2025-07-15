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
    <meta property="og:description" content="@yield('og_description', 'موقع شبوة21 الإخباري - بوابة الأخبار الأولى')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', '/images/logo.png')">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'شبوة21'))">
    <meta name="twitter:description" content="@yield('twitter_description', 'موقع شبوة21 الإخباري - بوابة الأخبار الأولى')">
    <meta name="twitter:image" content="@yield('twitter_image', '/images/logo.png')">
    
    <!-- الخطوط العربية المحدثة -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <!-- Bootstrap CSS RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        /* تحسينات إضافية للتصميم */
        body { 
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            font-family: 'Noto Sans Arabic', 'Tajawal', sans-serif;
            overflow-x: hidden;
        }
        
        /* تأثيرات الانتقال الناعم للصفحات */
        .page-wrapper {
            animation: pageLoad 0.6s ease-out;
        }
        
        @keyframes pageLoad {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* تحسين تأثير التمرير */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
        
        /* تأثيرات الخلفية المتحركة */
        .main-bg {
            position: relative;
            min-height: 100vh;
        }
        
        .main-bg::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.05) 0%, transparent 50%);
            z-index: -1;
            animation: bgPulse 10s ease-in-out infinite;
        }
        
        @keyframes bgPulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        
        /* تحسين التنسيق للأجهزة المحمولة */
        @media (max-width: 768px) {
            .main-bg::before {
                display: none;
            }
        }
        
        /* تأثيرات الخطوط */
        .font-display {
            font-family: 'Tajawal', 'Noto Sans Arabic', sans-serif;
        }
        
        .font-body {
            font-family: 'Noto Sans Arabic', 'Tajawal', sans-serif;
        }
        
        /* تأثيرات الظل المتقدمة */
        .shadow-elevation-1 {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .shadow-elevation-2 {
            box-shadow: 0 4px 8px rgba(0,0,0,0.12);
        }
        
        .shadow-elevation-3 {
            box-shadow: 0 8px 16px rgba(0,0,0,0.14);
        }
        
        /* تأثيرات الألوان المتقدمة */
        .text-gradient {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .bg-glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* تأثيرات الأزرار المتقدمة */
        .btn-modern {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-modern:hover::before {
            left: 100%;
        }
        
        /* تأثيرات الكارتات المتقدمة */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        /* تأثيرات الصور المتقدمة */
        .img-hover {
            transition: all 0.3s ease;
        }
        
        .img-hover:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }
    </style>
</head>
<body class="font-arabic main-bg">
    <div class="page-wrapper">
        @livewire('header')
        
        <main class="min-h-screen">
            @yield('content')
        </main>
        
        @livewire('footer')
    </div>
    
    @livewireScripts
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- تأثيرات JavaScript محسنة -->
    <script>
        // تأثير التمرير السلس المحسن
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

        // تأثير ظهور العناصر عند التمرير المحسن
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    entry.target.style.animationDelay = '0.1s';
                }
            });
        }, observerOptions);

        // مراقبة العناصر المختلفة
        document.querySelectorAll('.card-modern, .fade-in-up-modern').forEach(element => {
            observer.observe(element);
        });

        // تأثيرات الماوس للبطاقات
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
            });
        });

        // تأثيرات الكتابة المتحركة
        function typeWriter(element, text, speed = 50) {
            let i = 0;
            element.innerHTML = '';
            
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            
            type();
        }

        // تأثيرات الأرقام المتحركة
        function animateNumbers() {
            document.querySelectorAll('.animate-number').forEach(element => {
                const target = parseInt(element.textContent);
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    element.textContent = Math.floor(current);
                    if (current >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    }
                }, 20);
            });
        }

        // تأثيرات الشحن المتقدمة
        function showLoading() {
            const loadingOverlay = document.createElement('div');
            loadingOverlay.id = 'loading-overlay';
            loadingOverlay.innerHTML = `
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
                        <p class="text-gray-600">جاري التحميل...</p>
                    </div>
                </div>
            `;
            document.body.appendChild(loadingOverlay);
        }

        function hideLoading() {
            const loadingOverlay = document.getElementById('loading-overlay');
            if (loadingOverlay) {
                loadingOverlay.remove();
            }
        }

        // تأثيرات الإشعارات
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg text-white max-w-sm transform transition-all duration-300 translate-x-full`;
            
            const bgColor = type === 'success' ? 'bg-green-500' : 
                           type === 'error' ? 'bg-red-500' : 
                           type === 'warning' ? 'bg-yellow-500' : 'bg-blue-500';
            
            notification.classList.add(bgColor);
            notification.innerHTML = `
                <div class="flex items-center">
                    <span class="flex-1">${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="mr-4 text-white hover:text-gray-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 5000);
        }

        // تأثيرات التحميل التلقائي
        window.addEventListener('load', function() {
            // إخفاء شاشة التحميل
            hideLoading();
            
            // تفعيل تأثيرات الأرقام
            animateNumbers();
            
            // تأثيرات إضافية للعناصر
            document.querySelectorAll('.fade-in-up-modern').forEach((element, index) => {
                setTimeout(() => {
                    element.classList.add('visible');
                }, index * 100);
            });
        });

        // تأثيرات الأداء
        let ticking = false;
        function updateScrollEffects() {
            if (!ticking) {
                requestAnimationFrame(() => {
                    const scrollTop = window.pageYOffset;
                    const header = document.querySelector('header');
                    
                    if (header) {
                        if (scrollTop > 100) {
                            header.classList.add('backdrop-blur-lg', 'bg-white/90');
                        } else {
                            header.classList.remove('backdrop-blur-lg', 'bg-white/90');
                        }
                    }
                    
                    ticking = false;
                });
                ticking = true;
            }
        }

        window.addEventListener('scroll', updateScrollEffects);
        
        // تأثيرات الأمان
        document.addEventListener('contextmenu', function(e) {
            // يمكن إضافة منع النقر اليميني إذا لزم الأمر
        });
    </script>
</body>
</html>