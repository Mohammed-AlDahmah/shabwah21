<div>
    @if($featuredNews->count() > 0)
    <section class="mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- الكارد الرئيسي الكبير -->
            @php $main = $featuredNews->first(); @endphp
            <div class="relative group col-span-1 md:col-span-2 rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ $main->featured_image ?: '/images/placeholder.jpg' }}" alt="{{ $main->title }}" class="w-full h-80 object-cover rounded-2xl">
                <!-- أيقونة كاميرا -->
                <div class="absolute top-3 left-3 bg-white/80 rounded-full p-2 shadow flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 5a2 2 0 012-2h8a2 2 0 012 2v1h1a1 1 0 011 1v9a2 2 0 01-2 2H4a2 2 0 01-2-2V7a1 1 0 011-1h1V5zm2-1a1 1 0 00-1 1v1h10V5a1 1 0 00-1-1H6zm10 3H4v9a1 1 0 001 1h10a1 1 0 001-1V7z"/>
                    </svg>
                </div>
                <!-- نص فوق الصورة -->
                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 via-black/30 to-transparent p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-full mr-2">{{ $main->category->name ?? 'عام' }}</span>
                        <span class="text-xs text-white opacity-80">{{ $main->created_at->format('Y-m-d') }}</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white leading-snug mb-2">
                        <a href="{{ route('news.show', $main->slug) }}">{{ $main->title }}</a>
                    </h2>
                </div>
            </div>
            <!-- الكاردات الجانبية -->
            <div class="flex flex-col gap-4">
                @foreach($featuredNews->slice(1,2) as $side)
                <div class="relative group rounded-2xl overflow-hidden shadow-md flex-1 min-h-[160px]">
                    <img src="{{ $side->featured_image ?: '/images/placeholder.jpg' }}" alt="{{ $side->title }}" class="w-full h-full object-cover rounded-2xl min-h-[160px]">
                    <!-- أيقونة كاميرا -->
                    <div class="absolute top-3 left-3 bg-white/80 rounded-full p-2 shadow flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 5a2 2 0 012-2h8a2 2 0 012 2v1h1a1 1 0 011 1v9a2 2 0 01-2 2H4a2 2 0 01-2-2V7a1 1 0 011-1h1V5zm2-1a1 1 0 00-1 1v1h10V5a1 1 0 00-1-1H6zm10 3H4v9a1 1 0 001 1h10a1 1 0 001-1V7z"/>
                        </svg>
                    </div>
                    <!-- نص فوق الصورة -->
                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 via-black/30 to-transparent p-4">
                        <div class="flex items-center mb-1">
                            <span class="bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-full mr-2">{{ $side->category->name ?? 'عام' }}</span>
                            <span class="text-xs text-white opacity-80">{{ $side->created_at->format('Y-m-d') }}</span>
                        </div>
                        <h3 class="text-base font-bold text-white leading-snug">
                            <a href="{{ route('news.show', $side->slug) }}">{{ $side->title }}</a>
                        </h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
