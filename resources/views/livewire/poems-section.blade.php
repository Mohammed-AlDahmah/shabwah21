@php
    $defaultPng = asset('images/poems-default.png');
    $defaultSvg = asset('images/poems-default.svg');
@endphp
<div>
@if($poems && count($poems) > 0)
<div class="section-slider">
    <div class="swiper poems-swiper">
        <div class="swiper-wrapper">
            @foreach($poems as $poem)
            @php
                $bgImage = $poem->image_url ?? (file_exists(public_path('images/poems-default.png')) ? $defaultPng : $defaultSvg);
            @endphp
            <div class="swiper-slide" style="background-image: url('{{ $bgImage }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="section-item p-2">
                    <div class="font-bold text-[#C08B2D] mb-1 text-xs flex items-center gap-1">
                        <i class="bi bi-quote"></i> <a href="{{ route('news.show', $poem->id) }}" class="hover:underline text-white">{{ $poem->title }}</a>
                    </div>
                    <div class="text-xs text-slate-100 mb-1">
                        {{ Str::limit($poem->excerpt, 80) }}
                    </div>
                    <div class="flex items-center gap-2 text-[10px] text-gray-200">
                        <span><i class="bi bi-calendar3"></i> {{ $poem->created_at->format('Y-m-d') }}</span>
                        <span><i class="bi bi-eye"></i> {{ number_format($poem->views_count ?? 0) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination poems-swiper-pagination"></div>
        <div class="swiper-button-next poems-swiper-button-next"></div>
        <div class="swiper-button-prev poems-swiper-button-prev"></div>
    </div>
    <div class="flex justify-center mt-2">
        <a href="{{ route('news.category', 'poems') }}" class="bg-[#C08B2D] text-white px-4 py-1 rounded hover:bg-[#a06e22] text-xs">المزيد</a>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.poems-swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: { delay: 3500, disableOnInteraction: false },
            pagination: {
                el: '.poems-swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.poems-swiper-button-next',
                prevEl: '.poems-swiper-button-prev',
            },
        });
    }
});
</script>
@endif
</div> 