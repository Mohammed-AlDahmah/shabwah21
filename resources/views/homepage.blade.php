<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'الموقع الإخباري') }} - آخر الأخبار والتقارير</title>
    
    <!-- الخطوط العربية -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { 
            font-family: 'Cairo', sans-serif;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <!-- الشريط العلوي -->
    <div class="bg-dark text-white py-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <small>
                        <i class="bi bi-calendar3"></i> {{ now()->format('l d F Y') }}
                        <span class="mx-2">|</span>
                        <i class="bi bi-clock"></i> <span id="live-clock">{{ now()->format('H:i:s') }}</span>
                    </small>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-inline-flex gap-2">
                        <a href="#" class="social-icon facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-icon youtube"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-icon instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- الهيدر الرئيسي -->
    <header class="main-nav sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="/images/logo.svg" alt="Logo" height="50" class="me-2">
                    <span class="fs-3 fw-bold text-danger">الأخبار 24</span>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link nav-item fw-bold" href="/">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link nav-item" href="#">محليات</a></li>
                        <li class="nav-item"><a class="nav-link nav-item" href="#">سياسة</a></li>
                        <li class="nav-item"><a class="nav-link nav-item" href="#">اقتصاد</a></li>
                        <li class="nav-item"><a class="nav-link nav-item" href="#">رياضة</a></li>
                        <li class="nav-item"><a class="nav-link nav-item" href="#">ثقافة</a></li>
                        <li class="nav-item"><a class="nav-link nav-item" href="#">تكنولوجيا</a></li>
                        <li class="nav-item"><a class="nav-link nav-item" href="#">منوعات</a></li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-2">
                        <form class="d-flex">
                            <input class="form-control form-control-sm" type="search" placeholder="بحث...">
                            <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- شريط الأخبار العاجلة -->
    <div class="news-ticker">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="bg-white text-danger px-3 py-2 fw-bold">
                    <i class="bi bi-megaphone-fill"></i> عاجل
                </div>
                <div class="news-ticker-content px-3">
                    @if(isset($breakingNews) && $breakingNews->count() > 0)
                        @foreach($breakingNews as $news)
                            <span class="mx-5">• {{ $news->title }}</span>
                        @endforeach
                    @else
                        <span class="mx-5">• عاجل: تطورات جديدة في الأحداث المحلية تثير اهتمام المواطنين</span>
                        <span class="mx-5">• الحكومة تعلن عن إجراءات جديدة لتحسين الخدمات العامة</span>
                        <span class="mx-5">• ارتفاع أسعار النفط عالمياً يؤثر على الأسواق المحلية</span>
                        <span class="mx-5">• المنتخب الوطني يحقق فوزاً مهماً في التصفيات</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- المحتوى الرئيسي -->
    <main class="py-4">
        <div class="container">
            <!-- القسم الرئيسي والأخبار المميزة -->
            <div class="row mb-4">
                <!-- الخبر الرئيسي -->
                <div class="col-lg-8 mb-4">
                    <div class="featured-section p-4 h-100">
                        <div class="news-card bg-white rounded overflow-hidden h-100">
                            <div class="news-image" style="height: 400px;">
                                <img src="https://via.placeholder.com/800x400/dc3545/ffffff?text=الخبر+الرئيسي" 
                                     class="w-100 h-100 object-fit-cover" alt="الخبر الرئيسي">
                            </div>
                            <div class="p-4">
                                <span class="category-badge">سياسة</span>
                                <h2 class="mt-3 mb-3 fw-bold">عنوان الخبر الرئيسي المميز يظهر هنا مع تفاصيل مهمة</h2>
                                <p class="text-muted mb-3">نص تمهيدي للخبر الرئيسي يوضح أهم النقاط والتفاصيل المتعلقة بالحدث. هذا النص يجذب القارئ لمعرفة المزيد من التفاصيل...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-clock"></i> منذ ساعتين
                                    </small>
                                    <a href="#" class="btn btn-danger btn-sm">اقرأ المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- الأخبار الجانبية المميزة -->
                <div class="col-lg-4">
                    <div class="row g-3">
                        @for($i = 1; $i <= 3; $i++)
                        <div class="col-12">
                            <div class="news-card bg-white rounded overflow-hidden">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <div class="news-image" style="height: 120px;">
                                            <img src="https://via.placeholder.com/150x120/0d6efd/ffffff?text=خبر+{{$i}}" 
                                                 class="w-100 h-100 object-fit-cover" alt="خبر {{$i}}">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="p-3">
                                            <span class="category-badge" style="background: #e3f2fd; color: #0d6efd;">اقتصاد</span>
                                            <h6 class="mt-2 mb-2 fw-bold">عنوان خبر فرعي مهم رقم {{$i}}</h6>
                                            <small class="text-muted">
                                                <i class="bi bi-clock"></i> منذ {{$i}} ساعة
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- أقسام الأخبار -->
            <div class="row">
                <!-- العمود الرئيسي -->
                <div class="col-lg-8">
                    <!-- قسم آخر الأخبار -->
                    <section class="mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fw-bold border-start border-danger border-5 ps-3">آخر الأخبار</h3>
                            <a href="#" class="text-danger">عرض الكل <i class="bi bi-arrow-left"></i></a>
                        </div>
                        
                        <div class="row g-3">
                            @for($i = 1; $i <= 6; $i++)
                            <div class="col-md-6">
                                <div class="news-card bg-white rounded overflow-hidden h-100">
                                    <div class="news-image" style="height: 200px;">
                                        <img src="https://via.placeholder.com/400x200/6c757d/ffffff?text=خبر+{{$i}}" 
                                             class="w-100 h-100 object-fit-cover" alt="خبر {{$i}}">
                                    </div>
                                    <div class="p-3">
                                        <span class="category-badge" style="background: #f8d7da; color: #dc3545;">محليات</span>
                                        <h5 class="mt-2 mb-2 fw-bold">عنوان الخبر رقم {{$i}} يظهر هنا</h5>
                                        <p class="text-muted small mb-2">وصف مختصر للخبر يوضح أهم النقاط...</p>
                                        <small class="text-muted">
                                            <i class="bi bi-clock"></i> منذ {{$i}} ساعات
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </section>

                    <!-- قسم الرياضة -->
                    <section class="mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fw-bold border-start border-success border-5 ps-3">رياضة</h3>
                            <a href="#" class="text-success">عرض الكل <i class="bi bi-arrow-left"></i></a>
                        </div>
                        
                        <div class="row g-3">
                            @for($i = 1; $i <= 4; $i++)
                            <div class="col-md-6">
                                <div class="news-card bg-white rounded overflow-hidden">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            <div class="news-image" style="height: 100px;">
                                                <img src="https://via.placeholder.com/150x100/198754/ffffff?text=رياضة+{{$i}}" 
                                                     class="w-100 h-100 object-fit-cover" alt="رياضة {{$i}}">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="p-3">
                                                <h6 class="fw-bold">خبر رياضي مهم رقم {{$i}}</h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-clock"></i> منذ {{$i}} ساعة
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </section>

                    <!-- قسم التكنولوجيا -->
                    <section class="mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fw-bold border-start border-info border-5 ps-3">تكنولوجيا</h3>
                            <a href="#" class="text-info">عرض الكل <i class="bi bi-arrow-left"></i></a>
                        </div>
                        
                        <div class="row g-3">
                            @for($i = 1; $i <= 3; $i++)
                            <div class="col-md-4">
                                <div class="news-card bg-white rounded overflow-hidden h-100">
                                    <div class="news-image" style="height: 150px;">
                                        <img src="https://via.placeholder.com/300x150/0dcaf0/ffffff?text=تقنية+{{$i}}" 
                                             class="w-100 h-100 object-fit-cover" alt="تقنية {{$i}}">
                                    </div>
                                    <div class="p-3">
                                        <h6 class="fw-bold">ابتكار تقني جديد {{$i}}</h6>
                                        <small class="text-muted">منذ {{$i}} ساعات</small>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </section>
                </div>

                <!-- الشريط الجانبي -->
                <div class="col-lg-4">
                    <!-- الأكثر قراءة -->
                    <div class="sidebar-widget">
                        <h3>الأكثر قراءة</h3>
                        @for($i = 1; $i <= 5; $i++)
                        <div class="sidebar-news-item">
                            <div class="d-flex align-items-start">
                                <span class="fs-2 fw-bold text-danger me-3">{{$i}}</span>
                                <div>
                                    <h6 class="fw-bold mb-1">عنوان الخبر الأكثر قراءة رقم {{$i}}</h6>
                                    <small class="text-muted">
                                        <i class="bi bi-eye"></i> {{1000 - ($i * 100)}} مشاهدة
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>

                    <!-- تابعنا -->
                    <div class="sidebar-widget">
                        <h3>تابعنا على</h3>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-primary">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="#" class="btn btn-info text-white">
                                <i class="bi bi-twitter-x"></i> Twitter
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="bi bi-youtube"></i> YouTube
                            </a>
                            <a href="#" class="btn btn-warning text-white">
                                <i class="bi bi-instagram"></i> Instagram
                            </a>
                        </div>
                    </div>

                    <!-- الفيديوهات -->
                    <div class="sidebar-widget">
                        <h3>فيديوهات</h3>
                        @for($i = 1; $i <= 3; $i++)
                        <div class="mb-3">
                            <div class="position-relative">
                                <img src="https://via.placeholder.com/350x200/dc3545/ffffff?text=فيديو+{{$i}}" 
                                     class="w-100 rounded" alt="فيديو {{$i}}">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i class="bi bi-play-circle-fill text-white fs-1"></i>
                                </div>
                            </div>
                            <h6 class="mt-2 fw-bold">عنوان الفيديو رقم {{$i}}</h6>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- الفوتر -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="fw-bold mb-3">عن الموقع</h4>
                    <p>موقع إخباري شامل يقدم آخر الأخبار والتقارير من مختلف المجالات بمصداقية ومهنية عالية.</p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="social-icon facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-icon youtube"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-icon instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">أقسام الموقع</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none">محليات</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">سياسة</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">اقتصاد</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">رياضة</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">ثقافة</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">روابط مهمة</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none">من نحن</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">اتصل بنا</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">سياسة الخصوصية</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">الشروط والأحكام</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">النشرة البريدية</h5>
                    <p>اشترك في نشرتنا البريدية للحصول على آخر الأخبار</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="بريدك الإلكتروني">
                            <button class="btn btn-danger" type="submit">اشترك</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <hr class="my-4 bg-secondary">
            
            <div class="text-center">
                <p class="mb-0">© 2025 جميع الحقوق محفوظة - الموقع الإخباري</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- ساعة حية -->
    <script>
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('ar-EG');
            document.getElementById('live-clock').textContent = timeString;
        }
        setInterval(updateClock, 1000);
    </script>
</body>
</html>