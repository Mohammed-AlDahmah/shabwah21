@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- عنوان البحث -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">نتائج البحث</h1>
        <p class="text-gray-600">
            @if($articles->count() > 0)
                تم العثور على {{ $articles->total() ?? 0 }} نتيجة لـ "{{ $query ?? '' }}"
            @else
                لم يتم العثور على نتائج لـ "{{ $query ?? '' }}"
            @endif
        </p>
    </div>

    <!-- شريط البحث -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form action="{{ route('news.search') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" 
                       name="q" 
                       value="{{ $query ?? '' }}" 
                       placeholder="ابحث في الأخبار..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
            </div>
            <button type="submit" 
                    class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-200">
                بحث
            </button>
        </form>
    </div>

    <!-- نتائج البحث -->
    @if($articles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- صورة الخبر -->
                    <div class="relative h-48 bg-gray-200">
                        @if($article->featured_image)
                            <img src="{{ $article->featured_image }}" 
                                 alt="{{ $article->title ?? 'صورة الخبر' }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-500 to-red-700">
                                <span class="text-white text-2xl font-bold">شبوة21</span>
                            </div>
                        @endif
                        
                        <!-- شارة الأخبار العاجلة -->
                        @if($article->is_breaking ?? false)
                            <div class="absolute top-2 right-2">
                                <span class="bg-red-600 text-white px-2 py-1 rounded text-xs font-bold">عاجل</span>
                            </div>
                        @endif
                        
                        <!-- التصنيف -->
                        <div class="absolute bottom-2 left-2">
                            <span class="bg-black bg-opacity-70 text-white px-2 py-1 rounded text-xs">
                                {{ $article->category->name_ar ?? $article->category->name ?? 'أخبار' }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- محتوى الخبر -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                            <a href="{{ route('news.show', $article->slug ?? '') }}" 
                               class="hover:text-red-600 transition-colors duration-200">
                                {!! str_ireplace($query ?? '', '<mark class="bg-yellow-200">' . ($query ?? '') . '</mark>', $article->title ?? '') !!}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                            {!! str_ireplace($query ?? '', '<mark class="bg-yellow-200">' . ($query ?? '') . '</mark>', $article->excerpt ?? '') !!}
                        </p>
                        
                        <!-- معلومات إضافية -->
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>{{ $article->author->name ?? $article->author }}</span>
                            <span>{{ $article->time_ago }}</span>
                        </div>
                        
                        <!-- عدد المشاهدات -->
                        <div class="mt-2 text-xs text-gray-400">
                            <span>👁️ {{ $article->views_count ?? 0 }} مشاهدة</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- ترقيم الصفحات -->
        <div class="mt-8">
            {{ $articles->appends(['q' => $query ?? ''])->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">🔍</div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">لا توجد نتائج</h3>
            <p class="text-gray-500 mb-6">جرب البحث بكلمات مختلفة أو تصفح التصنيفات</p>
            
            <!-- اقتراحات البحث -->
            <div class="max-w-md mx-auto">
                <h4 class="font-semibold text-gray-700 mb-3">اقتراحات للبحث:</h4>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('news.search', ['q' => 'شبوة']) }}" 
                       class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors duration-200">
                        شبوة
                    </a>
                    <a href="{{ route('news.search', ['q' => 'المجلس الانتقالي']) }}" 
                       class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors duration-200">
                        المجلس الانتقالي
                    </a>
                    <a href="{{ route('news.search', ['q' => 'الزبيدي']) }}" 
                       class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors duration-200">
                        الزبيدي
                    </a>
                    <a href="{{ route('news.search', ['q' => 'عدن']) }}" 
                       class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors duration-200">
                        عدن
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- التصنيفات الشائعة -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">تصفح التصنيفات</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @php
                $popularCategories = \App\Models\Category::where('is_active', true)
                    ->orderBy('sort_order')
                    ->take(6)
                    ->get();
            @endphp
            
            @foreach($popularCategories as $category)
                <a href="{{ route('news.category', $category->slug ?? '') }}" 
                   class="bg-white rounded-lg p-4 text-center shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2" style="background-color: {{ $category->color ?? '#C08B2D' }}"></div>
                    <h3 class="text-sm font-semibold text-gray-800">{{ $category->name_ar ?? $category->name ?? 'تصنيف' }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $category->articles()->count() ?? 0 }} خبر</p>
                </a>
            @endforeach
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

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

mark {
    background-color: #fef3c7;
    color: #92400e;
    padding: 0.125rem 0.25rem;
    border-radius: 0.25rem;
}
</style>
@endsection 