<div>
    @if($featuredNews->count() > 0)
        <section class="mb-12">
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center gap-4">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full"></div>
                    <div>
                        <h2 class="text-3xl font-bold text-slate-800">أبرز الأخبار</h2>
                        <p class="text-slate-600">أهم الأخبار والتقارير المميزة</p>
                    </div>
                </div>
                <a href="/news" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center gap-2 transform hover:scale-105">
                    عرض الكل
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Featured News -->
                @if($featuredNews->first())
                    <div class="lg:col-span-2">
                        <article class="group bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500">
                            <div class="aspect-[16/9] bg-slate-200 overflow-hidden relative">
                                @if($featuredNews->first()->image)
                                    <img src="{{ asset('storage/' . $featuredNews->first()->image) }}" 
                                         alt="{{ $featuredNews->first()->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                        <i class="bi bi-newspaper text-6xl text-white"></i>
                                    </div>
                                @endif
                                
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                
                                <!-- Category Badge -->
                                <div class="absolute top-6 right-6">
                                    <span class="bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        {{ is_object($featuredNews->first()->category) ? $featuredNews->first()->category->name : ($featuredNews->first()->category ?? 'أخبار') }}
                                    </span>
                                </div>
                                
                                <!-- Content -->
                                <div class="absolute bottom-0 left-0 right-0 p-8">
                                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-4 line-clamp-2 group-hover:text-blue-200 transition-colors">
                                        <a href="{{ route('news.show', $featuredNews->first()->slug) }}">
                                            {{ $featuredNews->first()->title }}
                                        </a>
                                    </h3>
                                    
                                    <p class="text-white/90 text-lg mb-4 line-clamp-2">
                                        {{ $featuredNews->first()->excerpt }}
                                    </p>
                                    
                                    <div class="flex items-center justify-between text-white/80">
                                        <div class="flex items-center gap-4">
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-clock text-blue-300"></i>
                                                <span>{{ $featuredNews->first()->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-eye text-blue-300"></i>
                                                <span>{{ $featuredNews->first()->views_count ?? 0 }}</span>
                                            </div>
                                        </div>
                                        
                                        <button class="bg-white/20 hover:bg-white/30 text-white p-3 rounded-full transition-all duration-300 transform hover:scale-110" title="مشاركة الخبر">
                                            <i class="bi bi-share"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endif
                
                <!-- Side Featured News -->
                <div class="space-y-6">
                    @foreach($featuredNews->skip(1)->take(3) as $news)
                        <article class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                            <div class="aspect-video bg-slate-200 overflow-hidden relative">
                                @if($news->image)
                                    <img src="{{ asset('storage/' . $news->image) }}" 
                                         alt="{{ $news->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-slate-300 to-slate-400 flex items-center justify-center">
                                        <i class="bi bi-newspaper text-2xl text-slate-600"></i>
                                    </div>
                                @endif
                                
                                <!-- Category Badge -->
                                <div class="absolute top-3 right-3">
                                    <span class="bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-semibold shadow-lg">
                                        {{ is_object($news->category) ? $news->category->name : ($news->category ?? 'أخبار') }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="p-4">
                                <h4 class="font-bold text-slate-800 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                    <a href="{{ route('news.show', $news->slug) }}">
                                        {{ $news->title }}
                                    </a>
                                </h4>
                                
                                <div class="flex items-center justify-between text-sm text-slate-500">
                                    <div class="flex items-center gap-2">
                                        <i class="bi bi-clock text-blue-500"></i>
                                        <span>{{ $news->created_at->diffForHumans() }}</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1">
                                        <i class="bi bi-eye text-blue-500"></i>
                                        <span>{{ $news->views_count ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
