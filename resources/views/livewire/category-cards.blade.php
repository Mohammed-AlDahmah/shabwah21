<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-200 pb-2">
        <i class="bi bi-grid me-2"></i>الأقسام
    </h3>
    <div class="space-y-2">
        @foreach($categories->take(5) as $category)
        <a href="{{ route('news.category', $category->slug) }}" 
           class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors">
            <span class="font-medium text-gray-700">{{ $category->name_ar ?? $category->name }}</span>
            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">
                {{ $category->articles_count ?? 0 }}
            </span>
        </a>
        @endforeach
    </div>
</div>