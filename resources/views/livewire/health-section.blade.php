@php $defaultImage = asset('images/health-default.png'); @endphp
<div>
@if($healthArticles && count($healthArticles) > 0)
<div class="section-slider">
    <div class="swiper health-swiper">
        <div class="swiper-wrapper">
            @foreach($healthArticles as $article)
            <div class="swiper-slide" style="background-image: url('{{ $article->image_url ?? $defaultImage }}');">
                <div class="section-item p-2">
                    <div class="font-bold text-[#C08B2D] mb-1 text-xs flex items-center gap-1">
                        <i class="bi bi-heart-pulse"></i> <a href="{{ route('news.show', $article->id) }}" class="hover:underline text-white">{{ $article->title }}</a>
                    </div>
                    <div class="text-xs text-slate-100 mb-1">
                        {{ Str::limit($article->excerpt, 80) }}
                    </div>
                    <div class="flex items-center gap-2 text-[10px] text-gray-200">
                        <span><i class="bi bi-calendar3"></i> {{ $article->created_at->format('Y-m-d') }}</span>
                        <span><i class="bi bi-eye"></i> {{ number_format($article->views_count ?? 0) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination health-swiper-pagination"></div>
        <div class="swiper-button-next health-swiper-button-next"></div>
        <div class="swiper-button-prev health-swiper-button-prev"></div>
    </div>
    <div class="flex justify-center mt-2">
        <a href="{{ route('news.category', 'health') }}" class="bg-[#C08B2D] text-white px-4 py-1 rounded hover:bg-[#a06e22] text-xs">المزيد</a>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.health-swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: { delay: 3500, disableOnInteraction: false },
            pagination: {
                el: '.health-swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.health-swiper-button-next',
                prevEl: '.health-swiper-button-prev',
            },
        });
    }
});
</script>
@endif
</div> 