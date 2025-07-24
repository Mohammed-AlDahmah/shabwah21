@php $defaultImage = asset('images/condolences-default.svg'); @endphp
<div>
@if($condolences && count($condolences) > 0)
<div class="section-slider">
    <div class="swiper condolences-swiper">
        <div class="swiper-wrapper">
            @foreach($condolences as $condolence)
            <div class="swiper-slide" style="background-image: url('{{ $condolence->image_url ?? $defaultImage }}');">
                <div class="section-item p-2">
                    <div class="font-bold text-[#C08B2D] mb-1 text-xs flex items-center gap-1">
                        <i class="bi bi-heart"></i> <a href="{{ route('news.show', $condolence->id) }}" class="hover:underline text-white">{{ $condolence->title }}</a>
                    </div>
                    <div class="text-xs text-slate-100 mb-1">
                        {{ Str::limit($condolence->excerpt, 80) }}
                    </div>
                    <div class="flex items-center gap-2 text-[10px] text-gray-200">
                        <span><i class="bi bi-calendar3"></i> {{ $condolence->created_at->format('Y-m-d') }}</span>
                        <span><i class="bi bi-eye"></i> {{ number_format($condolence->views_count ?? 0) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination condolences-swiper-pagination"></div>
        <div class="swiper-button-next condolences-swiper-button-next"></div>
        <div class="swiper-button-prev condolences-swiper-button-prev"></div>
    </div>
    <div class="flex justify-center mt-2">
        <a href="{{ route('news.category', 'condolences') }}" class="bg-[#C08B2D] text-white px-4 py-1 rounded hover:bg-[#a06e22] text-xs">المزيد</a>
    </div>
</div>
@push('scripts')
<script>
document.addEventListener('livewire:load', function () {
    const swiperEl = document.querySelector('.condolences-swiper');
    if (swiperEl && typeof Swiper !== 'undefined') {
        if (swiperEl.swiper) swiperEl.swiper.destroy(true, true);
        const slides = swiperEl.querySelectorAll('.swiper-slide');
        const loopMode = slides.length > 1;
        const swiperInstance = new Swiper(swiperEl, {
            loop: loopMode,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            autoplay: { delay: 4000, disableOnInteraction: false },
            pagination: { el: '.condolences-swiper-pagination', clickable: true },
            navigation: { nextEl: '.condolences-swiper-button-next', prevEl: '.condolences-swiper-button-prev' },
        });
        swiperEl.addEventListener('mouseleave', () => swiperInstance.autoplay.start());
    }
});
</script>
@endpush
@endif
</div> 