<div>
    @if($infographics->count() > 0)
    <section class="infographics-section py-16 bg-gradient-to-br from-cyan-50 to-blue-50">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full mb-6">
                    <i class="bi bi-bar-chart text-2xl text-white"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">انفوجرافيك</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">رسوم بيانية ومعلومات مرئية تفاعلية</p>
            </div>

            <!-- Infographics Slider -->
            <div class="infographics-slider relative">
                <div class="swiper infographics-swiper">
                    <div class="swiper-wrapper">
                        @foreach($infographics as $infographic)
                        <div class="swiper-slide">
                            <div class="infographic-card group">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-cyan-100">
                                    <!-- Image -->
                                    <div class="relative h-64 overflow-hidden">
                                        @if($infographic->image)
                                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($infographic->image) }}" 
                                                 alt="{{ $infographic->title }}" 
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                 loading="lazy">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center">
                                                <i class="bi bi-bar-chart text-6xl text-white opacity-50"></i>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                        <div class="absolute top-4 right-4">
                                            <span class="bg-cyan-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                انفوجرافيك
                                            </span>
                                        </div>
                                        <div class="absolute bottom-4 left-4">
                                            <div class="bg-white/90 backdrop-blur-sm rounded-lg p-2">
                                                <i class="bi bi-graph-up text-cyan-600 text-lg"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-cyan-600 transition-colors line-clamp-2">
                                            <a href="{{ route('news.show', $infographic->slug) }}">{{ $infographic->title }}</a>
                                        </h3>
                                        
                                        <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                            {{ Str::limit($infographic->excerpt, 120) }}
                                        </p>

                                        <!-- Stats -->
                                        <div class="grid grid-cols-2 gap-4 mb-4">
                                            <div class="text-center p-3 bg-cyan-50 rounded-lg">
                                                <div class="text-cyan-600 font-bold text-lg">{{ $infographic->views_count ?? 0 }}</div>
                                                <div class="text-cyan-600 text-xs">مشاهدات</div>
                                            </div>
                                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                                <div class="text-blue-600 font-bold text-lg">{{ $infographic->created_at->format('d') }}</div>
                                                <div class="text-blue-600 text-xs">{{ $infographic->created_at->format('M') }}</div>
                                            </div>
                                        </div>

                                        <!-- Read More Button -->
                                        <div class="text-center">
                                            <a href="{{ route('news.show', $infographic->slug) }}" 
                                               class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-3 rounded-full font-medium hover:from-cyan-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                                <span>عرض الانفوجرافيك</span>
                                                <i class="bi bi-arrow-left text-sm"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Navigation Arrows -->
                    <div class="swiper-button-next infographic-swiper-button-next"></div>
                    <div class="swiper-button-prev infographic-swiper-button-prev"></div>
                    <!-- Pagination -->
                    <div class="swiper-pagination infographic-swiper-pagination"></div>
                    <div style="margin-top: 10px ; margin-bottom: 10px;">
                    <div class="text-center mt-2">
                    <a href="{{ route('news.infographics') }}" 
                       class="inline-flex items-center gap-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-8 py-4 rounded-full font-semibold hover:from-cyan-600 hover:to-blue-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="text-black">عرض جميع الانفوجرافيك</span>
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                </div>
               
                    
                </div>
            </div>
        </div>

        <style>
        .infographics-section {
            position: relative;
        }

        .infographics-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="infographic-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23e0f2fe" opacity="0.3"/><circle cx="75" cy="75" r="1" fill="%23e0f2fe" opacity="0.3"/><circle cx="50" cy="10" r="0.5" fill="%23e0f2fe" opacity="0.2"/><circle cx="10" cy="60" r="0.5" fill="%23e0f2fe" opacity="0.2"/><circle cx="90" cy="40" r="0.5" fill="%23e0f2fe" opacity="0.2"/></pattern></defs><rect width="100" height="100" fill="url(%23infographic-pattern)"/></svg>');
            opacity: 0.5;
            pointer-events: none;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Swiper Styles */
        .infographics-slider {
            position: relative;
            padding: 0 60px;
        }

        .infographics-swiper {
            overflow: hidden;
            border-radius: 20px;
        }

        .swiper-slide {
            height: auto;
            padding: 10px;
        }

        .infographic-swiper-button-next,
        .infographic-swiper-button-prev {
            color: #06B6D4;
            background: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .infographic-swiper-button-next:hover,
        .infographic-swiper-button-prev:hover {
            background: #06B6D4;
            color: white;
            transform: scale(1.1);
        }

        .infographic-swiper-button-next::after,
        .infographic-swiper-button-prev::after {
            font-size: 18px;
            font-weight: bold;
        }

        .infographic-swiper-pagination {
            position: relative;
            margin-top: 30px;
        }

        .infographic-swiper-pagination .swiper-pagination-bullet {
            background: #06B6D4;
            opacity: 0.3;
            width: 12px;
            height: 12px;
            transition: all 0.3s ease;
        }

        .infographic-swiper-pagination .swiper-pagination-bullet-active {
            opacity: 1;
            background: #06B6D4;
            transform: scale(1.2);
        }

        /* Animation for cards */
        .infographic-card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                const infographicsSwiper = new Swiper('.infographics-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                        waitForTransition: true,
                    },
                    effect: 'slide',
                    speed: 800,
                    pagination: {
                        el: '.infographic-swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.infographic-swiper-button-next',
                        prevEl: '.infographic-swiper-button-prev',
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
                            console.log('Infographics Swiper initialized');
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
                const swiperContainer = document.querySelector('.infographics-swiper');
                if (swiperContainer) {
                    swiperContainer.addEventListener('mouseenter', function() {
                        infographicsSwiper.autoplay.stop();
                    });
                    
                    swiperContainer.addEventListener('mouseleave', function() {
                        infographicsSwiper.autoplay.start();
                    });
                }
            }
        });
        </script>
    </section>
    @endif
</div> 