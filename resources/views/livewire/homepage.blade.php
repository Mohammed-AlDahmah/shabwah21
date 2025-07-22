@extends('layouts.app')

@section('title', 'شبوة21 - موقع إخباري احترافي')
@section('description', 'موقع شبوة21 الإخباري - آخر الأخبار والتقارير من حضرموت واليمن')
@section('keywords', 'أخبار, حضرموت, اليمن, إخبارية')

@section('content')
    @php
        use App\Models\SiteSettings;
    @endphp

    @if(!request()->routeIs('privacy') && !request()->routeIs('terms') && SiteSettings::getValue('show_hero_section', true))
        @include('livewire.partials.hero')
    @endif
            
    <!-- Breaking News Ticker -->
    @if(SiteSettings::getValue('show_breaking_news', true))
    <section class="breaking-news-section">
        <livewire:breaking-news-ticker />
    </section>
    @endif

    <!-- Hero Section with Featured News -->
     
    <section class="hero-section bg-gradient-to-br from-slate-50 to-white py-8">
        <div class="container mx-auto px-2">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
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
                    <div class="space-y-6">
                        <!-- Homepage Button -->
                        <div class="homepage-btn-section">
                            <a href="{{ route('home') }}" class="btn-primary w-full text-center">
                                <i class="bi bi-house-door ml-2"></i>
                                الصفحة الرئيسية
                            </a>
                        </div>
                        
                        <!-- Featured News Sidebar -->
                        <div class="sidebar-widget bg-white rounded-2xl p-6">
                            <div class="section-header mb-6">
                                <h3 class="text-lg font-bold text-slate-800 mb-2">أخبار مميزة</h3>
                                <div class="w-12 h-1 bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] rounded"></div>
                            </div>
                            <livewire:featured-news limit="4" />
                        </div>
                        
                        <!-- Popular Articles -->
                        <div class="sidebar-widget bg-white rounded-2xl p-6">
                            <div class="section-header mb-6">
                                <h3 class="text-lg font-bold text-slate-800 mb-2">الأكثر قراءة</h3>
                                <div class="w-12 h-1 bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] rounded"></div>
                            </div>
                            <livewire:popular-articles />
                        </div>
                        
                        <!-- Weather Widget -->
                        <div class="weather-widget bg-white rounded-2xl p-6">
                            <livewire:weather-widget />
                        </div>
                        
                        <!-- Newsletter Sidebar -->
                        @if(SiteSettings::getValue('show_newsletter', true))
                        <div class="newsletter-sidebar rounded-2xl p-6 text-white relative overflow-hidden">
                            <div class="relative z-10">
                                <h3 class="text-lg font-bold mb-3">اشترك في النشرة الإخبارية</h3>
                                <p class="text-sm mb-4 opacity-90">احصل على آخر الأخبار والتقارير مباشرة في بريدك الإلكتروني</p>
                                <livewire:newsletter-signup />
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
 

    <!-- Main Content Area -->
    <div class="bg-slate-50">
        <div class="container mx-auto px-2 py-8">
            <!-- Latest News Section - Full Width with Margins -->
            <div class="w-full mb-8">
                <section class="section-card bg-white rounded-2xl p-6">
                    <div class="section-header mb-6">
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
            </div>

            <!-- Other Sections in Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                <!-- Category Sections -->
                <section class="section-card bg-white rounded-2xl p-6">
                    <div class="section-header mb-6">
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

                <!-- Sports Section -->
                <section class="section-card bg-white rounded-2xl p-6">
                    <div class="section-header mb-6">
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
    </div>

    <!-- Additional Sections -->
    <section class="additional-sections py-8">
        <div class="container mx-auto px-2">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Opinion Articles -->
                <section class="section-card bg-white rounded-2xl p-6">
                    <div class="section-header mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-800">الرأي والتحليل</h2>
                                <p class="text-slate-600">مقالات الرأي والتحليلات السياسية</p>
                            </div>
                        </div>
                    </div>
                    <livewire:opinion-articles :limit="$opinionArticlesPerPage" />
                </section>

                <!-- Most Read Articles -->
                <section class="section-card bg-white rounded-2xl p-6">
                    <div class="section-header mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                            <div>
                                <h2 class="text-2xl font-bold text-slate-800">الأكثر قراءة</h2>
                                <p class="text-slate-600">الأخبار الأكثر تداولاً وقراءة</p>
                            </div>
                        </div>
                    </div>
                    <livewire:most-read-articles />
                </section>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    

    <!-- Video Section -->
    @if(SiteSettings::getValue('show_video_in_nav', true))
    <section class="section-card bg-white rounded-2xl p-6">
        <div class="section-header mb-6">
            <div class="flex items-center gap-4">
                <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">فيديو شبوة21</h2>
                    <p class="text-slate-600">أحدث الفيديوهات والتقارير المصورة</p>
                </div>
            </div>
        </div>
        <livewire:video-section :limit="$videosPerPage" />
    </section>
    @endif

    <!-- الانفوجرافيك -->
    <section class="infographics-wrapper py-12">
        <div class="container mx-auto px-2">
            <div class="section-header mb-8">
                <div class="flex items-center gap-4">
                    <div class="w-1 h-12 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">انفوجرافيك</h2>
                        <p class="text-slate-600">رسوم بيانية ومعلومات مرئية تفاعلية</p>
                    </div>
                </div>
            </div>
            @livewire('infographics-section')
        </div>
    </section>

    <!-- الأقسام المخصصة في صف واحد -->
    <section class="special-sections py-1">
        <div class="container mx-auto px-0">
            <div class="section-header mb-2">
                <div class="flex items-center gap-1">
                    <div class="w-1 h-6 bg-gradient-to-b from-[#C08B2D] to-[#B22B2B] rounded-full"></div>
                    <h2 class="text-base font-bold text-slate-800">الأقسام المميزة</h2>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-[2px]">
                <!-- كارد موحد لجميع الأقسام -->
                <div class="special-card bg-white rounded-md p-0 flex flex-col items-center border border-gray-200 shadow-sm">
                    <div class="special-card-header w-full flex flex-col items-center justify-center py-1 rounded-t-md">
                        <div class="icon-circle mb-1"><i class="bi bi-quote text-[#C08B2D] text-base"></i></div>
                        <h3 class="text-xs font-bold text-slate-700 text-center">قصائد شعرية</h3>
                    </div>
                    <div class="flex-1 flex flex-col w-full px-1 pb-1">
                        @livewire('poems-section')
                    </div>
                </div>
                <div class="special-card bg-white rounded-md p-0 flex flex-col items-center border border-gray-200 shadow-sm">
                    <div class="special-card-header w-full flex flex-col items-center justify-center py-1 rounded-t-md">
                        <div class="icon-circle mb-1"><i class="bi bi-heart-pulse text-[#C08B2D] text-base"></i></div>
                        <h3 class="text-xs font-bold text-slate-700 text-center">طب وصحة</h3>
                    </div>
                    <div class="flex-1 flex flex-col w-full px-1 pb-1">
                        @livewire('health-section')
                    </div>
                </div>
                <div class="special-card bg-white rounded-md p-0 flex flex-col items-center border border-gray-200 shadow-sm">
                    <div class="special-card-header w-full flex flex-col items-center justify-center py-1 rounded-t-md">
                        <div class="icon-circle mb-1"><i class="bi bi-emoji-smile text-[#C08B2D] text-base"></i></div>
                        <h3 class="text-xs font-bold text-slate-700 text-center">تهاني</h3>
                    </div>
                    <div class="flex-1 flex flex-col w-full px-1 pb-1">
                        @livewire('greetings-section')
                    </div>
                </div>
                <div class="special-card bg-white rounded-md p-0 flex flex-col items-center border border-gray-200 shadow-sm">
                    <div class="special-card-header w-full flex flex-col items-center justify-center py-1 rounded-t-md">
                        <div class="icon-circle mb-1"><i class="bi bi-heart text-[#C08B2D] text-base"></i></div>
                        <h3 class="text-xs font-bold text-slate-700 text-center">تعازي</h3>
                    </div>
                    <div class="flex-1 flex flex-col w-full px-1 pb-1">
                        @livewire('condolences-section')
                    </div>
                </div>
            </div>
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
