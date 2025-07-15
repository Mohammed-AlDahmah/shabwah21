@extends('layouts.app')

@section('content')
<!-- Hero Section with Breaking News -->
<div class="hero-section relative bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="container mx-auto px-4 py-8 relative z-10">
        <!-- Breaking News Ticker -->
        <div class="mb-6">
            @livewire('breaking-news')
        </div>
        
        <!-- Hero Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-12">
            <div class="hero-content">
                <div class="mb-4">
                    <span class="inline-block bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold mb-4">
                        <i class="bi bi-broadcast me-2"></i>أحدث الأخبار
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    شبوة<span class="text-blue-400">21</span>
                    <span class="block text-2xl md:text-3xl font-light text-blue-200 mt-2">منبرك الأول والخبر</span>
                </h1>
                <p class="text-xl mb-8 text-blue-100 leading-relaxed">
                    تابع أحدث الأخبار والتقارير من محافظة شبوة ومختلف أنحاء اليمن. 
                    نقدم لك الأخبار بموضوعية ومهنية عالية.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#latest-news" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="bi bi-newspaper me-2"></i>اقرأ الأخبار
                    </a>
                    <a href="#videos" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-slate-900 px-8 py-4 rounded-lg font-semibold transition-all duration-300">
                        <i class="bi bi-play-circle me-2"></i>شاهد الفيديو
                    </a>
                </div>
            </div>
            <div class="hero-image">
                @livewire('featured-news-hero')
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-8">
    <!-- Featured News Section -->
    <section class="mb-12">
        @livewire('featured-news')
    </section>

    <!-- Latest News Grid -->
    <section id="latest-news" class="mb-12">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-4">
                <div class="w-1 h-12 bg-blue-600 rounded-full"></div>
                <div>
                    <h2 class="text-3xl font-bold text-slate-800">آخر الأخبار</h2>
                    <p class="text-slate-600">أحدث المستجدات والتطورات</p>
                </div>
            </div>
            <a href="/news" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 flex items-center gap-2">
                عرض الكل
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @livewire('latest-news-grid')
        </div>
    </section>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content Area -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Video Section -->
            <section id="videos" class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-red-700 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <i class="bi bi-play-circle-fill text-2xl"></i>
                            <h3 class="text-2xl font-bold">الفيديوهات</h3>
                        </div>
                        <a href="/videos" class="text-white hover:text-yellow-200 font-semibold transition-colors">
                            المزيد <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    @livewire('video-section')
                </div>
            </section>

            <!-- Articles Section -->
            <section class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-700 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <i class="bi bi-file-text-fill text-2xl"></i>
                            <h3 class="text-2xl font-bold">مقالات وتقارير</h3>
                        </div>
                        <a href="/articles" class="text-white hover:text-yellow-200 font-semibold transition-colors">
                            المزيد <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    @livewire('articles-section')
                </div>
            </section>

            <!-- Sports Section -->
            <section class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <i class="bi bi-trophy-fill text-2xl"></i>
                            <h3 class="text-2xl font-bold">الرياضة</h3>
                        </div>
                        <a href="/sports" class="text-white hover:text-yellow-200 font-semibold transition-colors">
                            المزيد <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    @livewire('sports-section')
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Most Read Articles -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-orange-600 to-orange-700 text-white p-4">
                    <div class="flex items-center gap-2">
                        <i class="bi bi-graph-up text-xl"></i>
                        <h3 class="text-xl font-bold">الأكثر قراءة</h3>
                    </div>
                </div>
                <div class="p-4">
                    @livewire('most-read-articles')
                </div>
            </div>

            <!-- Categories -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white p-4">
                    <div class="flex items-center gap-2">
                        <i class="bi bi-grid-3x3-gap text-xl"></i>
                        <h3 class="text-xl font-bold">الأقسام</h3>
                    </div>
                </div>
                <div class="p-4">
                    @livewire('category-cards')
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-pink-600 to-pink-700 text-white p-4">
                    <div class="flex items-center gap-2">
                        <i class="bi bi-share text-xl"></i>
                        <h3 class="text-xl font-bold">تابعنا</h3>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105">
                            <i class="bi bi-facebook text-2xl mb-2 block"></i>
                            <span class="text-sm font-semibold">فيسبوك</span>
                        </a>
                        <a href="#" class="bg-blue-400 hover:bg-blue-500 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105">
                            <i class="bi bi-twitter-x text-2xl mb-2 block"></i>
                            <span class="text-sm font-semibold">تويتر</span>
                        </a>
                        <a href="#" class="bg-red-600 hover:bg-red-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105">
                            <i class="bi bi-youtube text-2xl mb-2 block"></i>
                            <span class="text-sm font-semibold">يوتيوب</span>
                        </a>
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105">
                            <i class="bi bi-telegram text-2xl mb-2 block"></i>
                            <span class="text-sm font-semibold">تليجرام</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-2xl shadow-lg p-6">
                <div class="text-center">
                    <i class="bi bi-envelope-fill text-3xl mb-4 block"></i>
                    <h3 class="text-xl font-bold mb-2">اشترك في النشرة</h3>
                    <p class="text-blue-100 mb-4">احصل على آخر الأخبار في بريدك الإلكتروني</p>
                    <div class="space-y-3">
                        <input type="email" placeholder="بريدك الإلكتروني" 
                               class="w-full px-4 py-3 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-white">
                        <button class="w-full bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                            اشترك الآن
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Opinion Section -->
    <section class="mt-12">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-4">
                <div class="w-1 h-12 bg-purple-600 rounded-full"></div>
                <div>
                    <h2 class="text-3xl font-bold text-slate-800">آراء وتحليلات</h2>
                    <p class="text-slate-600">تحليلات وآراء الخبراء</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @livewire('opinion-articles')
        </div>
    </section>
</div>

<!-- Call to Action Section -->
<section class="bg-gradient-to-r from-slate-900 to-slate-800 text-white py-16 mt-16">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-4xl font-bold mb-6">ابق على اطلاع دائم</h2>
            <p class="text-xl mb-8 text-slate-300">تابع أحدث الأخبار والتطورات من شبوة واليمن والعالم العربي</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/news" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                    <i class="bi bi-newspaper me-2"></i>تصفح الأخبار
                </a>
                <a href="/subscribe" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-slate-900 px-8 py-4 rounded-lg font-semibold transition-all duration-300">
                    <i class="bi bi-bell me-2"></i>اشترك الآن
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #0f172a 100%);
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
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }
    
    .news-card {
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }
    
    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        border-color: #3b82f6;
    }
    
    .category-card {
        transition: all 0.3s ease;
        cursor: pointer;
        border: 1px solid #e2e8f0;
    }
    
    .category-card:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        border-color: #3b82f6;
    }
    
    .sidebar-widget {
        border-right: 4px solid #3b82f6;
        transition: all 0.3s ease;
    }
    
    .sidebar-widget:hover {
        transform: translateX(-5px);
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f5f9;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeInUp 0.6s ease-out;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0;
        }
        
        .hero-content h1 {
            font-size: 2.5rem;
        }
        
        .hero-content p {
            font-size: 1.1rem;
        }
    }
</style>
@endpush
