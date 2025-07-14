@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- عنوان الصفحة -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">فيديو حضرموت21</h1>
        <p class="text-gray-600">أحدث الفيديوهات والتقارير المصورة من حضرموت والوطن العربي</p>
    </div>

    <!-- شبكة الفيديوهات -->
    @if($videos->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($videos as $video)
                <div class="video-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- صورة الفيديو -->
                    <div class="relative h-48 bg-gray-200">
                        @if($video->thumbnail)
                            <img src="{{ $video->thumbnail }}" 
                                 alt="{{ $video->title }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-500 to-red-700">
                                <span class="text-white text-2xl font-bold">حضرموت21</span>
                            </div>
                        @endif
                        
                        <!-- زر التشغيل -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-black bg-opacity-50 rounded-full p-4 hover:bg-opacity-70 transition-all duration-200">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- شارة الفيديو المميز -->
                        @if($video->is_featured)
                            <div class="absolute top-2 right-2">
                                <span class="bg-red-600 text-white px-2 py-1 rounded text-xs font-bold">مميز</span>
                            </div>
                        @endif
                        
                        <!-- مدة الفيديو (إذا كانت متوفرة) -->
                        <div class="absolute bottom-2 right-2">
                            <span class="bg-black bg-opacity-70 text-white px-2 py-1 rounded text-xs">
                                10:30
                            </span>
                        </div>
                    </div>
                    
                    <!-- محتوى الفيديو -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                            <a href="{{ route('video.show', $video->slug) }}" 
                               class="hover:text-red-600 transition-colors duration-200">
                                {{ $video->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                            {{ $video->description }}
                        </p>
                        
                        <!-- معلومات إضافية -->
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>حضرموت21</span>
                            <span>{{ $video->published_at ? $video->published_at->diffForHumans() : '' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- ترقيم الصفحات -->
        <div class="mt-8">
            {{ $videos->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">📺</div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">لا توجد فيديوهات</h3>
            <p class="text-gray-500">لم يتم العثور على فيديوهات متاحة حالياً</p>
        </div>
    @endif

    <!-- إحصائيات الفيديو -->
    <div class="mt-12 bg-gradient-to-br from-red-500 to-red-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-4">إحصائيات الفيديو</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="text-3xl font-bold mb-2">{{ $videos->total() }}</div>
                <div class="text-sm opacity-90">إجمالي الفيديوهات</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold mb-2">{{ $videos->where('is_featured', true)->count() }}</div>
                <div class="text-sm opacity-90">فيديوهات مميزة</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold mb-2">24/7</div>
                <div class="text-sm opacity-90">بث مباشر</div>
            </div>
        </div>
    </div>

    <!-- روابط التواصل الاجتماعي -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">تابعنا على منصات الفيديو</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="#" class="flex items-center p-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
                <div>
                    <div class="font-semibold">يوتيوب</div>
                    <div class="text-sm opacity-90">تابعنا على يوتيوب</div>
                </div>
            </a>
            
            <a href="#" class="flex items-center p-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                </svg>
                <div>
                    <div class="font-semibold">تويتر</div>
                    <div class="text-sm opacity-90">تابعنا على تويتر</div>
                </div>
            </a>
            
            <a href="#" class="flex items-center p-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                <div>
                    <div class="font-semibold">فيسبوك</div>
                    <div class="text-sm opacity-90">تابعنا على فيسبوك</div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection 