@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- عنوان التصنيف -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-4 h-4 rounded-full" style="background-color: {{ $category->color }}"></div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $category->name_ar }}</h1>
        </div>
        @if($category->description_ar)
            <p class="text-gray-600 text-lg">{{ $category->description_ar }}</p>
        @endif
    </div>

    <!-- إحصائيات التصنيف -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
            <div>
                <div class="text-2xl font-bold text-red-600">{{ $articles->total() }}</div>
                <div class="text-sm text-gray-600">إجمالي الأخبار</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-blue-600">{{ $articles->count() }}</div>
                <div class="text-sm text-gray-600">في هذه الصفحة</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-green-600">{{ $category->articles()->where('is_breaking', true)->count() }}</div>
                <div class="text-sm text-gray-600">أخبار عاجلة</div>
            </div>
        </div>
    </div>

    <!-- شبكة الأخبار -->
    @if($articles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- صورة الخبر -->
                    <div class="relative h-48 bg-gray-200">
                        @if($article->featured_image)
                            <img src="{{ $article->featured_image }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-500 to-red-700">
                                <span class="text-white text-2xl font-bold">شبوة21</span>
                            </div>
                        @endif
                        
                        <!-- شارة الأخبار العاجلة -->
                        @if($article->is_breaking)
                            <div class="absolute top-2 right-2">
                                <span class="bg-red-600 text-white px-2 py-1 rounded text-xs font-bold">عاجل</span>
                            </div>
                        @endif
                        
                        <!-- شارة الخبر المميز -->
                        @if($article->is_featured)
                            <div class="absolute top-2 left-2">
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs font-bold">مميز</span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- محتوى الخبر -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                            <a href="{{ route('news.show', $article->slug) }}" 
                               class="hover:text-red-600 transition-colors duration-200">
                                {{ $article->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                            {{ $article->excerpt }}
                        </p>
                        
                        <!-- معلومات إضافية -->
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>{{ $article->author }}</span>
                            <span>{{ $article->time_ago }}</span>
                        </div>
                        
                        <!-- عدد المشاهدات -->
                        <div class="mt-2 text-xs text-gray-400">
                            <span>👁️ {{ $article->views_count }} مشاهدة</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- ترقيم الصفحات -->
        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">📰</div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">لا توجد أخبار</h3>
            <p class="text-gray-500">لم يتم العثور على أخبار في هذا التصنيف</p>
        </div>
    @endif

    <!-- التصنيفات الأخرى -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">تصفح التصنيفات الأخرى</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @php
                $otherCategories = \App\Models\Category::where('id', '!=', $category->id)
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->take(6)
                    ->get();
            @endphp
            
            @foreach($otherCategories as $otherCategory)
                <a href="{{ route('news.category', $otherCategory->slug) }}" 
                   class="bg-white rounded-lg p-4 text-center shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2" style="background-color: {{ $otherCategory->color }}"></div>
                    <h3 class="text-sm font-semibold text-gray-800">{{ $otherCategory->name_ar }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $otherCategory->articles()->count() }} خبر</p>
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
</style>
@endsection 