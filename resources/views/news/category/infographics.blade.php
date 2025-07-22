@extends('layouts.app')

@section('title', 'انفوجرافيك - شبوة21')
@section('description', 'رسوم بيانية ومعلومات مرئية تفاعلية من شبوة21')
@section('keywords', 'انفوجرافيك, رسوم بيانية, إحصائيات, شبوة21')

@section('content')
<div class="infographics-page bg-gradient-to-br from-cyan-50 to-blue-50 min-h-screen">
    <!-- Header Section -->
    <section class="page-header py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full mb-8">
                    <i class="bi bi-bar-chart text-3xl text-white"></i>
                </div>
                <h1 class="text-5xl font-bold text-gray-800 mb-6">انفوجرافيك</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    رسوم بيانية ومعلومات مرئية تفاعلية تقدم البيانات والإحصائيات بطريقة سهلة ومفهومة
                </p>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <div class="stat-card bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-center w-12 h-12 bg-cyan-100 rounded-full mb-4">
                            <i class="bi bi-graph-up text-cyan-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $articles->total() }}</h3>
                        <p class="text-gray-600">إجمالي الانفوجرافيك</p>
                    </div>
                    
                    <div class="stat-card bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full mb-4">
                            <i class="bi bi-eye text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ number_format($articles->sum('views_count')) }}</h3>
                        <p class="text-gray-600">إجمالي المشاهدات</p>
                    </div>
                    
                    <div class="stat-card bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-full mb-4">
                            <i class="bi bi-calendar-check text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $articles->where('is_featured', true)->count() }}</h3>
                        <p class="text-gray-600">انفوجرافيك مميز</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Infographics Grid -->
    <section class="infographics-grid py-16">
        <div class="container mx-auto px-4">
            @if($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($articles as $article)
                    <div class="infographic-card group">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-cyan-100">
                            <!-- Image -->
                            <div class="relative h-64 overflow-hidden">
                                @if($article->image)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($article->image) }}" 
                                         alt="{{ $article->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center">
                                        <i class="bi bi-bar-chart text-6xl text-white opacity-50"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute top-4 right-4">
                                    <span class="bg-cyan-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                        انفوجرافيك
                                    </span>
                                </div>
                                @if($article->is_featured)
                                <div class="absolute top-4 left-4">
                                    <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                        مميز
                                    </span>
                                </div>
                                @endif
                                <div class="absolute bottom-4 left-4">
                                    <div class="bg-white/90 backdrop-blur-sm rounded-lg p-2">
                                        <i class="bi bi-graph-up text-cyan-600 text-lg"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-cyan-600 transition-colors line-clamp-2">
                                    <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                                </h3>
                                
                                <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                    {{ Str::limit($article->excerpt, 120) }}
                                </p>

                                <!-- Stats -->
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="text-center p-3 bg-cyan-50 rounded-lg">
                                        <div class="text-cyan-600 font-bold text-lg">{{ number_format($article->views_count ?? 0) }}</div>
                                        <div class="text-cyan-600 text-xs">مشاهدات</div>
                                    </div>
                                    <div class="text-center p-3 bg-blue-50 rounded-lg">
                                        <div class="text-blue-600 font-bold text-lg">{{ $article->created_at->format('d') }}</div>
                                        <div class="text-blue-600 text-xs">{{ $article->created_at->format('M') }}</div>
                                    </div>
                                </div>

                                <!-- Read More Button -->
                                <div class="text-center">
                                    <a href="{{ route('news.show', $article->slug) }}" 
                                       class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-3 rounded-full font-medium hover:from-cyan-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                        <span>عرض الانفوجرافيك</span>
                                        <i class="bi bi-arrow-left text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $articles->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="bg-white rounded-2xl p-12 max-w-md mx-auto">
                        <i class="bi bi-bar-chart text-6xl text-cyan-300 mb-6 block"></i>
                        <h3 class="text-2xl font-bold text-gray-600 mb-3">لا توجد انفوجرافيك</h3>
                        <p class="text-gray-500">سيتم إضافة انفوجرافيك جديدة قريباً</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>

<style>
.infographics-page {
    position: relative;
}

.infographics-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="infographic-page-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23e0f2fe" opacity="0.3"/><circle cx="75" cy="75" r="1" fill="%23e0f2fe" opacity="0.3"/><circle cx="50" cy="10" r="0.5" fill="%23e0f2fe" opacity="0.2"/><circle cx="10" cy="60" r="0.5" fill="%23e0f2fe" opacity="0.2"/><circle cx="90" cy="40" r="0.5" fill="%23e0f2fe" opacity="0.2"/></pattern></defs><rect width="100" height="100" fill="url(%23infographic-page-pattern)"/></svg>');
    opacity: 0.5;
    pointer-events: none;
}

.stat-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

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

/* Pagination Styles */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
}

.pagination .page-item .page-link {
    background: white;
    border: 1px solid #e5e7eb;
    color: #374151;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.pagination .page-item .page-link:hover {
    background: #06B6D4;
    color: white;
    border-color: #06B6D4;
}

.pagination .page-item.active .page-link {
    background: #06B6D4;
    color: white;
    border-color: #06B6D4;
}
</style>
@endsection 