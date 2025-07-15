@if($featuredNews)
    <div class="relative h-full">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
        
        @if($featuredNews->image)
            <img src="{{ asset('storage/' . $featuredNews->image) }}" 
                 alt="{{ $featuredNews->title }}" 
                 class="w-full h-full object-cover rounded-lg">
        @else
            <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                <i class="bi bi-newspaper text-6xl text-white/30"></i>
            </div>
        @endif
        
        <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-20">
            <div class="mb-2">
                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $featuredNews->category->name ?? 'أخبار' }}
                </span>
            </div>
            
            <h3 class="text-xl font-bold mb-2 line-clamp-2">
                <a href="{{ route('news.show', $featuredNews->slug) }}" class="hover:text-blue-300 transition-colors">
                    {{ $featuredNews->title }}
                </a>
            </h3>
            
            <p class="text-gray-300 text-sm mb-3 line-clamp-2">
                {{ $featuredNews->excerpt }}
            </p>
            
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center gap-2">
                    <i class="bi bi-clock"></i>
                    <span>{{ $featuredNews->created_at->diffForHumans() }}</span>
                </div>
                
                <div class="flex items-center gap-2">
                    <i class="bi bi-eye"></i>
                    <span>{{ $featuredNews->views_count ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
        <div class="text-center text-white">
            <i class="bi bi-newspaper text-6xl mb-4 opacity-50"></i>
            <h3 class="text-xl font-bold mb-2">لا توجد أخبار مميزة</h3>
            <p class="text-blue-100">سيتم عرض الأخبار المميزة هنا</p>
        </div>
    </div>
@endif