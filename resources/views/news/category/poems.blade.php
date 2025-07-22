@extends('layouts.app')

@section('title', 'قصائد شعرية - شبوة21')

@section('content')
<div class="poems-page">
    <!-- Hero Section -->
    <section class="hero-section bg-gradient-to-br from-purple-600 to-indigo-800 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full mb-6">
                <i class="bi bi-quote text-3xl"></i>
            </div>
            <h1 class="text-5xl font-bold mb-4">قصائد شعرية</h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto">مجموعة من أجمل القصائد الشعرية المختارة بعناية من مختلف العصور والأشعار</p>
        </div>
    </section>

    <!-- Poems Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($articles as $poem)
                <div class="poem-card group">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            @if($poem->image)
                                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($poem->image) }}" 
                                     alt="{{ $poem->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center">
                                    <i class="bi bi-quote text-4xl text-white opacity-50"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    قصيدة
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-600 transition-colors">
                                <a href="{{ route('news.show', $poem->slug) }}">{{ $poem->title }}</a>
                            </h3>
                            
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                {{ Str::limit($poem->excerpt, 120) }}
                            </p>

                            <!-- Meta -->
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <div class="flex items-center gap-2">
                                    <i class="bi bi-calendar3"></i>
                                    <span>{{ $poem->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="bi bi-eye"></i>
                                    <span>{{ number_format($poem->views_count ?? 0) }}</span>
                                </div>
                            </div>

                            <!-- Read More Button -->
                            <div class="mt-4">
                                <a href="{{ route('news.show', $poem->slug) }}" 
                                   class="inline-flex items-center gap-2 text-purple-600 font-medium hover:text-purple-700 transition-colors">
                                    <span>اقرأ القصيدة</span>
                                    <i class="bi bi-arrow-left text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-16">
                    <i class="bi bi-quote text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-600 mb-2">لا توجد قصائد حالياً</h3>
                    <p class="text-gray-500">سيتم إضافة قصائد جديدة قريباً</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($articles->hasPages())
            <div class="mt-12">
                {{ $articles->links() }}
            </div>
            @endif
        </div>
    </section>
</div>

<style>
.poems-page .hero-section {
    position: relative;
    overflow: hidden;
}

.poems-page .hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="poems-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="%23ffffff" opacity="0.05"/><circle cx="10" cy="60" r="0.5" fill="%23ffffff" opacity="0.05"/><circle cx="90" cy="40" r="0.5" fill="%23ffffff" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23poems-pattern)"/></svg>');
    opacity: 0.3;
    pointer-events: none;
}
</style>
@endsection 