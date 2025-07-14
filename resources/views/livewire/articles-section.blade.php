<div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-red-600 text-white p-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">مقالات وتحليلات</h2>
                <a href="{{ route('news.index') }}" class="text-white hover:text-yellow-200 text-sm transition-colors">
                    عرض الكل →
                </a>
            </div>
        </div>
        
        <div class="p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-3">
                    @foreach($articles->take(4) as $article)
                        <article class="group flex space-x-3 space-x-reverse border-b border-gray-100 pb-3 last:border-b-0 hover:bg-gray-50 p-2 rounded transition-colors duration-300">
                            <div class="flex-shrink-0">
                                <img src="{{ $article->featured_image ?: '/images/placeholder.jpg' }}" 
                                     alt="{{ $article->title }}" 
                                     class="w-16 h-16 object-cover rounded">
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-sm mb-1 line-clamp-2">
                                    <a href="{{ route('news.show', $article->slug) }}" 
                                       class="text-gray-800 hover:text-red-600 transition-colors">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span class="bg-red-600 text-white px-2 py-1 rounded">{{ $article->category->name }}</span>
                                    <span>{{ $article->time_ago }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-bold mb-2 text-red-600">تابع شبوة21</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        احصل على آخر الأخبار والتحديثات مباشرة على هاتفك
                    </p>
                    
                    <div class="space-y-3">
                        <a href="#" class="flex items-center space-x-3 space-x-reverse bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                            <span>تابعنا على تويتر</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 space-x-reverse bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                            <span>تابعنا على فيسبوك</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    </style>
</div>
