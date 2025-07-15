<div>
    @if($featuredNews->count() > 0)
    <section class="mb-8">
        @php
            $main = $featuredNews->first();
            $others = $featuredNews->slice(1,4);
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-6">
            <!-- المقال الرئيسي الكبير -->
            <div class="relative group md:col-span-2 rounded-2xl overflow-hidden shadow-lg">
                <a href="{{ route('news.show', $main->slug) }}">
                    <img src="{{ $main->featured_image ?: '/images/placeholder.jpg' }}" alt="{{ $main->title }}" class="w-full h-96 object-cover rounded-2xl transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <div class="flex items-center mb-2 gap-2">
                            <span class="bg-accent text-gray-900 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                <i class="bi bi-folder-fill text-[10px]"></i>
                                {{ $main->category->name ?? 'عام' }}
                            </span>
                            <span class="text-xs opacity-80">{{ $main->created_at->format('Y-m-d') }}</span>
                        </div>
                        <h2 class="text-2xl md:text-4xl font-extrabold leading-snug group-hover:text-accent transition-colors">
                            {{ $main->title }}
                        </h2>
                    </div>
                </a>
            </div>

            <!-- شبكة المقالات الجانبية -->
            <div class="grid grid-cols-2 gap-4">
                @foreach($others as $side)
                    <div class="relative group rounded-xl overflow-hidden shadow-md h-40">
                        <a href="{{ route('news.show', $side->slug) }}">
                            <img src="{{ $side->featured_image ?: '/images/placeholder.jpg' }}" alt="{{ $side->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-3">
                                <h3 class="text-sm font-semibold text-white leading-snug line-clamp-2 group-hover:text-accent transition-colors">
                                    {{ $side->title }}
                                </h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
