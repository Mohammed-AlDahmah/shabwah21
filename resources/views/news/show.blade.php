@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->excerpt)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-600 mb-6">
            <a href="{{ route('home') }}" class="hover:text-red-600">الرئيسية</a>
            <span class="mx-2">/</span>
            <a href="{{ route('news.category', $article->category->slug) }}" class="hover:text-red-600">{{ $article->category->name }}</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">{{ $article->title }}</span>
        </nav>

        <!-- Article Header -->
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 leading-tight">{{ $article->title }}</h1>
            
            <div class="flex items-center justify-between text-sm text-gray-600 mb-6">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span>{{ $article->author }}</span>
                    <span>{{ $article->time_ago }}</span>
                    <span>{{ $article->category->name }}</span>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse">
                    <span>المصدر:</span>
                    <span class="text-gray-800">{{ $article->source ?? 'شبوة21' }}</span>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($article->featured_image)
            <div class="mb-8">
                <img src="{{ $article->featured_image }}" 
                     alt="{{ $article->title }}" 
                     class="w-full h-96 object-cover rounded-lg shadow-lg">
            </div>
        @endif

        <!-- Article Content -->
        <article class="prose prose-lg max-w-none mb-8">
            <div class="text-gray-800 leading-relaxed text-lg">
                {!! $article->content !!}
            </div>
        </article>

        <!-- Article Footer -->
        <footer class="border-t border-gray-200 pt-6 mb-8">
            <div class="flex items-center justify-between text-sm text-gray-600">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span>عدد المشاهدات: {{ $article->views_count }}</span>
                    <span>وقت القراءة: {{ $article->reading_time }} دقيقة</span>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse">
                    <span>شارك:</span>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" target="_blank" class="text-blue-500 hover:text-blue-700" aria-label="تويتر">
                        <i class="bi bi-twitter-x text-xl"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="text-blue-700 hover:text-blue-900" aria-label="فيسبوك">
                        <i class="bi bi-facebook text-xl"></i>
                    </a>
                    <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" target="_blank" class="text-sky-500 hover:text-sky-700" aria-label="تليجرام">
                        <i class="bi bi-telegram text-xl"></i>
                    </a>
                    <button x-data="{}" @click="navigator.clipboard.writeText('{{ url()->current() }}'); $dispatch('notify', {text:'تم نسخ الرابط'});" class="text-gray-500 hover:text-primary" aria-label="نسخ الرابط">
                        <i class="bi bi-link-45deg text-xl"></i>
                    </button>
                </div>
            </div>
        </footer>

        <!-- Related Articles -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">مقالات ذات صلة</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $relatedArticles = \App\Models\Article::where('category_id', $article->category_id)
                        ->where('id', '!=', $article->id)
                        ->where('is_published', true)
                        ->orderBy('published_at', 'desc')
                        ->take(3)
                        ->get();
                @endphp
                
                @foreach($relatedArticles as $related)
                    <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <img src="{{ $related->featured_image ?: '/images/placeholder.jpg' }}" 
                             alt="{{ $related->title }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2 line-clamp-2">
                                <a href="{{ route('news.show', $related->slug) }}" 
                                   class="text-gray-800 hover:text-red-600 transition-colors">
                                    {{ $related->title }}
                                </a>
                            </h3>
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <span>{{ $related->category->name }}</span>
                                <span>{{ $related->time_ago }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection 