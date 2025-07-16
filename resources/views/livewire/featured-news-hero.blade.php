<div>
    @if($featuredNews)
<article class="bg-white rounded-xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 mb-8">
    <div class="relative">
        <img src="{{ $featuredNews->featured_image ?? 'https://via.placeholder.com/800x400' }}" 
             alt="{{ $featuredNews->title }}" 
             class="w-full h-80 object-cover">
        <div class="absolute top-4 left-4">
            <span class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold">
                {{ $featuredNews->category->name_ar ?? 'أخبار' }}
            </span>
        </div>
        <div class="absolute bottom-4 left-4">
            <span class="bg-black bg-opacity-70 text-white px-3 py-1 rounded-md text-xs">
                {{ $featuredNews->time_ago }}
            </span>
        </div>
    </div>
    <div class="p-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 hover:text-red-600 transition-colors leading-tight">
            <a href="{{ route('news.show', $featuredNews->slug) }}">
                {{ $featuredNews->title }}
            </a>
        </h1>
        <p class="text-gray-600 mb-6 leading-relaxed text-lg">
            {{ $featuredNews->excerpt }}
        </p>
        <div class="flex items-center justify-between text-sm text-gray-500">
            <div class="flex items-center gap-4">
                <span class="flex items-center">
                    <i class="bi bi-person me-1"></i>
                    {{ $featuredNews->author }}
                </span>
                <span class="flex items-center">
                    <i class="bi bi-clock me-1"></i>
                    {{ $featuredNews->reading_time }} دقيقة قراءة
                </span>
            </div>
            <div class="flex items-center gap-4">
                <span class="flex items-center">
                    <i class="bi bi-eye me-1"></i>
                    {{ number_format($featuredNews->views_count) }}
                </span>
            </div>
        </div>
    </div>
</article>
@endif
</div>