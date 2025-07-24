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
                        <div class="title-wrapper">
                            <div class="title-decoration"></div>
                            <div>
                                <h2>أبرز الأخبار</h2>
                                <p>أهم الأخبار والتقارير المميزة</p>
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
                            <div class="section-header mb-4">
                                <div class="title-wrapper">
                                    <div class="title-decoration" style="height: 40px;"></div>
                                    <h3>أخبار مميزة</h3>
                                </div>
                            </div>
                            <livewire:featured-news limit="4" />
                        </div>
                        
                        <!-- Popular Articles -->
                        <div class="sidebar-widget bg-white rounded-2xl p-6">
                            <div class="section-header mb-4">
                                <div class="title-wrapper">
                                    <div class="title-decoration" style="height: 40px;"></div>
                                    <h3>الأكثر قراءة</h3>
                                </div>
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
 

    <!-- About Us Section -->
    @if(!empty($aboutInfo['title']) || !empty($aboutInfo['description']))
    <section class="about-section bg-gradient-to-br from-[#fff8e1] to-white py-12">
        <div class="container mx-auto px-2">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-[#B22B2B] mb-4">{{ $aboutInfo['title'] ?? 'من نحن' }}</h2>
                @if(!empty($aboutInfo['subtitle']))
                    <p class="text-lg text-[#C08B2D]">{{ $aboutInfo['subtitle'] }}</p>
                @endif
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                @if(!empty($aboutInfo['description']))
                <div class="about-content">
                    <p class="text-gray-700 leading-relaxed">{{ $aboutInfo['description'] }}</p>
                </div>
                @endif
                
                @if(!empty($aboutInfo['vision']) || !empty($aboutInfo['mission']))
                <div class="vision-mission">
                    @if(!empty($aboutInfo['vision']))
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-[#B22B2B] mb-3">رؤيتنا</h3>
                        <p class="text-gray-600">{{ $aboutInfo['vision'] }}</p>
                    </div>
                    @endif
                    
                    @if(!empty($aboutInfo['mission']))
                    <div>
                        <h3 class="text-xl font-bold text-[#B22B2B] mb-3">رسالتنا</h3>
                        <p class="text-gray-600">{{ $aboutInfo['mission'] }}</p>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            
            <!-- Values Section -->
            @if(!empty($aboutInfo['values']))
            <div class="values-section mb-8">
                <h3 class="text-2xl font-bold text-[#B22B2B] text-center mb-6">قيمنا</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($aboutInfo['values'] as $value)
                    <div class="value-card bg-white rounded-lg p-6 text-center shadow-md">
                        @if(!empty($value['icon']))
                        <div class="text-3xl text-[#C08B2D] mb-3">
                            <i class="{{ $value['icon'] }}"></i>
                        </div>
                        @endif
                        <h4 class="text-lg font-bold text-[#B22B2B] mb-2">{{ $value['title'] ?? '' }}</h4>
                        <p class="text-gray-600">{{ $value['description'] ?? '' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Services Section -->
            @if(!empty($aboutInfo['services']))
            <div class="services-section mb-8">
                <h3 class="text-2xl font-bold text-[#B22B2B] text-center mb-6">خدماتنا</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($aboutInfo['services'] as $service)
                    <div class="service-card bg-white rounded-lg p-6 text-center shadow-md">
                        @if(!empty($service['icon']))
                        <div class="text-3xl text-[#C08B2D] mb-3">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        @endif
                        <h4 class="text-lg font-bold text-[#B22B2B] mb-2">{{ $service['title'] ?? '' }}</h4>
                        <p class="text-gray-600">{{ $service['description'] ?? '' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Stats Section -->
            @if(!empty($aboutInfo['stats']))
            <div class="stats-section">
                <h3 class="text-2xl font-bold text-[#B22B2B] text-center mb-6">إحصائياتنا</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($aboutInfo['stats'] as $stat)
                    <div class="stat-card bg-white rounded-lg p-6 text-center shadow-md">
                        @if(!empty($stat['icon']))
                        <div class="text-3xl text-[#C08B2D] mb-2">
                            <i class="{{ $stat['icon'] }}"></i>
                        </div>
                        @endif
                        <div class="text-2xl font-bold text-[#B22B2B] mb-1">{{ $stat['value'] ?? '' }}</div>
                        <div class="text-gray-600">{{ $stat['title'] ?? '' }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Contact Info Section -->
    @if(!empty($contactInfo['email']) || !empty($contactInfo['phone']) || !empty($contactInfo['address']))
    <section class="contact-info-section bg-white py-12">
        <div class="container mx-auto px-2">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-[#B22B2B] mb-4">معلومات التواصل</h2>
                <p class="text-lg text-[#C08B2D]">تواصل معنا عبر الطرق التالية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @if(!empty($contactInfo['email']))
                <div class="contact-card bg-gradient-to-br from-[#fff8e1] to-white rounded-lg p-6 text-center">
                    <div class="text-3xl text-[#C08B2D] mb-3">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h4 class="text-lg font-bold text-[#B22B2B] mb-2">البريد الإلكتروني</h4>
                    <p class="text-gray-600">{{ $contactInfo['email'] }}</p>
                </div>
                @endif
                
                @if(!empty($contactInfo['phone']))
                <div class="contact-card bg-gradient-to-br from-[#fff8e1] to-white rounded-lg p-6 text-center">
                    <div class="text-3xl text-[#C08B2D] mb-3">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h4 class="text-lg font-bold text-[#B22B2B] mb-2">رقم الهاتف</h4>
                    <p class="text-gray-600">{{ $contactInfo['phone'] }}</p>
                </div>
                @endif
                
                @if(!empty($contactInfo['address']))
                <div class="contact-card bg-gradient-to-br from-[#fff8e1] to-white rounded-lg p-6 text-center">
                    <div class="text-3xl text-[#C08B2D] mb-3">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h4 class="text-lg font-bold text-[#B22B2B] mb-2">العنوان</h4>
                    <p class="text-gray-600">{{ $contactInfo['address'] }}</p>
                </div>
                @endif
            </div>
            
            @if(!empty($contactInfo['work_hours']))
            <div class="text-center mt-6">
                <div class="inline-block bg-[#C08B2D] text-white px-6 py-3 rounded-lg">
                    <i class="bi bi-clock ml-2"></i>
                    <span>{{ $contactInfo['work_hours'] }}</span>
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Main Content Area -->
    <div class="bg-slate-50">
        <div class="container mx-auto px-2 py-8">
            <!-- Latest News Section - Full Width with Margins -->
            <div class="w-full mb-8">
                <section class="section-card">
                    <div class="section-header">
                        <div class="flex items-center justify-between">
                            <div class="title-wrapper">
                                <div class="title-decoration"></div>
                                <div>
                                    <h2>آخر الأخبار</h2>
                                    <p>أحدث الأخبار والتقارير</p>
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
                <section class="section-card">
                    <div class="section-header">
                        <div class="title-wrapper">
                            <div class="title-decoration"></div>
                            <div>
                                <h2>الأقسام الإخبارية</h2>
                                <p>تصفح الأخبار حسب التصنيف</p>
                            </div>
                        </div>
                    </div>
                    <livewire:category-section />
                </section>

                <!-- Sports Section -->
                <section class="section-card">
                    <div class="section-header">
                        <div class="title-wrapper">
                            <div class="title-decoration"></div>
                            <div>
                                <h2>الرياضة</h2>
                                <p>أخبار الرياضة المحلية والعالمية</p>
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
                <section class="section-card">
                    <div class="section-header">
                        <div class="title-wrapper">
                            <div class="title-decoration"></div>
                            <div>
                                <h2>الرأي والتحليل</h2>
                                <p>مقالات الرأي والتحليلات السياسية</p>
                            </div>
                        </div>
                    </div>
                    <livewire:opinion-articles :limit="\App\Models\SiteSettings::getValue('opinion_articles_per_page', 4)" />
                </section>

                <!-- Most Read Articles -->
                <section class="section-card">
                    <div class="section-header">
                        <div class="title-wrapper">
                            <div class="title-decoration"></div>
                            <div>
                                <h2>الأكثر قراءة</h2>
                                <p>الأخبار الأكثر تداولاً وقراءة</p>
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
    <section class="video-section">
        <div class="container mx-auto px-2">
            <div class="section-card">
                <div class="section-header">
                    <div class="title-wrapper">
                        <div class="title-decoration"></div>
                        <div>
                            <h2>فيديو شبوة21</h2>
                            <p>أحدث الفيديوهات والتقارير المصورة</p>
                        </div>
                    </div>
                </div>
                <livewire:video-section :limit="\App\Models\SiteSettings::getValue('videos_per_page', 6)" />
            </div>
        </div>
    </section>
    @endif

    <!-- الانفوجرافيك -->
    <section class="infographics-wrapper">
        <div class="container mx-auto px-2">
            <div class="section-card">
                <div class="section-header">
                    <div class="title-wrapper">
                        <div class="title-decoration"></div>
                        <div>
                            <h2>انفوجرافيك</h2>
                            <p>رسوم بيانية ومعلومات مرئية تفاعلية</p>
                        </div>
                    </div>
                </div>
                @livewire('infographics-section')
            </div>
        </div>
    </section>

    <!-- الأقسام المخصصة في صف واحد -->
    @php
    $sections = [
        ['component' => 'poems-section', 'icon' => 'bi-quote', 'title' => 'قصائد شعرية'],
        ['component' => 'health-section', 'icon' => 'bi-heart-pulse', 'title' => 'طب وصحة'],
        ['component' => 'greetings-section', 'icon' => 'bi-emoji-smile', 'title' => 'تهاني'],
        ['component' => 'condolences-section', 'icon' => 'bi-heart', 'title' => 'تعازي'],
    ];
    @endphp
    <section class="special-sections">
        <div class="container mx-auto px-2">
            <div class="section-header">
                <div class="title-wrapper">
                    <div class="title-decoration"></div>
                    <div>
                        <h2>الأقسام المميزة</h2>
                        <p>أقسام متخصصة لمحتوى متنوع</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                @foreach($sections as $section)
                    <div class="special-card">
                        <div class="special-card-header">
                            <div class="icon-circle"><i class="bi {{ $section['icon'] }}"></i></div>
                            <h3>{{ $section['title'] }}</h3>
                        </div>
                        <div class="flex-1 flex flex-col w-full px-1 pb-1">
                            @livewire($section['component'])
                        </div>
                    </div>
                @endforeach
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
