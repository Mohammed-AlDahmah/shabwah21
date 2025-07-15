@extends('layouts.app')

@section('content')

<<<<<<< HEAD
<!-- Hero Section with Featured News -->
<section class="hero-section bg-gradient-to-r from-blue-900 to-blue-700 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="hero-content">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                    آخر الأخبار من شبوة واليمن
                </h1>
                <p class="text-xl mb-6 text-blue-100">
                    تابع أحدث الأخبار والتقارير من محافظة شبوة ومختلف أنحاء اليمن
                </p>
                <div class="flex gap-4">
                    <a href="#latest-news" class="btn btn-primary px-6 py-3 rounded-lg font-semibold">
                        اقرأ المزيد
                    </a>
                    <a href="#videos" class="btn btn-outline-light px-6 py-3 rounded-lg font-semibold">
                        شاهد الفيديوهات
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="aspect-video bg-white/10 rounded-lg backdrop-blur-sm p-4">
                    @livewire('featured-news-hero')
                </div>
            </div>
=======
<div class="container mx-auto px-4 py-6 space-y-8">

    <!-- أبرز المستجدات -->
    <div>
        @livewire('featured-news')
    </div>

    <!-- آخر الأخبار -->
    <div>
        @livewire('latest-news')
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- قسم الفيديو -->
        <div class="lg:col-span-2">
            @livewire('video-section')
        </div>
        <!-- مقالات وتقارير -->
        <div>
            @livewire('articles-section')
>>>>>>> 89b77b35a1e43663df186483df854800243224aa
        </div>
    </div>
</section>

<!-- Breaking News Ticker -->
<div class="breaking-news-ticker bg-red-600 text-white py-2">
    <div class="container mx-auto px-4">
        @livewire('breaking-news-ticker')
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-8">
    <!-- Latest News Grid -->
    <section id="latest-news" class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">آخر الأخبار</h2>
            <a href="/news" class="text-blue-600 hover:text-blue-800 font-semibold">
                عرض جميع الأخبار <i class="bi bi-arrow-left-short"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @livewire('latest-news-grid')
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">الأقسام الرئيسية</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @livewire('category-cards')
        </div>
    </section>

    <!-- Content Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Video Section -->
            <section id="videos" class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">الفيديوهات</h3>
                    <a href="/videos" class="text-blue-600 hover:text-blue-800 font-semibold">
                        المزيد <i class="bi bi-arrow-left-short"></i>
                    </a>
                </div>
                @livewire('video-section')
            </section>

            <!-- Articles and Reports -->
            <section class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">مقالات وتقارير</h3>
                    <a href="/articles" class="text-blue-600 hover:text-blue-800 font-semibold">
                        المزيد <i class="bi bi-arrow-left-short"></i>
                    </a>
                </div>
                @livewire('articles-section')
            </section>

            <!-- Sports Section -->
            <section class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">الرياضة</h3>
                    <a href="/sports" class="text-blue-600 hover:text-blue-800 font-semibold">
                        المزيد <i class="bi bi-arrow-left-short"></i>
                    </a>
                </div>
                @livewire('sports-section')
            </section>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Most Read -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">الأكثر قراءة</h3>
                @livewire('most-read-articles')
            </div>

            <!-- Weather Widget -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">الطقس</h3>
                @livewire('weather-widget')
            </div>

            <!-- Social Media -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">تابعنا على</h3>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-2xl">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-blue-600 text-2xl">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="text-red-600 hover:text-red-800 text-2xl">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="#" class="text-blue-500 hover:text-blue-700 text-2xl">
                        <i class="bi bi-telegram"></i>
                    </a>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-4">اشترك في النشرة</h3>
                <p class="mb-4">احصل على آخر الأخبار في بريدك الإلكتروني</p>
                @livewire('newsletter-signup')
            </div>
        </div>
    </div>

    <!-- Opinion Section -->
    <section class="mt-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">آراء وتحليلات</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @livewire('opinion-articles')
        </div>
    </section>
</div>

<!-- Footer Call-to-Action -->
<section class="bg-gray-900 text-white py-12 mt-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">ابق على اطلاع دائم</h2>
        <p class="text-xl mb-6">تابع أحدث الأخبار والتطورات من شبوة واليمن</p>
        <div class="flex justify-center space-x-4 space-x-reverse">
            <a href="/news" class="btn btn-primary px-8 py-3 rounded-lg font-semibold">
                تصفح الأخبار
            </a>
            <a href="/subscribe" class="btn btn-outline-light px-8 py-3 rounded-lg font-semibold">
                اشترك الآن
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('/images/hero-pattern.png') repeat;
        opacity: 0.1;
    }
    
    .breaking-news-ticker {
        background: linear-gradient(90deg, #dc2626 0%, #b91c1c 100%);
    }
    
    .news-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .category-card {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .category-card:hover {
        transform: scale(1.05);
    }
    
    .sidebar-widget {
        border-right: 4px solid #3b82f6;
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0;
        }
        
        .hero-content h1 {
            font-size: 2rem;
        }
        
        .hero-content p {
            font-size: 1rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush
