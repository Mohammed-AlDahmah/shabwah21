@php $defaultImage = asset('images/greetings-default.svg'); @endphp
<div>
@if($greetings && count($greetings) > 0)
<div class="section-slider">
    <div class="swiper greetings-swiper">
        <div class="swiper-wrapper">
            @foreach($greetings as $greeting)
            <div class="swiper-slide" style="background-image: url('{{ $greeting->image_url ?? $defaultImage }}');">
                <div class="section-item p-2">
                    <div class="font-bold text-[#C08B2D] mb-1 text-xs flex items-center gap-1">
                        <i class="bi bi-emoji-smile"></i> <a href="{{ route('news.show', $greeting->id) }}" class="hover:underline text-white">{{ $greeting->title }}</a>
                    </div>
                    <div class="text-xs text-slate-100 mb-1">
                        {{ Str::limit($greeting->excerpt, 80) }}
                    </div>
                    <div class="flex items-center gap-2 text-[10px] text-gray-200">
                        <span><i class="bi bi-calendar3"></i> {{ $greeting->created_at->format('Y-m-d') }}</span>
                        <span><i class="bi bi-eye"></i> {{ number_format($greeting->views_count ?? 0) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination greetings-swiper-pagination"></div>
        <div class="swiper-button-next greetings-swiper-button-next"></div>
        <div class="swiper-button-prev greetings-swiper-button-prev"></div>
    </div>
    <div class="flex justify-center mt-2">
        <a href="{{ route('news.category', 'greetings') }}" class="bg-[#C08B2D] text-white px-4 py-1 rounded hover:bg-[#a06e22] text-xs">المزيد</a>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.greetings-swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: { delay: 3500, disableOnInteraction: false },
            pagination: {
                el: '.greetings-swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.greetings-swiper-button-next',
                prevEl: '.greetings-swiper-button-prev',
            },
        });
    }
});
</script>
@endif
</div> 