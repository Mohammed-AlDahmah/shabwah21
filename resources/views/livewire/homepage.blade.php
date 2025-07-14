@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-6 space-y-8">
    <!-- شريط الأخبار العاجلة -->
    <div>
        @livewire('breaking-news')
    </div>

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
        </div>
    </div>

    <!-- الأقسام الديناميكية -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- الأكثر قراءة -->
        <div>
            @livewire('popular-articles', ['limit' => 5])
        </div>
        
        <!-- منوعات -->
        <div>
            @livewire('category-section', ['categorySlug' => 'miscellaneous', 'limit' => 4])
        </div>
        
        <!-- رياضة -->
        <div>
            @livewire('category-section', ['categorySlug' => 'local-sports', 'limit' => 4])
        </div>
    </div>

    <!-- المزيد من الأقسام -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- تقارير -->
        <div>
            @livewire('category-section', ['categorySlug' => 'reports', 'limit' => 3])
        </div>
        
        <!-- ثقافة وفن -->
        <div>
            @livewire('category-section', ['categorySlug' => 'culture-art', 'limit' => 3])
        </div>
        
        <!-- مجتمع مدني -->
        <div>
            @livewire('category-section', ['categorySlug' => 'civil-society', 'limit' => 3])
        </div>
        
        <!-- صحافة المواطن -->
        <div>
            @livewire('category-section', ['categorySlug' => 'citizen-journalism', 'limit' => 3])
        </div>
    </div>

    <!-- قسم إضافي للأخبار الدولية -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- أخبار عربية -->
        <div>
            @livewire('category-section', ['categorySlug' => 'arabic-news', 'limit' => 4])
        </div>
        
        <!-- أخبار عالمية -->
        <div>
            @livewire('category-section', ['categorySlug' => 'world-news', 'limit' => 4])
        </div>
    </div>
</div>

@endsection
