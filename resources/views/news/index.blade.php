@extends('layouts.app')

@section('content')
<div class="container mx-auto px-2 py-6">
    <!-- شريط البحث والتصفية -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form action="{{ route('news.search') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" 
                       name="q" 
                       value="{{ request('q') }}" 
                       placeholder="ابحث في الأخبار..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <button type="submit" 
                    class="px-6 py-2 bg-secondary text-white font-semibold rounded-lg hover:bg-primary transition-colors duration-200">
                بحث
            </button>
        </form>
    </div>

    <!-- قسم الأخبار -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-2">
            <span>📰</span> آخر الأخبار
        </h2>
        @if($news->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($news as $item)
                @include('livewire.partials.article-card', ['article' => $item])
            @endforeach
        </div>
        <div class="mt-6">{{ $news->links() }}</div>
        @else
        <div class="text-center text-gray-400">لا توجد أخبار</div>
        @endif
    </div>
    <!-- فاصل ذهبي -->
    <div class="h-1 w-full bg-gradient-to-r from-primary to-secondary rounded mb-8"></div>

    <!-- قسم التقارير -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-2">
            <span>📑</span> تقارير وتحقيقات
        </h2>
        @if($reports->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($reports as $item)
                @include('livewire.partials.article-card', ['article' => $item])
            @endforeach
        </div>
        <div class="mt-6">{{ $reports->links() }}</div>
        @else
        <div class="text-center text-gray-400">لا توجد تقارير</div>
        @endif
    </div>
    <div class="h-1 w-full bg-gradient-to-r from-primary to-secondary rounded mb-8"></div>

    <!-- قسم المقالات -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-2">
            <span>✍️</span> مقالات
        </h2>
        @if($articles->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($articles as $item)
                @include('livewire.partials.article-card', ['article' => $item])
            @endforeach
        </div>
        <div class="mt-6">{{ $articles->links() }}</div>
        @else
        <div class="text-center text-gray-400">لا توجد مقالات</div>
        @endif
    </div>
    <div class="h-1 w-full bg-gradient-to-r from-primary to-secondary rounded mb-8"></div>

    <!-- قسم الانفوجرافيك -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-2">
            <span>📊</span> انفوجرافيك
        </h2>
        @if($infographics->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($infographics as $item)
                @include('livewire.partials.article-card', ['article' => $item, 'isInfographic' => true])
            @endforeach
        </div>
        <div class="mt-6">{{ $infographics->links() }}</div>
        @else
        <div class="text-center text-gray-400">لا توجد انفوجرافيك</div>
        @endif
    </div>
</div>

<!-- ملاحظة: يجب إنشاء ملف livewire/partials/article-card.blade.php لتوحيد تصميم البطاقة -->

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

.text-primary { color: #C08B2D; }
.bg-primary { background-color: #C08B2D; }
.text-secondary { color: #B22B2B; }
.bg-secondary { background-color: #B22B2B; }
</style>
@endsection 