@extends('layouts.app')

@section('content')
<!-- شريط الأخبار العاجلة -->
<div class="breaking-news">
    <div class="container">
        <div class="d-flex align-items-center">
            <span class="me-3 fw-bold">
                <i class="bi bi-lightning-charge-fill me-2"></i>أخبار عاجلة:
            </span>
            <div class="ticker flex-fill overflow-hidden">
                <span class="mx-4">الرئيس الزبيدي يؤكد محورية دور دول مجلس التعاون الخليجي في إعادة الاستقرار</span>
                <span class="mx-4">هيئة الرئاسة تؤكد ضرورة إصلاحات شاملة</span>
                <span class="mx-4">الرئيس الزبيدي يلتقي القائم بأعمال السفير الأمريكي</span>
                <span class="mx-4">تطورات جديدة في الأوضاع الأمنية في شبوة</span>
            </div>
        </div>
    </div>
</div>

<!-- الهيدر الرئيسي -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- الشعار -->
        <a class="navbar-brand text-primary" href="#">
            <img src="/images/logo.png" alt="شبوة21" height="50" class="me-2">
            شبوة<span class="text-secondary">21</span>
        </a>
        
        <!-- زر القائمة للشاشات الصغيرة -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- القائمة الرئيسية -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="bi bi-house-door me-1"></i>الرئيسية</a>
                </li>
                @foreach(\App\Models\Category::orderBy('sort_order')->take(6)->get() as $cat)
                    <li class="nav-item">
                        <a class="nav-link" href="#section-{{ $cat->slug }}">{{ $cat->name }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-envelope me-1"></i>اتصل بنا</a>
                </li>
            </ul>
            
            <!-- شريط البحث -->
            <div class="search-box d-none d-lg-block">
                <input type="text" class="form-control" placeholder="ابحث في الأخبار...">
                <button type="button" class="btn">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- المحتوى الرئيسي -->
<div class="container py-5">
    <div class="row">
        <!-- العمود الرئيسي -->
        <div class="col-lg-8">
            <!-- المقال المميز -->
            <div class="card featured-card mb-4">
                <div class="position-relative">
                    <img src="https://via.placeholder.com/800x400/2c3e50/ffffff?text=صورة+الأخبار+المميزة" class="card-img-top" alt="أخبار مميزة">
                    <span class="category-badge">أخبار محلية</span>
                </div>
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-3">الرئيس الزبيدي يؤكد محورية دور دول مجلس التعاون الخليجي في إعادة الاستقرار</h2>
                    <p class="card-text text-muted mb-3">أكد الرئيس رشاد محمد العليمي، رئيس المجلس الرئاسي، محورية دور دول مجلس التعاون الخليجي في إعادة الاستقرار والأمن إلى اليمن، مشيداً بالدعم المستمر الذي تقدمه هذه الدول.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="news-meta">
                            <i class="bi bi-calendar3 me-1"></i>{{ now()->format('Y-m-d') }}
                            <i class="bi bi-clock ms-3 me-1"></i>{{ now()->format('H:i') }}
                            <i class="bi bi-eye ms-3 me-1"></i>1,234 مشاهدة
                        </div>
                        <a href="#" class="btn btn-primary">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
            
            <!-- أقسام الأخبار -->
            @foreach(\App\Models\Category::orderBy('sort_order')->take(4)->get() as $cat)
            <div class="mb-5" id="section-{{ $cat->slug }}">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-primary">{{ $cat->name }}</h3>
                    <a href="#" class="text-decoration-none text-secondary">عرض الكل <i class="bi bi-arrow-left"></i></a>
                </div>
                
                <div class="row g-4">
                    @for($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="https://via.placeholder.com/300x200/{{ ['e74c3c', '3498db', 'f39c12'][$i] }}/ffffff?text={{ $cat->name }}" class="card-img-top" alt="{{ $cat->name }}">
                                <span class="category-badge">{{ $cat->name }}</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold line-clamp-2">عنوان الخبر في قسم {{ $cat->name }} رقم {{ $i + 1 }}</h5>
                                <p class="card-text text-muted line-clamp-3">محتوى مختصر للخبر في قسم {{ $cat->name }} مع تفاصيل إضافية حول الموضوع المطروح.</p>
                                <div class="news-meta mb-3">
                                    <i class="bi bi-calendar3 me-1"></i>{{ now()->subDays($i)->format('Y-m-d') }}
                                    <i class="bi bi-eye ms-3 me-1"></i>{{ rand(100, 999) }} مشاهدة
                                </div>
                                <a href="#" class="btn btn-outline-primary btn-sm">اقرأ المزيد</a>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- الشريط الجانبي -->
        <div class="col-lg-4">
            <!-- آخر الأخبار -->
            <div class="sidebar-card">
                <h5 class="sidebar-title">آخر الأخبار</h5>
                @for($i = 0; $i < 5; $i++)
                <div class="latest-news-item">
                    <img src="https://via.placeholder.com/60x60/{{ ['e74c3c', '3498db', 'f39c12', '27ae60', '9b59b6'][$i] }}/ffffff?text=خبر" class="latest-news-img" alt="أخبار">
                    <div class="flex-fill">
                        <h6 class="fw-bold mb-1 line-clamp-2">عنوان الخبر الجديد رقم {{ $i + 1 }}</h6>
                        <div class="news-meta">
                            <i class="bi bi-clock me-1"></i>{{ now()->subHours($i + 1)->format('H:i') }}
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            
            <!-- الأكثر قراءة -->
            <div class="sidebar-card">
                <h5 class="sidebar-title">الأكثر قراءة</h5>
                @for($i = 0; $i < 4; $i++)
                <div class="latest-news-item">
                    <div class="fw-bold text-primary me-2">{{ $i + 1 }}</div>
                    <div class="flex-fill">
                        <h6 class="fw-bold mb-1 line-clamp-2">أخبار الأكثر قراءة رقم {{ $i + 1 }}</h6>
                        <div class="news-meta">
                            <i class="bi bi-eye me-1"></i>{{ rand(1000, 5000) }} مشاهدة
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            
            <!-- روابط سريعة -->
            <div class="sidebar-card">
                <h5 class="sidebar-title">روابط سريعة</h5>
                <div class="d-grid gap-2">
                    @foreach(\App\Models\Category::orderBy('sort_order')->take(6)->get() as $cat)
                    <a href="#section-{{ $cat->slug }}" class="btn btn-outline-secondary text-start">
                        <i class="bi bi-arrow-left me-2"></i>{{ $cat->name }}
                    </a>
                    @endforeach
                </div>
            </div>
            
            <!-- وسائل التواصل -->
            <div class="sidebar-card">
                <h5 class="sidebar-title">تابعنا</h5>
                <div class="social-links text-center">
                    <a href="#" title="فيسبوك"><i class="bi bi-facebook"></i></a>
                    <a href="#" title="تويتر"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" title="يوتيوب"><i class="bi bi-youtube"></i></a>
                    <a href="#" title="تلجرام"><i class="bi bi-telegram"></i></a>
                    <a href="#" title="إنستغرام"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- الفوتر -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5>عن شبوة21</h5>
                <p class="text-muted">موقع شبوة21 الإخباري الشامل، نقدم لكم آخر الأخبار والتقارير من شبوة واليمن والعالم العربي، برسالة مهنية وحيادية.</p>
                <div class="social-links">
                    <a href="#" title="فيسبوك"><i class="bi bi-facebook"></i></a>
                    <a href="#" title="تويتر"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" title="يوتيوب"><i class="bi bi-youtube"></i></a>
                    <a href="#" title="تلجرام"><i class="bi bi-telegram"></i></a>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <h5>الأقسام</h5>
                <ul class="list-unstyled">
                    @foreach(\App\Models\Category::orderBy('sort_order')->take(6)->get() as $cat)
                    <li class="mb-2">
                        <a href="#section-{{ $cat->slug }}">
                            <i class="bi bi-arrow-left me-2"></i>{{ $cat->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="col-lg-4 mb-4">
                <h5>معلومات الاتصال</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt me-2"></i>اليمن، محافظة شبوة
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope me-2"></i>info@shabwa21.com
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-telephone me-2"></i>+967 XXX XXX XXX
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-clock me-2"></i>24/7 خدمة الأخبار
                    </li>
                </ul>
            </div>
        </div>
        
        <hr class="my-4" style="border-color: #34495e;">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted">© {{ date('Y') }} جميع الحقوق محفوظة لموقع شبوة21</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0 text-muted">
                    <i class="bi bi-calendar3 me-1"></i>{{ now()->format('Y-m-d') }}
                    <i class="bi bi-clock ms-3 me-1"></i>{{ now()->format('H:i') }}
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.navbar-scrolled {
    background: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(10px);
}
</style>
@endsection 