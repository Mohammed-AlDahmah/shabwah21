@php
    $defaultImage = asset('images/greetings-default.svg');
    // Fallback image if default doesn't exist
    if (!file_exists(public_path('images/greetings-default.svg'))) {
        $defaultImage = asset('images/default-greeting.png');
    }
@endphp

<div>
@if($greetings && count($greetings) > 0)
<section class="greetings-slider-section py-8 bg-[#1E1E1E]">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-6">
            <div class="icon-wrapper inline-flex items-center justify-center w-12 h-12 rounded-full mb-3 bg-[#C08B2D]">
                <i class="bi bi-emoji-smile text-xl text-white"></i>
            </div>
            <h2 class="text-xl font-bold text-white mb-1">التهاني</h2>
            <p class="text-sm text-gray-300">أجمل التهاني والمناسبات السعيدة</p>
        </div>

        <!-- Improved Greetings Slider -->
        <div class="swiper greetings-swiper relative">
            <div class="swiper-wrapper">
                @foreach($greetings as $greeting)
                <div class="swiper-slide">
                    <div class="greeting-card relative h-64 rounded-lg overflow-hidden" 
                         style="background-image: url('{{ $greeting->image_url ?? $defaultImage }}'); background-size: cover; background-position: center;">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        
                        <!-- Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="bi bi-emoji-smile text-[#C08B2D]"></i>
                                <a href="{{ route('news.show', $greeting->id) }}" class="text-sm font-medium text-white hover:text-[#C08B2D] transition">
                                    {{ $greeting->title }}
                                </a>
                            </div>
                            
                            <p class="text-xs text-gray-200 mb-3 line-clamp-2">
                                {{ $greeting->excerpt }}
                            </p>
                            
                            <div class="flex justify-between items-center text-[10px] text-gray-300">
                                <span><i class="bi bi-calendar3 mr-1"></i> {{ $greeting->created_at->format('Y-m-d') }}</span>
                                <span><i class="bi bi-eye mr-1"></i> {{ number_format($greeting->views_count ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Navigation -->
            <div class="swiper-button-next greetings-swiper-button-next !text-[#C08B2D]"></div>
            <div class="swiper-button-prev greetings-swiper-button-prev !text-[#C08B2D]"></div>
            
            <!-- Pagination -->
            <div class="swiper-pagination greetings-swiper-pagination !bottom-2"></div>
        </div>
        
        <!-- View All Button -->
        <div class="text-center mt-6">
            <a href="{{ route('news.category', 'greetings') }}" class="inline-flex items-center px-5 py-1.5 rounded-full bg-[#C08B2D] text-white text-sm hover:bg-[#a06e22] transition">
                <span>عرض جميع التهاني</span>
                <i class="bi bi-arrow-left mr-1"></i>
            </a>
        </div>
    </div>

    <style>
        /* Improved Swiper Styles */
        .greetings-swiper {
            padding: 10px 30px;
            overflow: hidden;
        }
        
        .greeting-card {
            transition: transform 0.5s ease, box-shadow 0.3s ease;
        }
        
        .swiper-slide-active .greeting-card {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        
        /* Navigation Arrows */
        .greetings-swiper-button-next,
        .greetings-swiper-button-prev {
            width: 30px;
            height: 30px;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            border: 1px solid rgba(192, 139, 45, 0.3);
        }
        
        .greetings-swiper-button-next:hover,
        .greetings-swiper-button-prev:hover {
            background: rgba(192, 139, 45, 0.3);
        }
        
        .greetings-swiper-button-next:after,
        .greetings-swiper-button-prev:after {
            font-size: 14px;
            font-weight: bold;
        }
        
        /* Pagination */
        .greetings-swiper-pagination .swiper-pagination-bullet {
            background: white;
            opacity: 0.5;
            width: 8px;
            height: 8px;
        }
        
        .greetings-swiper-pagination .swiper-pagination-bullet-active {
            background: #C08B2D;
            opacity: 1;
            width: 20px;
            border-radius: 4px;
        }
    </style>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.greetings-swiper', {
                loop: true,
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 20,
                speed: 600,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                pagination: {
                    el: '.greetings-swiper-pagination',
                    clickable: true,
                    dynamicBullets: true
                },
                navigation: {
                    nextEl: '.greetings-swiper-button-next',
                    prevEl: '.greetings-swiper-button-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 1.2 },
                    768: { slidesPerView: 1.5 },
                    1024: { slidesPerView: 2.2 }
                }
            });
            
            // Improved hover effect
            const slides = document.querySelectorAll('.greeting-card');
            slides.forEach(slide => {
                slide.addEventListener('mouseenter', () => {
                    swiper.autoplay.stop();
                });
                slide.addEventListener('mouseleave', () => {
                    swiper.autoplay.start();
                });
            });
        });
    </script>
    @endpush
</section>
@endif
</div>