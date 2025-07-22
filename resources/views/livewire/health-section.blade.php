<div>
    @if($healthArticles->count() > 0)
    <section class="health-section py-16 bg-gradient-to-br from-green-50 to-emerald-50">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full mb-6">
                    <i class="bi bi-heart-pulse text-2xl text-white"></i>
                </div>
                            </div>

            <!-- Health Articles Slider -->
            <div class="health-slider relative">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($healthArticles as $article)
                        <div class="swiper-slide">
                            <div class="health-card group">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                                    <div class="flex flex-col lg:flex-row">
                                        <!-- Image -->
                                        <div class="relative lg:w-1/3 h-64 lg:h-auto">
                                            @if($article->image)
                                                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($article->image) }}" 
                                                     alt="{{ $article->title }}" 
                                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                     loading="lazy">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center">
                                                    <i class="bi bi-heart-pulse text-4xl text-white opacity-50"></i>
                                                </div>
                                            @endif
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                            <div class="absolute top-4 right-4">
                                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                    صحة
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div class="flex-1 p-6 flex flex-col justify-center">
                                            <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-green-600 transition-colors">
                                                <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                                            </h3>
                                            
                                            <p class="text-gray-600 mb-4 leading-relaxed">
                                                {{ Str::limit($article->excerpt, 150) }}
                                            </p>

                                            <!-- Meta -->
                                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                                <div class="flex items-center gap-2">
                                                    <i class="bi bi-calendar3"></i>
                                                    <span>{{ $article->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <i class="bi bi-eye"></i>
                                                    <span>{{ number_format($article->views_count ?? 0) }}</span>
                                                </div>
                                            </div>

                                            <!-- Read More Button -->
                                            <div>
                                                <a href="{{ route('news.show', $article->slug) }}" 
                                                   class="inline-flex items-center gap-2 text-green-600 font-medium hover:text-green-700 transition-colors">
                                                    <span>اقرأ المزيد</span>
                                                    <i class="bi bi-arrow-left text-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Navigation Arrows -->
                <div class="swiper-button-next health-swiper-button-next"></div>
                <div class="swiper-button-prev health-swiper-button-prev"></div>
                
                <!-- Pagination -->
                <div class="swiper-pagination health-swiper-pagination"></div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('news.health') }}" 
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-4 rounded-full font-semibold hover:from-green-600 hover:to-emerald-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>عرض جميع المقالات الطبية</span>
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>

        <style>
        .health-section {
            position: relative;
        }

        .health-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="health-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23dcfce7" opacity="0.3"/><circle cx="75" cy="75" r="1" fill="%23dcfce7" opacity="0.3"/><circle cx="50" cy="10" r="0.5" fill="%23dcfce7" opacity="0.2"/><circle cx="10" cy="60" r="0.5" fill="%23dcfce7" opacity="0.2"/><circle cx="90" cy="40" r="0.5" fill="%23dcfce7" opacity="0.2"/></pattern></defs><rect width="100" height="100" fill="url(%23health-pattern)"/></svg>');
            opacity: 0.5;
            pointer-events: none;
        }

        /* Swiper Styles */
        .health-slider {
            position: relative;
            padding: 0 50px;
        }

        .swiper-container {
            overflow: hidden;
        }

        .swiper-slide {
            height: auto;
        }

        .health-swiper-button-next,
        .health-swiper-button-prev {
            color: #10B981;
            background: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .health-swiper-button-next:hover,
        .health-swiper-button-prev:hover {
            background: #10B981;
            color: white;
        }

        .health-swiper-pagination {
            position: relative;
            margin-top: 20px;
        }

        .health-swiper-pagination .swiper-pagination-bullet {
            background: #10B981;
            opacity: 0.3;
        }

        .health-swiper-pagination .swiper-pagination-bullet-active {
            opacity: 1;
            background: #10B981;
        }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                const healthSwiper = new Swiper('.health-slider .swiper-container', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                        waitForTransition: true,
                    },
                    effect: 'slide',
                    speed: 800,
                    pagination: {
                        el: '.health-swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.health-swiper-button-next',
                        prevEl: '.health-swiper-button-prev',
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
                            console.log('Health Swiper initialized');
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
                const swiperContainer = document.querySelector('.health-slider .swiper-container');
                if (swiperContainer) {
                    swiperContainer.addEventListener('mouseenter', function() {
                        healthSwiper.autoplay.stop();
                    });
                    
                    swiperContainer.addEventListener('mouseleave', function() {
                        healthSwiper.autoplay.start();
                    });
                }
            }
        });
        </script>
    </section>
    @endif
</div> 