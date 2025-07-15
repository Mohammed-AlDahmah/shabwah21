@forelse($categories as $category)
    <div class="category-card bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-all duration-300 border-r-4 border-blue-600">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="bi bi-{{ $category->icon ?? 'folder' }} text-2xl text-blue-600"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $category->news_count ?? 0 }} خبر</p>
                </div>
            </div>
            <i class="bi bi-arrow-left text-blue-600"></i>
        </div>
        
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ $category->description ?? 'آخر الأخبار في ' . $category->name }}
        </p>
        
        <a href="{{ route('news.category', $category->slug) }}" 
           class="block w-full bg-blue-600 text-white text-center py-2 rounded-md hover:bg-blue-700 transition-colors font-semibold">
            عرض الأخبار
        </a>
    </div>
@empty
    <div class="col-span-full text-center py-12">
        <i class="bi bi-folder text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-bold text-gray-600 mb-2">لا توجد أقسام</h3>
        <p class="text-gray-500">سيتم عرض الأقسام هنا عند إضافتها</p>
    </div>
@endforelse