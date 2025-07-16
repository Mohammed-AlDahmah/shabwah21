@if($categories->count() > 0)
<div class="bg-gradient-to-br from-gray-50 to-white py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">الأقسام الرئيسية</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $category)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-red-600 to-red-700 text-white p-6">
                    <h3 class="text-xl font-bold flex items-center">
                        <i class="bi bi-folder me-3 text-2xl"></i>
                        {{ $category->name_ar }}
                    </h3>
                    <p class="text-red-100 text-sm mt-2">{{ $category->articles_count }} مقال</p>
                </div>
                <div class="p-6 space-y-4">
                    @foreach($category->articles()->published()->latest('published_at')->take(3)->get() as $article)
                    <article class="border-b border-gray-100 pb-3 last:border-b-0">
                        <h4 class="font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer mb-1">
                            <a href="{{ route('news.show', $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h4>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>{{ $article->time_ago }}</span>
                            <span class="flex items-center">
                                <i class="bi bi-eye me-1"></i>
                                {{ number_format($article->views_count) }}
                            </span>
                        </div>
                    </article>
                    @endforeach
                    <div class="pt-2">
                        <a href="{{ route('news.category', $category->slug) }}" 
                           class="text-red-600 hover:text-red-700 font-semibold text-sm flex items-center">
                            عرض المزيد
                            <i class="bi bi-arrow-left me-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif 