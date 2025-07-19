@extends('layouts.app')

@section('title', 'شبوة21 - موقع إخباري احترافي')
@section('description', 'موقع شبوة21 الإخباري - آخر الأخبار والتقارير من حضرموت واليمن')
@section('keywords', 'أخبار, حضرموت, اليمن, إخبارية')

@section('content')
    <!-- Breaking News Ticker -->
    <section class="breaking-news-section">
        <livewire:breaking-news-ticker />
    </section>

    <!-- Hero Section with Featured News -->
    <section class="hero-section bg-gradient-to-br from-slate-50 to-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Featured News (2 columns) -->
                <div class="lg:col-span-2">
                    <div class="section-header mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-16 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full shadow-lg"></div>
                            <div>
                                <h2 class="text-3xl font-bold text-slate-800 mb-2">أبرز الأخبار</h2>
                                <p class="text-slate-600">أهم الأخبار والتقارير المميزة</p>
                            </div>
                        </div>
                    </div>
                    <livewire:featured-news-hero />
                </div>
                
                <!-- Sidebar Featured News (1 column) -->
                <div class="lg:col-span-1">
                    <div class="section-header mb-6">
                        <h3 class="text-xl font-bold text-slate-800 border-b-2 border-[#C08B2D] pb-2">
                            أبرز العناوين
                        </h3>
                    </div>
                    <livewire:featured-news limit="4" />
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <div class="bg-slate-50">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content (3 columns) -->
                <div class="lg:col-span-3">
                    <div class="space-y-12">
                        <!-- Latest News Section -->
                        <section class="news-section bg-white rounded-2xl shadow-lg p-8">
                            <div class="section-header mb-8">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                                        <div>
                                            <h2 class="text-2xl font-bold text-slate-800">آخر الأخبار</h2>
                                            <p class="text-slate-600">أحدث الأخبار والتقارير</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('news.index') }}" class="btn-primary">
                                        عرض جميع الأخبار
                                        <i class="bi bi-arrow-left mr-2"></i>
                                    </a>
                                </div>
                            </div>
                            <livewire:latest-news-grid />
                        </section>

                        <!-- Category Sections -->
                        <section class="category-sections bg-white rounded-2xl shadow-lg p-8">
                            <div class="section-header mb-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-slate-800">الأقسام الإخبارية</h2>
                                        <p class="text-slate-600">تصفح الأخبار حسب التصنيف</p>
                                    </div>
                                </div>
                            </div>
                            <livewire:category-section />
                        </section>

                        <!-- Video Section -->
                        <section class="video-section bg-white rounded-2xl shadow-lg p-8">
                            <div class="section-header mb-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-slate-800">فيديو شبوة21</h2>
                                        <p class="text-slate-600">أحدث الفيديوهات والتقارير المصورة</p>
                                    </div>
                                </div>
                            </div>
                            <livewire:video-section />
                        </section>

                        <!-- Sports Section -->
                        <section class="sports-section bg-white rounded-2xl shadow-lg p-8">
                            <div class="section-header mb-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-slate-800">الرياضة</h2>
                                        <p class="text-slate-600">أخبار الرياضة المحلية والعالمية</p>
                                    </div>
                                </div>
                            </div>
                            <livewire:sports-section />
                        </section>
                    </div>
                </div>

                <!-- Sidebar (1 column) -->
                <div class="lg:col-span-1">
                    <div class="space-y-8">
                        <!-- Popular Articles -->
                        <section class="popular-articles bg-white rounded-2xl shadow-lg p-6">
                            <div class="section-header mb-6">
                                <h3 class="text-lg font-bold text-slate-800 border-b-2 border-[#C08B2D] pb-2">
                                    الأكثر قراءة
                                </h3>
                            </div>
                            <livewire:popular-articles />
                        </section>

                        <!-- Weather Widget -->
                        <section class="weather-widget bg-white rounded-2xl shadow-lg p-6">
                            <div class="section-header mb-6">
                                <h3 class="text-lg font-bold text-slate-800 border-b-2 border-[#C08B2D] pb-2">
                                    الطقس
                                </h3>
                            </div>
                            <livewire:weather-widget />
                        </section>

                        <!-- Most Read Articles -->
                        <section class="most-read bg-white rounded-2xl shadow-lg p-6">
                            <div class="section-header mb-6">
                                <h3 class="text-lg font-bold text-slate-800 border-b-2 border-[#C08B2D] pb-2">
                                    الأكثر مشاهدة
                                </h3>
                            </div>
                            <livewire:most-read-articles />
                        </section>

                        <!-- Newsletter Signup -->
                        <section class="newsletter-sidebar bg-gradient-to-br from-[#C08B2D] to-[#B22B2B] rounded-2xl shadow-lg p-6 text-white">
                            <div class="text-center">
                                <i class="bi bi-envelope text-3xl mb-4"></i>
                                <h3 class="text-lg font-bold mb-2">اشترك في النشرة الإخبارية</h3>
                                <p class="text-sm mb-4">احصل على آخر الأخبار مباشرة في بريدك الإلكتروني</p>
                                <livewire:newsletter-signup />
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <section class="newsletter-section bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] py-16">
        <div class="container mx-auto px-4">
            <div class="text-center text-white mb-8">
                <h2 class="text-3xl font-bold mb-4">ابق على اطلاع بآخر الأخبار</h2>
                <p class="text-xl">اشترك في النشرة الإخبارية واحصل على آخر الأخبار والتقارير</p>
            </div>
            <livewire:newsletter-signup />
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Custom styles for homepage */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(192, 139, 45, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(192, 139, 45, 0.4);
        color: white;
    }

    .section-header {
        position: relative;
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #C08B2D, #B22B2B);
        border-radius: 2px;
    }

    /* Hover effects for news cards */
    .news-card-small a:hover h4 {
        color: #C08B2D;
        transition: color 0.3s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0;
        }
        
        .section-header {
            text-align: center;
        }
        
        .section-header::after {
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>
@endpush
