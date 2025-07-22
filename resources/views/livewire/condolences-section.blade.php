<div>
    @if($condolences->count() > 0)
    <section class="condolences-section py-16 bg-gradient-to-br from-gray-50 to-slate-100">
        <div class="container mx-auto px-4">
            <!-- Header -->
             
            <!-- Condolences Slider -->
            <div class="condolences-slider relative">
                <div class="swiper condolences-swiper">
                    <div class="swiper-wrapper">
                        @foreach($condolences as $condolence)
                        <div class="swiper-slide">
                            <div class="condolence-card group">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-gray-200">
                                    <!-- Card Header -->
                                    <div class="bg-gradient-to-r from-gray-600 to-slate-700 p-4 text-white">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-heart text-lg"></i>
                                                <span class="font-medium">رسالة تعزية</span>
                                            </div>
                                            <div class="text-sm opacity-90">{{ $condolence->created_at->format('M d') }}</div>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-6">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-600 transition-colors line-clamp-2">
                                            <a href="{{ route('news.show', $condolence->slug) }}">{{ $condolence->title }}</a>
                                        </h3>
                                        
                                        <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed text-sm">
                                            {{ Str::limit($condolence->excerpt, 100) }}
                                        </p>

                                        <!-- Meta -->
                                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                            <div class="flex items-center gap-1">
                                                <i class="bi bi-calendar3"></i>
                                                <span>{{ $condolence->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <i class="bi bi-eye"></i>
                                                <span>{{ number_format($condolence->views_count ?? 0) }}</span>
                                            </div>
                                        </div>

                                        <!-- Read More Button -->
                                        <div class="border-t border-gray-200 pt-4">
                                            <a href="{{ route('news.show', $condolence->slug) }}" 
                                               class="inline-flex items-center gap-2 text-gray-600 font-medium hover:text-gray-800 transition-colors text-sm">
                                                <span>اقرأ الرسالة</span>
                                                <i class="bi bi-arrow-left text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Navigation Arrows -->
                <div class="swiper-button-next condolence-swiper-button-next"></div>
                <div class="swiper-button-prev condolence-swiper-button-prev"></div>
                
                <!-- Pagination -->
                <div class="swiper-pagination condolence-swiper-pagination"></div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('news.greetings') }}" 
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-gray-600 to-slate-700 text-white px-8 py-4 rounded-full font-semibold hover:from-gray-700 hover:to-slate-800 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>عرض جميع الرسائل</span>
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>

        

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                const condolencesSwiper = new Swiper('.condolences-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                        waitForTransition: true,
                    },
                    effect: 'slide',
                    speed: 800,
                    pagination: {
                        el: '.condolence-swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.condolence-swiper-button-next',
                        prevEl: '.condolence-swiper-button-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                        1280: {
                            slidesPerView: 3,
                            spaceBetween: 40,
                        },
                    },
                    on: {
                        init: function() {
                            console.log('Condolences Swiper initialized');
                        },
                        slideChange: function() {
                            const activeSlide = this.slides[this.activeIndex];
                            if (activeSlide) {
                                activeSlide.style.animation = 'fadeInUp 0.6s ease-out';
                            }
                        }
                    }
                });

                const swiperContainer = document.querySelector('.condolences-swiper');
                if (swiperContainer) {
                    swiperContainer.addEventListener('mouseenter', function() {
                        condolencesSwiper.autoplay.stop();
                    });
                    
                    swiperContainer.addEventListener('mouseleave', function() {
                        condolencesSwiper.autoplay.start();
                    });
                }
            }
        });
        </script>
    </section>
    @endif
</div> 