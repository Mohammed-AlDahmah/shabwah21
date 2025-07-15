<div>
    @forelse($latestNews as $news)
        <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
            <div class="aspect-video bg-slate-200 overflow-hidden relative">
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" 
                         alt="{{ $news->title }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-slate-300 to-slate-400 flex items-center justify-center">
                        <i class="bi bi-newspaper text-4xl text-slate-600"></i>
                    </div>
                @endif
                
                <!-- Category Badge -->
                <div class="absolute top-4 right-4">
                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                        {{ is_object($news->category) ? $news->category->name : ($news->category ?? 'أخبار') }}
                    </span>
                </div>
                
                <!-- Share Button -->
                <div class="absolute top-4 left-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="bg-white/90 hover:bg-white text-slate-700 p-2 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110" title="مشاركة الخبر">
                        <i class="bi bi-share text-sm"></i>
                    </button>
                </div>
            </div>
            
            <div class="p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                    <a href="{{ route('news.show', $news->slug) }}" class="hover:text-blue-600 transition-colors">
                        {{ $news->title }}
                    </a>
                </h3>
                
                <p class="text-slate-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                    {{ $news->excerpt }}
                </p>
                
                <div class="flex justify-between items-center text-sm text-slate-500">
                    <div class="flex items-center gap-2">
                        <i class="bi bi-clock text-blue-500"></i>
                        <span>{{ $news->created_at->diffForHumans() }}</span>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-1">
                            <i class="bi bi-eye text-blue-500"></i>
                            <span>{{ $news->views_count ?? 0 }}</span>
                        </div>
                        
                        <div class="flex items-center gap-1">
                            <i class="bi bi-heart text-red-500"></i>
                            <span>{{ $news->likes_count ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @empty
        <div class="col-span-full text-center py-16">
            <div class="bg-slate-50 rounded-2xl p-12">
                <i class="bi bi-newspaper text-6xl text-slate-300 mb-6 block"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد أخبار</h3>
                <p class="text-slate-500">سيتم عرض الأخبار هنا عند إضافتها</p>
            </div>
        </div>
    @endforelse
</div>