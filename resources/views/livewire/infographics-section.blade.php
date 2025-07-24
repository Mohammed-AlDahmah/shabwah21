<div>
    @if($infographics->count() > 0)
    <section class="infographics-section py-16">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12 section-header">
                <div class="icon-wrapper">
                    <i class="bi bi-bar-chart text-3xl text-white"></i>
                </div>
                <h2>انفوجرافيك</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">رسوم بيانية ومعلومات مرئية تفاعلية تلخص الأخبار والإحصائيات</p>
            </div>

            <!-- Infographics Slider -->
            <div class="infographics-slider">
                <div class="swiper infographics-swiper">
                    <div class="swiper-wrapper">
                        @foreach($infographics as $infographic)
                        <div class="swiper-slide">
                            <div class="infographic-card">
                                <div class="infographic-card-inner">
                                    <!-- Image -->
                                    <div class="infographic-image-container">
                                        @if($infographic->image)
                                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($infographic->image) }}" 
                                                 alt="{{ $infographic->title }}" 
                                                 loading="lazy">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class="bi bi-bar-chart text-6xl text-white opacity-50"></i>
                                            </div>
                                        @endif
                                        
                                        <!-- Overlay -->
                                        <div class="infographic-overlay"></div>
                                        
                                        <!-- Badge -->
                                        <div class="infographic-badge">
                                            <i class="bi bi-graph-up-arrow mr-1"></i>
                                            انفوجرافيك
                                        </div>
                                        
                                        <!-- Icon Badge -->
                                        <div class="infographic-icon-badge">
                                            <i class="bi bi-bar-chart-line"></i>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="infographic-content">
                                        <h3 class="infographic-title">
                                            <a href="{{ route('news.show', $infographic->slug) }}">
                                                {{ $infographic->title }}
                                            </a>
                                        </h3>
                                        
                                        <p class="infographic-excerpt">
                                            {{ Str::limit($infographic->excerpt ?? strip_tags($infographic->content), 120) }}
                                        </p>

                                        <!-- Stats -->
                                        <div class="infographic-stats">
                                            <div class="stat-box">
                                                <div class="stat-value">{{ number_format($infographic->views_count ?? 0) }}</div>
                                                <div class="stat-label">مشاهدة</div>
                                            </div>
                                            <div class="stat-box">
                                                <div class="stat-value">{{ $infographic->created_at->format('d') }}</div>
                                                <div class="stat-label">{{ $infographic->created_at->format('M Y') }}</div>
                                            </div>
                                        </div>

                                        <!-- CTA Button -->
                                        <div class="text-center">
                                            <a href="{{ route('news.show', $infographic->slug) }}" 
                                               class="infographic-cta">
                                                <span>عرض الانفوجرافيك</span>
                                                <i class="bi bi-arrow-left"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Navigation -->
                    <div class="swiper-button-next infographic-swiper-button-next"></div>
                    <div class="swiper-button-prev infographic-swiper-button-prev"></div>
                    
                    <!-- Pagination -->
                    <div class="swiper-pagination infographic-swiper-pagination"></div>
                </div>
                
                <!-- View All Button -->
                <div class="view-all-infographics">
                    <a href="{{ route('news.infographics') }}" class="view-all-btn">
                        <span>عرض جميع الانفوجرافيك</span>
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Styles -->
        <style>
            /* Swiper Specific Styles */
            .infographics-swiper {
                padding: 20px 0 50px;
                overflow: visible;
            }
            
            .swiper-slide {
                height: auto;
            }
            
            /* Ensure equal height cards */
            .infographic-card {
                height: 100%;
            }
            
            .infographic-card-inner {
                min-height: 500px;
            }
            
            /* Navigation positioning */
            .infographic-swiper-button-prev {
                left: -25px;
            }
            
            .infographic-swiper-button-next {
                right: -25px;
            }
            
            @media (max-width: 768px) {
                .infographic-swiper-button-prev {
                    left: 10px;
                }
                
                .infographic-swiper-button-next {
                    right: 10px;
                }
                
                .infographic-card-inner {
                    min-height: 450px;
                }
            }
        </style>

        @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                const swiperEl = document.querySelector('.infographics-swiper');
                if (swiperEl && typeof Swiper !== 'undefined') {
                    const slides = swiperEl.querySelectorAll('.swiper-slide');
                    const loopMode = slides.length > 3;

                    const swiperInstance = new Swiper(swiperEl, {
                        loop: loopMode,
                        slidesPerView: 1,
                        spaceBetween: 20,
                        centeredSlides: false,
                        autoplay: { 
                            delay: 5000, 
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true
                        },
                        pagination: { 
                            el: '.infographic-swiper-pagination', 
                            clickable: true,
                            dynamicBullets: true
                        },
                        navigation: { 
                            nextEl: '.infographic-swiper-button-next', 
                            prevEl: '.infographic-swiper-button-prev' 
                        },
                        breakpoints: {
                            640: { 
                                slidesPerView: 2, 
                                spaceBetween: 20 
                            },
                            1024: { 
                                slidesPerView: 3, 
                                spaceBetween: 30 
                            }
                        },
                        on: {
                            init: function() {
                                // Ensure all cards have equal height
                                const cards = document.querySelectorAll('.infographic-card-inner');
                                let maxHeight = 0;
                                
                                cards.forEach(card => {
                                    card.style.height = 'auto';
                                    maxHeight = Math.max(maxHeight, card.offsetHeight);
                                });
                                
                                cards.forEach(card => {
                                    card.style.minHeight = maxHeight + 'px';
                                });
                            }
                        }
                    });

                    // Pause on hover
                    swiperEl.addEventListener('mouseenter', () => swiperInstance.autoplay.stop());
                    swiperEl.addEventListener('mouseleave', () => swiperInstance.autoplay.start());
                }
            });
        </script>
        @endpush
    </section>
    @endif
</div> 