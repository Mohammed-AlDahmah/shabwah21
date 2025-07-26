<div class="category-section">
    @if($categories->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <div class="section-card bg-white rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300">
                    <!-- Category Header -->
                    <div class="bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white p-4">
                        <h3 class="text-lg font-bold flex items-center">
                            <i class="bi bi-folder ml-2 text-xl"></i>
                            {{ $category->name_ar }}
                        </h3>
                        <p class="text-white/80 text-sm mt-1">{{ $category->articles_count ?? 0 }} مقال</p>
                    </div>
                    
                    <!-- Category Content -->
                    <div class="p-4 space-y-3">
                        @foreach($category->articles()->published()->latest('published_at')->take(3)->get() as $article)
                            <article class="border-b border-gray-100 pb-3 last:border-b-0">
                                <h4 class="font-semibold text-slate-800 hover:text-[#C08B2D] transition-colors cursor-pointer mb-1 line-clamp-2 text-sm">
                                    <a href="{{ route('news.show', $article->slug) }}" class="hover:underline">
                                        {{ $article->title }}
                                    </a>
                                </h4>
                                <div class="flex items-center justify-between text-xs text-slate-500">
                                    <span>{{ $article->time_ago }}</span>
                                    <span class="flex items-center">
                                        <i class="bi bi-eye ml-1"></i>
                                        {{ number_format($article->views_count ?? 0) }}
                                    </span>
                                </div>
                            </article>
                        @endforeach
                        
                        <!-- View More Link -->
                        <div class="pt-2">
                            <a href="{{ route('news.category', $category->slug) }}" 
                               class="text-[#C08B2D] hover:text-[#B22B2B] font-semibold text-sm flex items-center transition-colors">
                                عرض المزيد
                                <i class="bi bi-arrow-left ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Placeholder when no categories -->
        <div class="text-center py-16">
            <div class="sidebar-widget bg-slate-50 rounded-2xl p-12">
                <i class="bi bi-folder text-6xl text-slate-300 mb-6 block"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد أقسام</h3>
                <p class="text-slate-500">سيتم عرض الأقسام الإخبارية هنا عند إضافتها</p>
            </div>
        </div>
    @endif
</div> 