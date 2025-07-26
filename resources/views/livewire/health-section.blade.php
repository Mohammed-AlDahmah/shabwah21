@php
    $defaultImage = asset('images/health-default.png');
    if (!file_exists(public_path('images/health-default.png'))) {
        $defaultImage = asset('images/default-health.jpg');
    }
@endphp

<div>
@if($healthArticles && count($healthArticles) > 0)
<section class="single-health-slider py-12 bg-white">
    <div class="container mx-auto px-4 max-w-3xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="icon-wrapper inline-flex items-center justify-center w-16 h-16 rounded-full mb-4 bg-[#3A7D44] mx-auto">
                <i class="bi bi-heart-pulse text-2xl text-white"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">نصائح صحية</h2>
            <p class="text-gray-600">أهم المقالات الصحية المختارة لك</p>
        </div>

        <!-- Improved Single Item Slider -->
        <div class="swiper single-health-swiper">
            <div class="swiper-wrapper">
                @foreach($healthArticles as $article)
                <div class="swiper-slide">
                    <div class="health-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                        <!-- Image -->
                        <div class="health-image h-56 overflow-hidden relative">
                            <img src="{{ $article->image_url ?? $defaultImage }}" 
                                 alt="{{ $article->title }}"
                                 class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500"
                                 loading="lazy">
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="bi bi-heart-pulse text-[#3A7D44]"></i>
                                <h3 class="text-lg font-bold text-gray-800">
                                    {{ $article->title }}
                                </h3>
                            </div>
                            
                            <p class="text-gray-600 mb-4 text-sm">
                                {{ Str::limit($article->excerpt, 120) }}
                            </p>
                            
                            <div class="flex justify-between items-center text-xs text-gray-500 border-t border-gray-100 pt-3">
                                <span><i class="bi bi-calendar3 mr-1"></i> {{ $article->created_at->format('Y-m-d') }}</span>
                                <span><i class="bi bi-eye mr-1"></i> {{ number_format($article->views_count ?? 0) }} مشاهدة</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Navigation -->
            <div class="swiper-button-next single-health-button-next !text-white !bg-[#3A7D44] hover:!bg-[#2D5A35]"></div>
            <div class="swiper-button-prev single-health-button-prev !text-white !bg-[#3A7D44] hover:!bg-[#2D5A35]"></div>
        </div>
    </div>

    <style>
        /* Swiper Container */
        .single-health-swiper {
            padding: 20px 60px;
            overflow: hidden;
        }
        
        /* Slide Animation */
        .swiper-slide {
            transition: all 600ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transform: scale(0.95);
            opacity: 0.5;
            filter: blur(1px);
        }
        
        .swiper-slide-active {
            transform: scale(1);
            opacity: 1;
            filter: blur(0);
            z-index: 10;
        }
        
        /* Navigation Arrows */
        .single-health-button-next,
        .single-health-button-prev {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            transition: all 300ms ease;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        
        .single-health-button-next:after,
        .single-health-button-prev:after {
            font-size: 18px;
            font-weight: bold;
        }
        
        /* Card Styling */
        .health-card {
            transition: box-shadow 300ms ease;
        }
        
        .swiper-slide-active .health-card {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        /* Image Transition */
        .health-image img {
            transition: opacity 500ms ease, transform 800ms ease;
        }
        
        .swiper-slide:not(.swiper-slide-active) .health-image img {
            opacity: 0.8;
        }
    </style>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.single-health-swiper', {
                loop: true,
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 20,
                speed: 800,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    waitForTransition: true
                },
                navigation: {
                    nextEl: '.single-health-button-next',
                    prevEl: '.single-health-button-prev',
                },
                effect: 'creative',
                creativeEffect: {
                    prev: {
                        translate: ['-80%', 0, -100],
                        opacity: 0,
                        scale: 0.8
                    },
                    next: {
                        translate: ['80%', 0, -100],
                        opacity: 0,
                        scale: 0.8
                    },
                },
                on: {
                    transitionStart: function() {
                        // Reset all slides before transition
                        this.slides.forEach(slide => {
                            slide.style.opacity = '0.5';
                            slide.style.filter = 'blur(1px)';
                            slide.style.transform = 'scale(0.95)';
                        });
                    },
                    transitionEnd: function() {
                        // Highlight active slide
                        this.slides[this.activeIndex].style.opacity = '1';
                        this.slides[this.activeIndex].style.filter = 'blur(0)';
                        this.slides[this.activeIndex].style.transform = 'scale(1)';
                    }
                }
            });
            
            // Pause on hover
            const slider = document.querySelector('.single-health-swiper');
            slider.addEventListener('mouseenter', () => {
                swiper.autoplay.stop();
                swiper.slides[swiper.activeIndex].style.transform = 'scale(1.02)';
            });
            slider.addEventListener('mouseleave', () => {
                swiper.autoplay.start();
                swiper.slides[swiper.activeIndex].style.transform = 'scale(1)';
            });
        });
    </script>
    @endpush
</section>
@endif
</div>