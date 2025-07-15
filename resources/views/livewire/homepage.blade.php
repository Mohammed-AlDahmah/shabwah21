@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50">
    <!-- شريط الأخبار العاجلة -->
    <div class="bg-red-600 text-white py-2 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex items-center">
                <div class="bg-white text-red-600 px-4 py-1 rounded-full text-sm font-bold ml-4">
                    <span class="animate-pulse">●</span> عاجل
                </div>
                <div class="flex-1 whitespace-nowrap">
                    <div class="animate-marquee">
                        @livewire('breaking-news')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- قسم الأخبار المميزة -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- الخبر الرئيسي -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @livewire('featured-news')
                </div>
            </div>
            
            <!-- الأخبار الفرعية -->
            <div class="space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 border-b-2 border-blue-600 pb-2">
                        <svg class="w-5 h-5 inline-block ml-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        أبرز الأخبار
                    </h2>
                    @livewire('popular-articles', ['limit' => 5])
                </div>
            </div>
        </div>

        <!-- آخر الأخبار -->
        <div class="mb-12">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <svg class="w-6 h-6 inline-block ml-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        آخر الأخبار
                    </h2>
                    <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        عرض المزيد
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                @livewire('latest-news')
            </div>
        </div>

        <!-- قسم الفيديو والمقالات -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- قسم الفيديو -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-red-600 pb-2">
                        <svg class="w-6 h-6 inline-block ml-2 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        مقاطع الفيديو
                    </h2>
                    @livewire('video-section')
                </div>
            </div>
            
            <!-- مقالات وتقارير -->
            <div>
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 border-b-2 border-green-600 pb-2">
                        <svg class="w-5 h-5 inline-block ml-2 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14,2 14,8 20,8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10,9 9,9 8,9"/>
                        </svg>
                        تقارير ومقالات
                    </h2>
                    @livewire('articles-section')
                </div>
            </div>
        </div>

        <!-- الأقسام الرئيسية -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- رياضة -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">
                        <svg class="w-5 h-5 inline-block ml-2 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                            <path d="M2 12h20"/>
                        </svg>
                        رياضة
                    </h2>
                    <a href="{{ route('news.category', 'local-sports') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium">
                        المزيد →
                    </a>
                </div>
                @livewire('category-section', ['categorySlug' => 'local-sports', 'limit' => 4])
            </div>
            
            <!-- منوعات -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">
                        <svg class="w-5 h-5 inline-block ml-2 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        منوعات
                    </h2>
                    <a href="{{ route('news.category', 'miscellaneous') }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                        المزيد →
                    </a>
                </div>
                @livewire('category-section', ['categorySlug' => 'miscellaneous', 'limit' => 4])
            </div>
            
            <!-- ثقافة وفن -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">
                        <svg class="w-5 h-5 inline-block ml-2 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        ثقافة وفن
                    </h2>
                    <a href="{{ route('news.category', 'culture-art') }}" class="text-pink-600 hover:text-pink-800 text-sm font-medium">
                        المزيد →
                    </a>
                </div>
                @livewire('category-section', ['categorySlug' => 'culture-art', 'limit' => 4])
            </div>
        </div>

        <!-- الأقسام الإضافية -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- تقارير -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <svg class="w-4 h-4 inline-block ml-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        </svg>
                        تقارير
                    </h3>
                    <a href="{{ route('news.category', 'reports') }}" class="text-blue-600 hover:text-blue-800 text-sm">المزيد</a>
                </div>
                @livewire('category-section', ['categorySlug' => 'reports', 'limit' => 3])
            </div>
            
            <!-- مجتمع مدني -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <svg class="w-4 h-4 inline-block ml-2 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="m23 21-3.5-3.5"/>
                            <circle cx="19" cy="15" r="3"/>
                        </svg>
                        مجتمع مدني
                    </h3>
                    <a href="{{ route('news.category', 'civil-society') }}" class="text-green-600 hover:text-green-800 text-sm">المزيد</a>
                </div>
                @livewire('category-section', ['categorySlug' => 'civil-society', 'limit' => 3])
            </div>
            
            <!-- صحافة المواطن -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <svg class="w-4 h-4 inline-block ml-2 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        صحافة المواطن
                    </h3>
                    <a href="{{ route('news.category', 'citizen-journalism') }}" class="text-yellow-600 hover:text-yellow-800 text-sm">المزيد</a>
                </div>
                @livewire('category-section', ['categorySlug' => 'citizen-journalism', 'limit' => 3])
            </div>
            
            <!-- الأكثر مشاهدة -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <svg class="w-4 h-4 inline-block ml-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        الأكثر مشاهدة
                    </h3>
                </div>
                @livewire('popular-articles', ['limit' => 3])
            </div>
        </div>

        <!-- الأخبار الإقليمية والعالمية -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- أخبار عربية -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">
                        <svg class="w-5 h-5 inline-block ml-2 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 16V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM7 10h5v2H7v-2zm0 4h3v2H7v-2zm0-8h5v2H7V6z"/>
                        </svg>
                        أخبار عربية
                    </h2>
                    <a href="{{ route('news.category', 'arabic-news') }}" class="text-green-600 hover:text-green-800 font-medium">
                        عرض المزيد
                    </a>
                </div>
                @livewire('category-section', ['categorySlug' => 'arabic-news', 'limit' => 4])
            </div>
            
            <!-- أخبار عالمية -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">
                        <svg class="w-5 h-5 inline-block ml-2 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                            <path d="M2 12h20"/>
                        </svg>
                        أخبار عالمية
                    </h2>
                    <a href="{{ route('news.category', 'world-news') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                        عرض المزيد
                    </a>
                </div>
                @livewire('category-section', ['categorySlug' => 'world-news', 'limit' => 4])
            </div>
        </div>

        <!-- إعلانات أو محتوى إضافي -->
        <div class="bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl p-8 text-center mb-12">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">شاركنا رأيك</h3>
            <p class="text-gray-600 mb-6">تواصل معنا وأرسل لنا أخبارك ومقالاتك</p>
            <div class="flex justify-center space-x-4 space-x-reverse">
                <a href="{{ route('contact') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    اتصل بنا
                </a>
                <a href="#" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    أرسل خبر
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
