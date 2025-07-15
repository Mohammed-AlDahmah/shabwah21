@forelse($opinionArticles as $article)
    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="aspect-video bg-gray-200 overflow-hidden">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" 
                     alt="{{ $article->title }}" 
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            @else
                <div class="w-full h-full bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center">
                    <i class="bi bi-chat-quote text-4xl text-white"></i>
                </div>
            @endif
            
            <!-- Opinion Badge -->
            <div class="absolute top-4 right-4">
                <span class="bg-purple-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                    رأي
                </span>
            </div>
        </div>
        
        <div class="p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2 hover:text-purple-600 transition-colors">
                <a href="{{ route('news.show', $article->slug) }}">
                    {{ $article->title }}
                </a>
            </h3>
            
            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                {{ $article->excerpt }}
            </p>
            
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <i class="bi bi-person-circle"></i>
                    <span>{{ $article->author ?? 'الكاتب' }}</span>
                </div>
                
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <i class="bi bi-clock"></i>
                    <span>{{ $article->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </article>
@empty
    <div class="col-span-full text-center py-12">
        <i class="bi bi-chat-quote text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-bold text-gray-600 mb-2">لا توجد آراء وتحليلات</h3>
        <p class="text-gray-500">سيتم عرض الآراء والتحليلات هنا عند إضافتها</p>
    </div>
@endforelse