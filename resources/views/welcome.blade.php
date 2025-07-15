@extends('layouts.app')

@section('content')
<!-- شريط علوي للتاريخ والموقع وروابط سريعة -->
<div class="bg-light border-bottom py-1 small">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <span class="me-2"><i class="bi bi-calendar-event"></i> {{ now()->format('Y-m-d') }}</span>
            <span><i class="bi bi-geo-alt"></i> اليمن، شبوة</span>
        </div>
        <div class="d-flex gap-2">
            <a href="#" class="text-secondary"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-secondary"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="text-secondary"><i class="bi bi-youtube"></i></a>
            <a href="#" class="text-secondary"><i class="bi bi-telegram"></i></a>
        </div>
    </div>
</div>
<!-- هيدر مع الشعار والقائمة -->
<header class="bg-white border-bottom shadow-sm sticky-top">
    <div class="container py-3 d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <img src="/images/logo.png" alt="شبوة21" style="height:48px;">
            <span class="fs-2 fw-bold text-primary font-arabic">شبوة<span class="text-secondary">21</span></span>
            <span class="text-muted small ms-2 d-none d-md-inline">منبرك الأول والخبر... موقع إخباري شامل</span>
        </div>
        <nav class="flex-grow-1">
            <ul class="nav justify-content-center fw-bold">
                <li class="nav-item"><a class="nav-link text-dark" href="#">الرئيسية</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">محليات</a>
                    <ul class="dropdown-menu text-end">
                        <li><a class="dropdown-item" href="#">أخبار حضرموت</a></li>
                        <li><a class="dropdown-item" href="#">أخبار شبوة</a></li>
                        <li><a class="dropdown-item" href="#">أخبار عدن</a></li>
                        <li><a class="dropdown-item" href="#">أخبار سقطرى</a></li>
                        <li><a class="dropdown-item" href="#">المهرة</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">تقارير وتحقيقات</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">عربي وعالمي</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">مجتمع</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">فيديو</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">اتصل بنا</a></li>
            </ul>
        </nav>
        <form class="d-none d-md-flex align-items-center" style="width:220px;">
            <input type="text" class="form-control form-control-sm" placeholder="بحث...">
            <button class="btn btn-secondary btn-sm ms-2"><i class="bi bi-search"></i></button>
        </form>
    </div>
</header>
<!-- شريط أخبار متحرك (CSS وليس marquee) -->
<div class="breaking-news-ticker bg-primary text-white py-2">
    <div class="container d-flex align-items-center gap-3">
        <span class="fw-bold"><i class="bi bi-megaphone"></i> شريط الأخبار:</span>
        <div class="news-ticker flex-fill overflow-hidden position-relative">
            <div class="ticker-content" style="white-space:nowrap; animation: ticker 25s linear infinite;">
                <span class="mx-4">الرئيس الزبيدي يؤكد محورية دور دول مجلس التعاون الخليجي في إعادة الاستقرار</span>
                <span class="mx-4">هيئة الرئاسة تؤكد ضرورة إصلاحات شاملة</span>
                <span class="mx-4">الرئيس الزبيدي يلتقي القائم بأعمال السفير الأمريكي...</span>
            </div>
        </div>
    </div>
</div>
<style>
@keyframes ticker {
    0% { transform: translateX(100%);}
    100% { transform: translateX(-100%);}
}
.news-ticker { height: 28px; }
.ticker-content { display: inline-block; min-width: 100%; }
</style>
<!-- أقسام رئيسية كبطاقات -->
<div class="container py-5">
    <div class="row g-4">
        @foreach(\App\Models\Category::orderBy('sort_order')->get() as $cat)
        <div class="col-md-3" id="section-{{ $cat->slug }}">
            <div class="card h-100 shadow-custom border-0 animate-fade-in">
                <img src="/images/{{ $cat->image ?? 'logo.png' }}" class="card-img-top" alt="{{ $cat->name }}">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">{{ $cat->name }}</h5>
                    <p class="card-text text-muted">{{ $cat->description_ar ?? $cat->description_en ?? '' }}</p>
                    <a href="#" class="btn btn-primary">عرض المزيد</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- فوتر غني -->
<footer class="footer mt-5 pt-4 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h6 class="fw-bold mb-2">عن شبوة21</h6>
                <p class="text-muted small">شبوة21 موقع إخباري شامل يغطي آخر المستجدات في حضرموت واليمن والعالم العربي، برسالة مهنية وحيادية.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h6 class="fw-bold mb-2">روابط سريعة</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">الرئيسية</a></li>
                    @foreach(\App\Models\Category::orderBy('sort_order')->get() as $cat)
                        <li><a href="#section-{{ $cat->slug }}" class="footer-link">{{ $cat->name }}</a></li>
                    @endforeach
                    <li><a href="#" class="footer-link">اتصل بنا</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h6 class="fw-bold mb-2">تواصل معنا</h6>
                <div class="mb-2">
                    <a href="#" class="text-secondary fs-5 me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-secondary fs-5 me-2"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-secondary fs-5 me-2"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="text-secondary fs-5 me-2"><i class="bi bi-telegram"></i></a>
                </div>
                <span class="text-muted small">© جميع الحقوق محفوظة شبوة21</span>
            </div>
        </div>
    </div>
</footer>
@endsection 