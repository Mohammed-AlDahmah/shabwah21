<div>
    @forelse($opinionArticles as $article)
        <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
            <div class="aspect-video bg-slate-200 overflow-hidden relative">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                        <i class="bi bi-chat-quote text-4xl text-white"></i>
                    </div>
                @endif
                
                <!-- Category Badge -->
                <div class="absolute top-4 right-4">
                    <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                        {{ is_object($article->category) ? $article->category->name : ($article->category ?? 'رأي') }}
                    </span>
                </div>
                
                <!-- Author Badge -->
                @if($article->author)
                    <div class="absolute bottom-4 left-4">
                        <div class="bg-white/90 backdrop-blur-sm text-slate-700 px-3 py-2 rounded-full text-xs font-semibold shadow-lg">
                            <i class="bi bi-person text-indigo-600 ml-1"></i>
                            {{ is_object($article->author) ? $article->author->name : ($article->author ?? 'كاتب') }}
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="p-6">
                <h3 class="font-bold text-slate-800 text-lg mb-3 line-clamp-2 group-hover:text-indigo-600 transition-colors">
                    <a href="{{ route('news.show', $article->slug) }}" class="hover:text-indigo-600 transition-colors">
                        {{ $article->title }}
                    </a>
                </h3>
                
                <p class="text-slate-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                    {{ $article->excerpt }}
                </p>
                
                <div class="flex items-center justify-between text-sm text-slate-500">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-clock text-blue-500"></i>
                            <span>{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <i class="bi bi-eye text-green-500"></i>
                            <span>{{ $article->views_count ?? 0 }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <i class="bi bi-chat text-purple-500"></i>
                            <span>{{ $article->comments_count ?? 0 }}</span>
                        </div>
                    </div>
                    
                    <button class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 p-2 rounded-lg transition-all duration-300 transform hover:scale-110" title="مشاركة المقال">
                        <i class="bi bi-share text-sm"></i>
                    </button>
                </div>
            </div>
        </article>
    @empty
        <div class="col-span-full text-center py-16">
            <div class="bg-slate-50 rounded-2xl p-12">
                <i class="bi bi-chat-quote text-6xl text-slate-300 mb-6 block"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد مقالات رأي</h3>
                <p class="text-slate-500">سيتم عرض مقالات الرأي والتحليلات هنا عند إضافتها</p>
            </div>
        </div>
    @endforelse
</div>