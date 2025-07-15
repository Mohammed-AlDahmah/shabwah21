<div>
    @forelse($categories as $category)
        <div class="category-card bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border border-slate-200 group cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-{{ $category->icon ?? 'folder' }} text-2xl text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">
                            {{ $category->name_ar ?? $category->name }}
                        </h3>
                        <p class="text-slate-500 text-sm">{{ $category->news_count ?? 0 }} خبر</p>
                    </div>
                </div>
                
                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="bi bi-arrow-left text-blue-600 text-xl"></i>
                </div>
            </div>
            
            @if($category->description)
                <p class="text-slate-600 text-sm leading-relaxed mb-4 line-clamp-2">
                    {{ $category->description }}
                </p>
            @endif
            
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 text-slate-500 text-sm">
                    <i class="bi bi-clock text-blue-500"></i>
                    <span>آخر تحديث: {{ $category->updated_at->diffForHumans() }}</span>
                </div>
                
                <a href="{{ route('news.category', $category->slug) }}" 
                   class="bg-blue-50 hover:bg-blue-100 text-blue-600 px-4 py-2 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                    تصفح القسم
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-16">
            <div class="bg-slate-50 rounded-2xl p-12">
                <i class="bi bi-folder text-6xl text-slate-300 mb-6 block"></i>
                <h3 class="text-2xl font-bold text-slate-600 mb-3">لا توجد أقسام</h3>
                <p class="text-slate-500">سيتم عرض الأقسام هنا عند إضافتها</p>
            </div>
        </div>
    @endforelse
</div>