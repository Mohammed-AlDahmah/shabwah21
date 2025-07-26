<div>
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
               
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                <!-- Category Sections -->
                <section class="section-card">
                    <div class="section-header">
                        <div class="title-wrapper">
                            <div class="title-decoration"></div>
                            <div>
                                <h2>المقالات</h2>
                                <p>أخبار المقالات المحلية والعالمية</p>
                            </div>
                        </div>
                    </div>
                    <livewire:articles-section />
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
</div>
