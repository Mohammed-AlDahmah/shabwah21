@extends('layouts.app')

 
@section('title', 'شبوة21 - موقع إخباري احترافي')
@section('description', 'موقع شبوة21 الإخباري - آخر الأخبار والتقارير من حضرموت واليمن')
@section('keywords', 'أخبار, حضرموت, اليمن, إخبارية')

@section('content')
    <!-- Hero Slider Section -->
    <section id="tie-block_446" class="slider-area mag-box media-overlay">
        <div class="container mx-auto px-4 py-4">
            <div class="mag-box-title the-global-title mb-4">
                <h3 class="text-2xl font-bold text-gray-800 border-b-2 border-primary-color pb-2">
                    <a href="{{ route('home') }}" class="text-primary-color hover:text-secondary-color transition-colors">
                        أبرز المستجدات
                    </a>
                </h3>
            </div>
            
            <div class="slider-area-inner">
                <livewire:featured-news-hero />
 
@section('title', 'الرئيسية')

@section('content')
<div class="bg-slate-50 text-slate-800">

    <!-- Hero Section -->
    <section class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                <div class="lg:col-span-2">
                    @livewire('featured-news-hero')
                </div>
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-slate-700 border-b-2 border-blue-600 pb-2">أبرز العناوين</h2>
                    @livewire('featured-news', ['limit' => 4])
                </div> 
            </div>
        </div>
    </section>

 
    <!-- Main Content Area -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Main Content (3 columns) -->
            <div class="lg:col-span-3">
                <div class="space-y-8">
                    <!-- Latest News Section -->
                    <section class="news-section">
                        <div class="section-title mb-6">
                            <h2 class="text-xl font-bold text-gray-800 border-b-2 border-primary-color pb-2">
                                آخر الأخبار
                            </h2>
                        </div>
                        <livewire:latest-news-grid />
                    </section>

                    <!-- Category Sections -->
                    <section class="category-sections">
                        <livewire:category-section />
                    </section>

                    <!-- Video Section -->
                    <section class="video-section">
                        <div class="section-title mb-6">
                            <h2 class="text-xl font-bold text-gray-800 border-b-2 border-primary-color pb-2">
                                فيديو شبوة21
                            </h2>
                        </div>
                        <livewire:video-section />
                    </section>
                </div>
            </div>

            <!-- Sidebar (1 column) -->
            <div class="lg:col-span-1">
                <div class="space-y-8">
                    <!-- Popular Articles -->
                    <section class="popular-articles">
                        <div class="section-title mb-4">
                            <h3 class="text-lg font-bold text-gray-800 border-b-2 border-primary-color pb-2">
                                الأكثر قراءة
                            </h3>
                        </div>
                        <livewire:popular-articles />
                    </section>

                    <!-- Weather Widget -->
                    <section class="weather-widget">
                        <div class="section-title mb-4">
                            <h3 class="text-lg font-bold text-gray-800 border-b-2 border-primary-color pb-2">
                                الطقس
                            </h3>
                        </div>
                        <livewire:weather-widget />
                    </section>

                    <!-- Most Read Articles -->
                    <section class="most-read">
                        <div class="section-title mb-4">
                            <h3 class="text-lg font-bold text-gray-800 border-b-2 border-primary-color pb-2">
                                الأكثر مشاهدة
                            </h3>
                        </div>
                        <livewire:most-read-articles />
                    </section>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Newsletter Section -->
    <section class="newsletter-section bg-gray-50 py-8">
        <div class="container mx-auto px-4">
            <livewire:newsletter-signup />
        </div>
    </section>

    <style>
        /* تنسيق الصفحة الرئيسية */
        .slider-area {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .mag-box-title h3 {
            color: var(--primary-color);
            position: relative;
        }

        .mag-box-title h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .section-title h2,
        .section-title h3 {
            color: var(--primary-color);
            position: relative;
        }

        .section-title h2::after,
        .section-title h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 40px;
            height: 2px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 1px;
        }

        .news-section,
        .category-sections,
        .video-section {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .news-section:hover,
        .category-sections:hover,
        .video-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .popular-articles,
        .weather-widget,
        .most-read {
            background: white;
            border-radius: 15px;
            padding: 1.25rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .popular-articles:hover,
        .weather-widget:hover,
        .most-read:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .newsletter-section {
            background: linear-gradient(135deg, var(--light-bg) 0%, #f8fafc 100%);
            border-top: 3px solid var(--primary-color);
        }

        /* تنسيق متجاوب */
        @media (max-width: 1024px) {
            .container {
                padding: 0 1rem;
            }
            
            .grid {
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .slider-area {
                margin: 0 -1rem;
                border-radius: 0;
            }
            
            .section-title h2,
            .section-title h3 {
                font-size: 1.1rem;
            }
            
            .news-section,
            .category-sections,
            .video-section {
                padding: 1rem;
                margin: 0 -0.5rem;
                border-radius: 10px;
            }
            
            .popular-articles,
            .weather-widget,
            .most-read {
                padding: 1rem;
                margin: 0 -0.5rem;
                border-radius: 10px;
            }
        }
    </style>
@endsection
=======
    <!-- Breaking News Ticker -->
    <section class="bg-slate-800 text-white py-3">
        <div class="container mx-auto px-4">
            @livewire('breaking-news')
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">

            <!-- Main Content Area -->
            <div class="lg:col-span-3 space-y-12">

                <!-- Latest News Section -->
                <section id="latest-news">
                    <div class="flex justify-between items-center mb-6 border-b border-slate-200 pb-4">
                        <h2 class="text-3xl font-bold text-slate-800">آخر الأخبار</h2>
                        <a href="/news" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors flex items-center gap-2">
                            عرض الكل <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    @livewire('latest-news-grid', ['limit' => 6])
                </section>

                <!-- Video & Articles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Video Section -->
                    <section id="videos">
                        <div class="flex justify-between items-center mb-6 border-b border-slate-200 pb-4">
                            <h2 class="text-3xl font-bold text-slate-800">مرئيات</h2>
                            <a href="/videos" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors flex items-center gap-2">
                                كل الفيديوهات <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                        @livewire('video-section', ['limit' => 3])
                    </section>

                    <!-- Articles Section -->
                    <section id="articles">
                        <div class="flex justify-between items-center mb-6 border-b border-slate-200 pb-4">
                            <h2 class="text-3xl font-bold text-slate-800">مقالات وتقارير</h2>
                            <a href="/articles" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors flex items-center gap-2">
                                كل المقالات <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                        @livewire('articles-section', ['limit' => 3])
                    </section>
                </div>

            </div>

            <!-- Sidebar -->
            <aside class="space-y-8">
                <!-- Most Read Articles -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-3">الأكثر قراءة</h3>
                    <div class="space-y-4">
                        @livewire('most-read-articles', ['limit' => 5])
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-3">الأقسام</h3>
                    @livewire('category-cards', ['limit' => 6])
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-3">تابعنا</h3>
                    <div class="flex justify-around">
                        <a href="#" class="text-2xl text-slate-500 hover:text-blue-600 transition-colors"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-2xl text-slate-500 hover:text-sky-500 transition-colors"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-2xl text-slate-500 hover:text-red-600 transition-colors"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-2xl text-slate-500 hover:text-sky-600 transition-colors"><i class="bi bi-telegram"></i></a>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="bg-blue-600 text-white rounded-lg shadow-lg p-6 text-center">
                    <i class="bi bi-envelope-paper-heart text-4xl mb-3"></i>
                    <h3 class="text-xl font-bold mb-2">النشرة البريدية</h3>
                    <p class="text-blue-100 mb-4 text-sm">اشترك لتصلك آخر الأخبار مباشرة.</p>
                    <form class="flex">
                        <input type="email" placeholder="بريدك الإلكتروني" class="w-full px-4 py-2 rounded-s-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-e-lg font-semibold transition-colors">
                            <i class="bi bi-send"></i>
                        </button>
                    </form>
                </div>
            </aside>

        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
    /* You can add any additional specific styles here if needed */
    .news-card-small a:hover h4 {
        color: #2563eb; /* blue-600 */
    }
</style>
@endpush
 