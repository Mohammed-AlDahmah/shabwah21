<div>
    @forelse($sportsNews as $news)
        <div class="flex gap-6 p-6 border border-slate-200 rounded-2xl hover:shadow-lg transition-all duration-300 group">
            <div class="flex-shrink-0 w-32 h-24 bg-slate-200 rounded-xl overflow-hidden">
                @if($news->image)
                    @if(filter_var($news->image, FILTER_VALIDATE_URL))
                        <img src="{{ $news->image }}" 
                             alt="{{ $news->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <img src="{{ asset('storage/' . $news->image) }}" 
                             alt="{{ $news->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @endif
                @else
                    <div class="w-full h-full bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                        <i class="bi bi-trophy text-3xl text-white"></i>
                    </div>
                @endif
            </div>
            
            <div class="flex-1 min-w-0">
                <h4 class="font-bold text-slate-800 text-lg mb-3 line-clamp-2 group-hover:text-purple-600 transition-colors">
                    <a href="{{ route('news.show', $news->slug) }}" class="hover:text-purple-600 transition-colors">
                        {{ $news->title }}
                    </a>
                </h4>
                
                <p class="text-slate-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                    {{ $news->excerpt }}
                </p>
                
                <div class="flex items-center justify-between text-sm text-slate-500">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-clock text-blue-500"></i>
                            <span>{{ $news->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <i class="bi bi-eye text-green-500"></i>
                            <span>{{ $news->views_count ?? 0 }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <i class="bi bi-star text-yellow-500"></i>
                            <span>{{ $news->likes_count ?? 0 }}</span>
                        </div>
                    </div>
                    
                    @if($news->category)
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-semibold">
                            {{ is_object($news->category) ? $news->category->name : ($news->category ?? 'رياضة') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-16">
            <div class="bg-slate-50 rounded-2xl p-12">
                <i class="bi bi-trophy text-6xl text-slate-300 mb-6 block"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد أخبار رياضية</h3>
                <p class="text-slate-500">سيتم عرض الأخبار الرياضية هنا عند إضافتها</p>
            </div>
        </div>
    @endforelse
</div>