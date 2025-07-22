<div>
    @if($greetings->count() > 0)
    <section class="greetings-section py-16 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="container mx-auto px-4">
            <!-- Header -->
            

            <!-- Greetings Slider -->
            <div class="greetings-slider relative">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($greetings as $greeting)
                        <div class="swiper-slide">
                            <div class="greeting-card group">
                                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-orange-100">
                                    <!-- Card Header -->
                                    <div class="bg-gradient-to-r from-orange-500 to-amber-500 p-4 text-white">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-envelope-heart text-lg"></i>
                                                <span class="font-medium">رسالة</span>
                                            </div>
                                            <div class="text-sm opacity-90">{{ $greeting->created_at->format('M d') }}</div>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-6">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition-colors line-clamp-2">
                                            <a href="{{ route('news.show', $greeting->slug) }}">{{ $greeting->title }}</a>
                                        </h3>
                                        
                                        <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed text-sm">
                                            {{ Str::limit($greeting->excerpt, 100) }}
                                        </p>

                                        <!-- Meta -->
                                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                            <div class="flex items-center gap-1">
                                                <i class="bi bi-calendar3"></i>
                                                <span>{{ $greeting->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <i class="bi bi-eye"></i>
                                                <span>{{ number_format($greeting->views_count ?? 0) }}</span>
                                            </div>
                                        </div>

                                        <!-- Read More Button -->
                                        <div class="border-t border-orange-100 pt-4">
                                            <a href="{{ route('news.show', $greeting->slug) }}" 
                                               class="inline-flex items-center gap-2 text-orange-600 font-medium hover:text-orange-700 transition-colors text-sm">
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
                <div class="swiper-button-next greeting-swiper-button-next"></div>
                <div class="swiper-button-prev greeting-swiper-button-prev"></div>
                
                <!-- Pagination -->
                <div class="swiper-pagination greeting-swiper-pagination"></div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('news.greetings') }}" 
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-orange-500 to-amber-600 text-white px-8 py-4 rounded-full font-semibold hover:from-orange-600 hover:to-amber-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>عرض جميع الرسائل</span>
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>

         

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                const greetingsSwiper = new Swiper('.greetings-slider .swiper-container', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 4500,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                        waitForTransition: true,
                    },
                    effect: 'slide',
                    speed: 800,
                    pagination: {
                        el: '.greeting-swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.greeting-swiper-button-next',
                        prevEl: '.greeting-swiper-button-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        },
                        1024: {
                            slidesPerView: 1,
                            spaceBetween: 30,
                        },
                        1280: {
                            slidesPerView: 1,
                            spaceBetween: 40,
                        },
                    },
                    on: {
                        init: function() {
                            console.log('Greetings Swiper initialized');
                        },
                        slideChange: function() {
                            // Add animation to current slide
                            const activeSlide = this.slides[this.activeIndex];
                            if (activeSlide) {
                                activeSlide.style.animation = 'fadeInUp 0.6s ease-out';
                            }
                        }
                    }
                });

                // Pause autoplay on hover
                const swiperContainer = document.querySelector('.greetings-slider .swiper-container');
                if (swiperContainer) {
                    swiperContainer.addEventListener('mouseenter', function() {
                        greetingsSwiper.autoplay.stop();
                    });
                    
                    swiperContainer.addEventListener('mouseleave', function() {
                        greetingsSwiper.autoplay.start();
                    });
                }
            }
        });
        </script>
    </section>
    @endif
</div> 