<div>
    @if($poems->count() > 0)
    <section class="poems-section py-16 bg-gradient-to-br from-purple-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <!-- Header -->
            
            <!-- Poems Slider -->
            <div class="poems-slider relative">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($poems as $poem)
                        <div class="swiper-slide">
                            <div class="poem-card group">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                                    <!-- Image -->
                                    <div class="relative h-48 overflow-hidden">
                                        @if($poem->image)
                                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($poem->image) }}" 
                                                 alt="{{ $poem->title }}" 
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                 loading="lazy">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center">
                                                <i class="bi bi-quote text-4xl text-white opacity-50"></i>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                        <div class="absolute bottom-4 right-4">
                                            <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                قصيدة
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-purple-600 transition-colors">
                                            <a href="{{ route('news.show', $poem->slug) }}">{{ $poem->title }}</a>
                                        </h3>
                                        
                                        <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                            {{ Str::limit($poem->excerpt, 120) }}
                                        </p>

                                        <!-- Meta -->
                                        <div class="flex items-center justify-between text-sm text-gray-500">
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-calendar3"></i>
                                                <span>{{ $poem->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-eye"></i>
                                                <span>{{ number_format($poem->views_count ?? 0) }}</span>
                                            </div>
                                        </div>

                                        <!-- Read More Button -->
                                        <div class="mt-4">
                                            <a href="{{ route('news.show', $poem->slug) }}" 
                                               class="inline-flex items-center gap-2 text-purple-600 font-medium hover:text-purple-700 transition-colors">
                                                <span>اقرأ القصيدة</span>
                                                <i class="bi bi-arrow-left text-sm"></i>
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
                <div class="swiper-button-next poem-swiper-button-next"></div>
                <div class="swiper-button-prev poem-swiper-button-prev"></div>
                
                <!-- Pagination -->
                <div class="swiper-pagination poem-swiper-pagination"></div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('news.poems') }}" 
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-8 py-4 rounded-full font-semibold hover:from-purple-600 hover:to-indigo-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>عرض جميع القصائد</span>
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>

        

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                const poemsSwiper = new Swiper('.poems-slider .swiper-container', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                        waitForTransition: true,
                    },
                    effect: 'slide',
                    speed: 800,
                    pagination: {
                        el: '.poem-swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.poem-swiper-button-next',
                        prevEl: '.poem-swiper-button-prev',
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
                            console.log('Poems Swiper initialized');
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
                const swiperContainer = document.querySelector('.poems-slider .swiper-container');
                if (swiperContainer) {
                    swiperContainer.addEventListener('mouseenter', function() {
                        poemsSwiper.autoplay.stop();
                    });
                    
                    swiperContainer.addEventListener('mouseleave', function() {
                        poemsSwiper.autoplay.start();
                    });
                }
            }
        });
        </script>
    </section>
    @endif
</div> 