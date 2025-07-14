<section class="mb-10">
    @if($latestNews->count() > 0)
    <div class="mb-8 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">آخر الأخبار</h2>
        <div class="w-24 h-1 mx-auto rounded bg-yellow-400 mb-2"></div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($latestNews as $news)
        <article class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col p-4 relative">
            <!-- زر مشاركة -->
            <button class="absolute top-3 right-3 bg-gray-100 hover:bg-yellow-400 text-gray-500 hover:text-white rounded-full p-2 shadow transition-colors" title="مشاركة الخبر">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M15 8a3 3 0 10-2.83-4H7.83A3 3 0 105 8c0 .13.01.26.03.39l5.1 2.55a3.01 3.01 0 100 1.12l-5.1 2.55A3 3 0 105 16a3 3 0 002.83-4h4.34A3 3 0 1015 8z"/></svg>
            </button>
            <div class="flex flex-col items-center mb-3">
                <div class="relative w-28 h-28 mb-2">
                    <img src="{{ $news->featured_image ?: '/images/placeholder.jpg' }}" alt="{{ $news->title }}" class="w-28 h-28 object-cover rounded-full border-4 border-white shadow-md">
                    <!-- أيقونة كاميرا -->
                    <div class="absolute bottom-1 left-1 bg-white/90 rounded-full p-1 shadow flex items-center justify-center">
                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 5a2 2 0 012-2h8a2 2 0 012 2v1h1a1 1 0 011 1v9a2 2 0 01-2 2H4a2 2 0 01-2-2V7a1 1 0 011-1h1V5zm2-1a1 1 0 00-1 1v1h10V5a1 1 0 00-1-1H6zm10 3H4v9a1 1 0 001 1h10a1 1 0 001-1V7z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-full">{{ $news->category->name ?? 'عام' }}</span>
                    <span class="text-xs text-gray-500">{{ $news->created_at->format('Y-m-d') }}</span>
                </div>
            </div>
            <h3 class="font-bold text-lg mb-2 text-gray-900 group-hover:text-yellow-600 transition-colors line-clamp-2 text-center">
                <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
            </h3>
            <div class="flex-1"></div>
            <div class="flex items-center justify-center gap-2 text-xs text-gray-500 mt-4">
                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12zm0-9a3 3 0 100 6 3 3 0 000-6z"/></svg>
                <span>{{ $news->views_count ?? 0 }} مشاهدة</span>
            </div>
        </article>
        @endforeach
    </div>
    @endif
</section>
