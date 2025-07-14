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
                    <a href="#" class="text-blue-600 hover:text-blue-800">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-blue-800 hover:text-blue-900">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
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