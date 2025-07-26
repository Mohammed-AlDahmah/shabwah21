<div>
    @if($specials && count($specials) > 0)
    <section class="special-section py-16">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12 section-header">
                <div class="icon-wrapper">
                    <i class="bi bi-star text-3xl text-white"></i>
                </div>
                <h2>تقارير وملفات خاصة</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">مقالات وتحقيقات وتقارير خاصة مميزة</p>
            </div>

            <!-- Special Slider -->
            <div class="special-slider">
                <div class="swiper special-swiper">
                    <div class="swiper-wrapper">
                        @foreach($specials as $special)
                        <div class="swiper-slide special-swiper-slide">
                            <div class="special-card">
                                <div class="special-card-inner">
                                    <!-- Image -->
                                    <div class="special-image-container">
                                        @if($special->featured_image)
                                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($special->featured_image) }}" 
                                                 alt="{{ $special->title }}" 
                                                 loading="lazy">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class="bi bi-star text-6xl text-white opacity-50"></i>
                                            </div>
                                        @endif
                                        <div class="special-overlay"></div>
                                        <div class="special-badge">
                                            <i class="bi bi-star mr-1"></i>
                                            خاص
                                        </div>
                                    </div>
                                    <div class="special-content">
                                        <h3 class="special-title">
                                            <a href="{{ route('news.show', $special->slug) }}">
                                                {{ $special->title }}
                                            </a>
                                        </h3>
                                        <p class="special-excerpt">
                                            {{ Str::limit($special->excerpt ?? strip_tags($special->content), 120) }}
                                        </p>
                                        <div class="special-stats">
                                            <div class="stat-box">
                                                <div class="stat-value">{{ number_format($special->views_count ?? 0) }}</div>
                                                <div class="stat-label">مشاهدة</div>
                                            </div>
                                            <div class="stat-box">
                                                <div class="stat-value">{{ $special->created_at->format('d') }}</div>
                                                <div class="stat-label">{{ $special->created_at->format('M Y') }}</div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('news.show', $special->slug) }}" 
                                               class="special-cta">
                                                <span>اقرأ المزيد</span>
                                                <i class="bi bi-arrow-left"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next special-swiper-button-next"></div>
                    <div class="swiper-button-prev special-swiper-button-prev"></div>
                    <div class="swiper-pagination special-swiper-pagination"></div>
                </div>
                <div class="view-all-specials">
                    <a href="#" class="view-all-btn">
                        <span>عرض جميع التقارير الخاصة</span>
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                const swiperEl = document.querySelector('.special-swiper');
                if (swiperEl && typeof Swiper !== 'undefined') {
                    if (swiperEl.swiper) swiperEl.swiper.destroy(true, true);
                    const slides = swiperEl.querySelectorAll('.swiper-slide');
                    const loopMode = slides.length > 1;
                    const swiperInstance = new Swiper(swiperEl, {
                        loop: loopMode,
                        slidesPerView: 1, // دائماً عنصر واحد فقط
                        spaceBetween: 20,
                        centeredSlides: false,
                        autoplay: {
                            delay: 4000,
                            disableOnInteraction: false
                        },
                        pagination: {
                            el: '.special-swiper-pagination',
                            clickable: true,
                            dynamicBullets: true
                        },
                        navigation: {
                            nextEl: '.special-swiper-button-next',
                            prevEl: '.special-swiper-button-prev'
                        },
                        // أزل breakpoints
                    });
                    swiperEl.addEventListener('mouseleave', () => swiperInstance.autoplay.start());
                }
            });
        </script>
        @endpush
    </section>
    @endif
</div> 