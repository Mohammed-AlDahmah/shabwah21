@forelse($sportsNews as $news)
    <div class="flex gap-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
        <div class="flex-shrink-0 w-24 h-24 bg-gray-200 rounded-lg overflow-hidden">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" 
                     alt="{{ $news->title }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                    <i class="bi bi-trophy text-white text-2xl"></i>
                </div>
            @endif
        </div>
        
        <div class="flex-1 min-w-0">
            <h4 class="font-semibold text-gray-800 text-sm leading-tight mb-2 line-clamp-2">
                <a href="{{ route('news.show', $news->slug) }}" class="hover:text-blue-600 transition-colors">
                    {{ $news->title }}
                </a>
            </h4>
            
            <p class="text-gray-600 text-xs mb-2 line-clamp-2">
                {{ $news->excerpt }}
            </p>
            
            <div class="flex items-center gap-3 text-xs text-gray-500">
                <div class="flex items-center gap-1">
                    <i class="bi bi-clock"></i>
                    <span>{{ $news->created_at->diffForHumans() }}</span>
                </div>
                
                <div class="flex items-center gap-1">
                    <i class="bi bi-eye"></i>
                    <span>{{ $news->views_count ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="text-center py-8">
        <i class="bi bi-trophy text-4xl text-gray-300 mb-2"></i>
        <p class="text-gray-500 text-sm">لا توجد أخبار رياضية</p>
    </div>
@endforelse