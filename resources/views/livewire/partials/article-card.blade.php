<div class="relative bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 group hover:shadow-xl hover:-translate-y-1">
    <!-- صورة أو انفوجرافيك -->
    <div class="relative h-48 md:h-56 bg-gray-200 overflow-hidden">
        @if(isset($isInfographic) && $isInfographic)
            @if($article->image)
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary to-secondary">
                    <span class="text-white text-2xl font-bold">شبوة21</span>
                </div>
            @endif
        @else
            @if($article->image)
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary to-secondary">
                    <span class="text-white text-2xl font-bold">شبوة21</span>
                </div>
            @endif
        @endif
        <!-- أيقونة الكاميرا overlay -->
        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <div class="bg-black bg-opacity-50 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h2l2-3h6l2 3h2a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z" /></svg>
            </div>
        </div>
        <!-- watermark -->
        <div class="absolute bottom-2 left-2 text-xs text-white bg-black bg-opacity-40 px-2 py-1 rounded">
            شبوة21
        </div>
        <!-- التصنيف -->
        @if($article->category)
        <div class="absolute top-2 right-2">
            <span class="bg-primary text-white px-2 py-1 rounded text-xs font-bold shadow inline-flex items-center gap-1">
                <i class="bi bi-folder-fill text-[10px]"></i>
                {{ $article->category->name_ar ?? $article->category->name ?? 'تصنيف' }}
            </span>
        </div>
        @endif
    </div>
    <!-- محتوى البطاقة -->
    <div class="p-4">
        <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug line-clamp-2 group-hover:text-primary transition-colors duration-200">
            <a href="{{ route('news.show', $article->slug) }}" class="hover:text-primary transition-colors duration-200">
                {{ $article->title }}
            </a>
        </h3>
        @if(!isset($isInfographic) || !$isInfographic)
        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ $article->excerpt }}
        </p>
        @endif
        <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
            <span>{{ $article->author->name ?? $article->author ?? '' }}</span>
            <span>{{ $article->published_at ? $article->published_at->format('Y-m-d') : '' }}</span>
        </div>
        <div class="mt-2 text-xs text-gray-400 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
            <span>{{ $article->views_count ?? 0 }}</span>
        </div>
    </div>
</div> 