@forelse($latestNews as $news)
    <article class="news-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="aspect-video bg-gray-200 overflow-hidden">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" 
                     alt="{{ $news->title }}" 
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            @else
                <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                    <i class="bi bi-newspaper text-4xl text-gray-600"></i>
                </div>
            @endif
            
            <!-- Category Badge -->
            <div class="absolute top-4 right-4">
                <span class="bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                    {{ $news->category->name ?? 'أخبار' }}
                </span>
            </div>
        </div>
        
        <div class="p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2 hover:text-blue-600 transition-colors">
                <a href="{{ route('news.show', $news->slug) }}">
                    {{ $news->title }}
                </a>
            </h3>
            
            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                {{ $news->excerpt }}
            </p>
            
            <div class="flex justify-between items-center text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <i class="bi bi-clock"></i>
                    <span>{{ $news->created_at->diffForHumans() }}</span>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-1">
                        <i class="bi bi-eye"></i>
                        <span>{{ $news->views_count ?? 0 }}</span>
                    </div>
                    
                    <div class="flex items-center gap-1">
                        <i class="bi bi-heart"></i>
                        <span>{{ $news->likes_count ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </article>
@empty
    <div class="col-span-full text-center py-12">
        <i class="bi bi-newspaper text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-bold text-gray-600 mb-2">لا توجد أخبار</h3>
        <p class="text-gray-500">سيتم عرض الأخبار هنا عند إضافتها</p>
    </div>
@endforelse