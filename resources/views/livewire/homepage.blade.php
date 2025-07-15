@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-6">
    <!-- القسم الرئيسي - أبرز الأخبار -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- العمود الرئيسي -->
        <div class="lg:col-span-2">
            @livewire('featured-news')
        </div>
        
        <!-- العمود الجانبي -->
        <div class="space-y-6">
            <!-- الأكثر قراءة -->
            <div class="sidebar-widget">
                <h3 class="widget-title">الأكثر قراءة</h3>
                @livewire('popular-articles', ['limit' => 5])
            </div>
            
            <!-- إعلان -->
            <div class="sidebar-widget">
                <div class="bg-gray-200 h-64 flex items-center justify-center text-gray-500">
                    مساحة إعلانية
                </div>
            </div>
        </div>
    </div>

    <!-- قسم التبويبات الرئيسي -->
    <div class="tabs-container" x-data="{ activeTab: 'latest' }">
        <div class="tabs-nav">
            <button @click="activeTab = 'latest'" 
                    :class="activeTab === 'latest' ? 'tab-button active' : 'tab-button'">
                آخر الأخبار
            </button>
            <button @click="activeTab = 'local'" 
                    :class="activeTab === 'local' ? 'tab-button active' : 'tab-button'">
                محليات
            </button>
            <button @click="activeTab = 'politics'" 
                    :class="activeTab === 'politics' ? 'tab-button active' : 'tab-button'">
                سياسة
            </button>
            <button @click="activeTab = 'economy'" 
                    :class="activeTab === 'economy' ? 'tab-button active' : 'tab-button'">
                اقتصاد
            </button>
            <button @click="activeTab = 'sports'" 
                    :class="activeTab === 'sports' ? 'tab-button active' : 'tab-button'">
                رياضة
            </button>
            <button @click="activeTab = 'culture'" 
                    :class="activeTab === 'culture' ? 'tab-button active' : 'tab-button'">
                ثقافة وفن
            </button>
            <button @click="activeTab = 'tech'" 
                    :class="activeTab === 'tech' ? 'tab-button active' : 'tab-button'">
                تقنية
            </button>
        </div>
        
        <!-- محتوى التبويبات -->
        <div class="tab-content">
            <div x-show="activeTab === 'latest'">
                @livewire('latest-news', ['limit' => 6])
            </div>
            <div x-show="activeTab === 'local'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'local-news', 'limit' => 6])
            </div>
            <div x-show="activeTab === 'politics'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'politics', 'limit' => 6])
            </div>
            <div x-show="activeTab === 'economy'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'economy', 'limit' => 6])
            </div>
            <div x-show="activeTab === 'sports'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'local-sports', 'limit' => 6])
            </div>
            <div x-show="activeTab === 'culture'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'culture-art', 'limit' => 6])
            </div>
            <div x-show="activeTab === 'tech'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'technology', 'limit' => 6])
            </div>
        </div>
    </div>

    <!-- قسم الفيديو -->
    <div class="my-8">
        <div class="section-header flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">فيديو</h2>
            <a href="{{ route('videos.index') }}" class="text-primary hover:underline">المزيد</a>
        </div>
        @livewire('video-section', ['limit' => 4])
    </div>

    <!-- أقسام إضافية في شبكة -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 my-8">
        <!-- تقارير -->
        <div class="news-section">
            <h3 class="section-title mb-4">تقارير</h3>
            @livewire('category-section', ['categorySlug' => 'reports', 'limit' => 4, 'view' => 'list'])
        </div>
        
        <!-- مقالات -->
        <div class="news-section">
            <h3 class="section-title mb-4">آراء ومقالات</h3>
            @livewire('articles-section', ['limit' => 4])
        </div>
        
        <!-- منوعات -->
        <div class="news-section">
            <h3 class="section-title mb-4">منوعات</h3>
            @livewire('category-section', ['categorySlug' => 'miscellaneous', 'limit' => 4, 'view' => 'list'])
        </div>
        
        <!-- صحة -->
        <div class="news-section">
            <h3 class="section-title mb-4">صحة</h3>
            @livewire('category-section', ['categorySlug' => 'health', 'limit' => 4, 'view' => 'list'])
        </div>
    </div>

    <!-- قسم آخر مع تبويبات -->
    <div class="tabs-container" x-data="{ activeTab2: 'arab' }">
        <div class="tabs-nav">
            <button @click="activeTab2 = 'arab'" 
                    :class="activeTab2 === 'arab' ? 'tab-button active' : 'tab-button'">
                أخبار عربية
            </button>
            <button @click="activeTab2 = 'world'" 
                    :class="activeTab2 === 'world' ? 'tab-button active' : 'tab-button'">
                أخبار دولية
            </button>
            <button @click="activeTab2 = 'english'" 
                    :class="activeTab2 === 'english' ? 'tab-button active' : 'tab-button'">
                English News
            </button>
        </div>
        
        <div class="tab-content">
            <div x-show="activeTab2 === 'arab'">
                @livewire('category-section', ['categorySlug' => 'arabic-news', 'limit' => 6])
            </div>
            <div x-show="activeTab2 === 'world'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'world-news', 'limit' => 6])
            </div>
            <div x-show="activeTab2 === 'english'" x-cloak>
                @livewire('category-section', ['categorySlug' => 'english-news', 'limit' => 6])
            </div>
        </div>
    </div>

    <!-- مساحة إعلانية -->
    <div class="my-8 bg-gray-200 h-32 flex items-center justify-center text-gray-500 rounded-lg">
        مساحة إعلانية
    </div>

    <!-- قسم أخير - صحافة المواطن ومجتمع مدني -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="section-title mb-4">صحافة المواطن</h3>
            @livewire('category-section', ['categorySlug' => 'citizen-journalism', 'limit' => 5])
        </div>
        <div>
            <h3 class="section-title mb-4">مجتمع مدني</h3>
            @livewire('category-section', ['categorySlug' => 'civil-society', 'limit' => 5])
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 10px;
        display: inline-block;
    }
    
    .section-header {
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 10px;
    }
</style>

@endsection
