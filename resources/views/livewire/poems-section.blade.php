@php
    // Define default images at the top of your section
    $defaultPng = asset('storage/defaults/poem-default.png');
    $defaultSvg = asset('storage/defaults/poem-default.svg');
    
    // Fallback if files don't exist
    if (!file_exists(public_path('storage/defaults/poem-default.png'))) {
        $defaultPng = asset('images/default-poem.png');
    }
    if (!file_exists(public_path('storage/defaults/poem-default.svg'))) {
        $defaultSvg = asset('images/default-poem.svg');
    }
@endphp
<div>
    @if($poems && count($poems) > 0)
    <section class="single-poem-slider py-12 bg-[#2A1B0A]">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-full mb-4 bg-[#C08B2D]">
                    <i class="bi bi-quote text-2xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">القصائد</h2>
                <p class="text-gray-300 max-w-md mx-auto">أجمل القصائد الشعرية المختارة</p>
            </div>

            <!-- Improved Single Poem Slider -->
            <div class="swiper single-poem-swiper max-w-xl mx-auto relative">
                <div class="swiper-wrapper">
                    @foreach($poems as $poem)
                    <div class="swiper-slide">
                        <div class="bg-[#3A2B1A] rounded-lg overflow-hidden shadow-lg h-full">
                            <div class="p-6 min-h-[400px] flex flex-col animate-fadeIn">
                                <!-- Poem Badge -->
                                <span class="inline-block px-4 py-1 rounded-full mb-4 bg-[#C08B2D] text-white text-sm">
                                    <i class="bi bi-quote mr-1"></i> قصيدة
                                </span>
                                
                                <!-- Poem Content -->
                                <h3 class="text-xl font-bold text-white mb-4 transition-all duration-300 transform translate-y-0">
                                    {{ $poem->title }}
                                </h3>
                                
                                <div class="text-gray-300 mb-6 flex-grow transition-all duration-500 delay-150 transform translate-y-0">
                                    {{ Str::limit($poem->excerpt ?? strip_tags($poem->content), 200) }}
                                </div>
                                
                                <!-- Poem Footer -->
                                <div class="flex justify-between items-center pt-4 border-t border-gray-600 transition-all duration-700 delay-300 transform translate-y-0">
                                    <span class="text-sm text-gray-300">
                                        <i class="bi bi-calendar3 mr-1"></i> {{ $poem->created_at->format('Y-m-d') }}
                                    </span>
                                    <span class="text-sm text-gray-300">
                                        <i class="bi bi-eye mr-1"></i> {{ number_format($poem->views_count ?? 0) }} مشاهدة
                                    </span>
                                    <a href="{{ route('news.show', $poem->slug) }}" class="text-sm px-4 py-1 rounded-full bg-[#C08B2D] text-white hover:bg-[#a06e22] transition transform hover:scale-105">
                                        اقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Navigation Arrows with Improved Visibility -->
                <div class="swiper-button-next single-poem-button-next text-[#C08B2D] hover:text-[#a06e22] transition-all"></div>
                <div class="swiper-button-prev single-poem-button-prev text-[#C08B2D] hover:text-[#a06e22] transition-all"></div>
            </div>
            
            <!-- View All Button -->
            <div class="text-center mt-8">
                <a href="{{ route('news.category', 'poems') }}" class="inline-flex items-center px-6 py-2 rounded-full bg-[#C08B2D] text-white hover:bg-[#a06e22] transition transform hover:-translate-x-1">
                    <span>عرض جميع القصائد</span>
                    <i class="bi bi-arrow-left mr-2"></i>
                </a>
            </div>
        </div>

        <style>
            /* Smooth Transitions */
            .swiper-slide {
                opacity: 0.3;
                scale: 0.9;
                transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .swiper-slide-active {
                opacity: 1;
                scale: 1;
            }
            
            /* Text Animation */
            .animate-fadeIn {
                animation: fadeIn 0.8s ease-out forwards;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            /* Navigation Arrows */
            .single-poem-button-next,
            .single-poem-button-prev {
                width: 44px;
                height: 44px;
                background: rgba(42, 27, 10, 0.8);
                backdrop-filter: blur(4px);
                border-radius: 50%;
                border: 1px solid rgba(192, 139, 45, 0.3);
                transition: all 0.3s ease;
            }
            
            .single-poem-button-next:hover,
            .single-poem-button-prev:hover {
                background: rgba(192, 139, 45, 0.2);
                border-color: rgba(192, 139, 45, 0.6);
            }
            
            .single-poem-button-next:after,
            .single-poem-button-prev:after {
                font-size: 20px;
                font-weight: bold;
            }
        </style>

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const swiper = new Swiper('.single-poem-swiper', {
                    loop: true,
                    slidesPerView: 1,
                    centeredSlides: true,
                    spaceBetween: 30,
                    speed: 800, // Slower transition speed
                    autoplay: {
                        delay: 6000, // Increased delay
                        disableOnInteraction: false,
                        waitForTransition: true // Wait for animation to complete
                    },
                    navigation: {
                        nextEl: '.single-poem-button-next',
                        prevEl: '.single-poem-button-prev',
                    },
                    effect: 'creative', // Advanced transition effect
                    creativeEffect: {
                        prev: {
                            translate: ['-120%', 0, -200],
                            opacity: 0
                        },
                        next: {
                            translate: ['120%', 0, -200],
                            opacity: 0
                        },
                    },
                    on: {
                        init: function() {
                            // Preload animations
                            this.slides.forEach(slide => {
                                slide.style.opacity = '0';
                                slide.style.transform = 'translateY(20px)';
                            });
                            this.slides[this.activeIndex].style.opacity = '1';
                            this.slides[this.activeIndex].style.transform = 'translateY(0)';
                        },
                        slideChangeTransitionStart: function() {
                            // Smooth text transitions
                            this.slides[this.previousIndex].querySelectorAll('h3, div, .flex').forEach(el => {
                                el.style.transform = 'translateY(20px)';
                                el.style.opacity = '0';
                            });
                        },
                        slideChangeTransitionEnd: function() {
                            // Animate in new content
                            this.slides[this.activeIndex].querySelectorAll('h3, div, .flex').forEach((el, i) => {
                                setTimeout(() => {
                                    el.style.transform = 'translateY(0)';
                                    el.style.opacity = '1';
                                    el.style.transition = `transform 0.5s ease ${i * 0.1}s, opacity 0.5s ease ${i * 0.1}s`;
                                }, 50);
                            });
                        }
                    }
                });
                
                // Pause on hover for better readability
                const sliderContainer = document.querySelector('.single-poem-swiper');
                sliderContainer.addEventListener('mouseenter', () => swiper.autoplay.stop());
                sliderContainer.addEventListener('mouseleave', () => swiper.autoplay.start());
            });
        </script>
        @endpush
    </section>
    @endif
</div>