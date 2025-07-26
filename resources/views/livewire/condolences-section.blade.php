@php
    $defaultImage = asset('images/condolences-default.svg');
    // Fallback image if default doesn't exist
    if (!file_exists(public_path('images/condolences-default.svg'))) {
        $defaultImage = asset('images/default-condolence.png');
    }
@endphp

<div>
@if($condolences && count($condolences) > 0)
<section class="condolences-slider-section py-8 bg-[#0F0F0F]">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-6">
            <div class="icon-wrapper inline-flex items-center justify-center w-12 h-12 rounded-full mb-3 bg-[#5A5A5A]">
                <i class="bi bi-heart text-xl text-white"></i>
            </div>
            <h2 class="text-xl font-bold text-white mb-1">بيانات التعزية</h2>
            <p class="text-sm text-gray-400">نعزي أحبائكم في وفياتهم</p>
        </div>

        <!-- Improved Condolences Slider -->
        <div class="swiper condolences-swiper relative">
            <div class="swiper-wrapper">
                @foreach($condolences as $condolence)
                <div class="swiper-slide">
                    <div class="condolence-card relative h-72 rounded-lg overflow-hidden" 
                         style="background-image: url('{{ $condolence->image_url ?? $defaultImage }}'); background-size: cover; background-position: center;">
                        
                        <!-- Dark Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>
                        
                        <!-- Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-5">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="bi bi-heart text-[#8B8B8B]"></i>
                                <a href="{{ route('news.show', $condolence->id) }}" class="text-sm font-medium text-white hover:text-gray-300 transition">
                                    {{ $condolence->title }}
                                </a>
                            </div>
                            
                            <p class="text-xs text-gray-300 mb-4 line-clamp-2">
                                {{ $condolence->excerpt }}
                            </p>
                            
                            <div class="flex justify-between items-center text-[10px] text-gray-400 border-t border-gray-700 pt-3">
                                <span><i class="bi bi-calendar3 mr-1"></i> {{ $condolence->created_at->format('Y-m-d') }}</span>
                                <span><i class="bi bi-eye mr-1"></i> {{ number_format($condolence->views_count ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Navigation -->
            <div class="swiper-button-next condolences-swiper-button-next !text-[#8B8B8B]"></div>
            <div class="swiper-button-prev condolences-swiper-button-prev !text-[#8B8B8B]"></div>
            
            <!-- Pagination -->
            <div class="swiper-pagination condolences-swiper-pagination !bottom-2"></div>
        </div>
        
        <!-- View All Button -->
        <div class="text-center mt-6">
            <a href="{{ route('news.category', 'condolences') }}" class="inline-flex items-center px-5 py-1.5 rounded-full bg-[#5A5A5A] text-white text-sm hover:bg-[#3A3A3A] transition">
                <span>عرض جميع التعازي</span>
                <i class="bi bi-arrow-left mr-1"></i>
            </a>
        </div>
    </div>

    <style>
        /* Swiper Styles */
        .condolences-swiper {
            padding: 10px 30px;
            overflow: hidden;
        }
        
        .condolence-card {
            transition: transform 0.5s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255,255,255,0.05);
        }
        
        .swiper-slide-active .condolence-card {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        }
        
        /* Navigation Arrows */
        .condolences-swiper-button-next,
        .condolences-swiper-button-prev {
            width: 30px;
            height: 30px;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            border: 1px solid rgba(139, 139, 139, 0.3);
        }
        
        .condolences-swiper-button-next:hover,
        .condolences-swiper-button-prev:hover {
            background: rgba(90, 90, 90, 0.3);
        }
        
        .condolences-swiper-button-next:after,
        .condolences-swiper-button-prev:after {
            font-size: 14px;
            font-weight: bold;
        }
        
        /* Pagination */
        .condolences-swiper-pagination .swiper-pagination-bullet {
            background: white;
            opacity: 0.3;
            width: 8px;
            height: 8px;
        }
        
        .condolences-swiper-pagination .swiper-pagination-bullet-active {
            background: #8B8B8B;
            opacity: 1;
            width: 20px;
            border-radius: 4px;
        }
    </style>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.condolences-swiper', {
                loop: true,
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 20,
                speed: 800,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                pagination: {
                    el: '.condolences-swiper-pagination',
                    clickable: true,
                    dynamicBullets: true
                },
                navigation: {
                    nextEl: '.condolences-swiper-button-next',
                    prevEl: '.condolences-swiper-button-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 1.1 },
                    768: { slidesPerView: 1.3 },
                    1024: { slidesPerView: 1.5 }
                }
            });
            
            // Pause on hover
            const cards = document.querySelectorAll('.condolence-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    swiper.autoplay.stop();
                });
                card.addEventListener('mouseleave', () => {
                    swiper.autoplay.start();
                });
            });
        });
    </script>
    @endpush
</section>
@endif
</div>