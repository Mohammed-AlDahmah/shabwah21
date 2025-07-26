<!-- Hero Section -->
<section class="hero-section py-12 md:py-16 relative overflow-hidden">
    <!-- Animated Background - Desktop Only -->
    <div class="hero-bg-animation hidden md:block">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
        </div>
        <div class="gradient-overlay"></div>
    </div>
    
    <!-- Simple Background for Mobile -->
    <div class="hero-bg-mobile md:hidden">
        <div class="gradient-overlay-mobile"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
            <!-- Logo (Right) -->
            <div class="logo-container flex justify-center lg:justify-end order-2 lg:order-1">
                <div class="logo-box relative flex flex-col items-center">
                    <!-- Glowing Background - Desktop Only -->
                    <div class="logo-glow-bg hidden md:block absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-200 via-yellow-100 to-white blur-xl opacity-60 scale-110 animate-pulse"></div>
                    <div class="logo-glow hidden md:block absolute inset-0 rounded-full bg-yellow-400 opacity-20 blur-2xl scale-105 animate-glow"></div>
                    
                    <!-- Logo with Hover Effect -->
                    <div class="logo-text relative z-10 transform md:hover:scale-110 transition-all duration-500 md:hover:rotate-3">
                        <img src="{{ asset('images/logo.png') }}" alt="شبوة 21" class="h-20 md:h-24 lg:h-28 drop-shadow-2xl filter brightness-110">
                    </div>
                    
                    <!-- Decorative Elements -->
                </div>
            </div>
            
            <!-- Text Content (Left) -->
            <div class="text-center lg:text-left order-1 lg:order-2">
                <!-- Main Title with Enhanced Styling -->
                <div class="hero-title-container mb-4 md:mb-6">
                    <h1 class="hero-title text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-800 leading-tight">
                        <span class="block md:animate-gradient-text bg-gradient-to-r from-yellow-700 via-red-600 to-yellow-500 bg-clip-text text-transparent relative">
                            أخبار 
                            <span class="title-highlight relative">
                                شبوة
                            </span>
                        </span>
                        <span class="block mt-2 md:mt-4 text-red-700 md:animate-fade-in-delay text-lg md:text-xl lg:text-2xl font-semibold">
                            على مدار الساعة
                            <span class="inline-block ml-2 md:animate-pulse">🕐</span>
                        </span>
                    </h1>
                </div>
                
                <!-- Enhanced Description -->
                <div class="hero-description mb-6 md:mb-8">
                    <p class="text-base md:text-lg lg:text-xl text-gray-600 max-w-2xl mx-auto lg:ml-0 leading-relaxed md:animate-fade-in-delay2 relative">
                        <span class="quote-mark hidden md:inline-block absolute -top-2 -right-2 text-yellow-400 text-2xl">"</span>
                        {{ $heroDescription ?? 'منبرك الأول للأخبار الصادقة والتحليلات العميقة من قلب محافظة شبوة. نقدم لكم آخر الأخبار والتقارير والتحليلات السياسية والاقتصادية والاجتماعية.' }}
                        <span class="quote-mark hidden md:inline-block absolute -bottom-2 -left-2 text-yellow-400 text-2xl">"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator - Desktop Only -->
    <div class="scroll-indicator hidden md:block absolute bottom-4 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="scroll-arrow w-6 h-6 border-2 border-yellow-400 border-t-transparent rounded-full animate-spin"></div>
    </div>
    
    <style>
    /* Mobile-specific styles */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0;
            min-height: auto;
        }
        
        .hero-bg-mobile {
            position: absolute;
            inset: 0;
            z-index: 0;
        }
        
        .gradient-overlay-mobile {
            background: linear-gradient(135deg, rgba(255,248,225,0.95) 0%, rgba(255,255,255,0.95) 100%);
            height: 100%;
            width: 100%;
        }
        
        .hero-title {
            font-size: 1.75rem !important;
            line-height: 1.3 !important;
        }
        
        .hero-description p {
            font-size: 0.875rem !important;
            line-height: 1.6 !important;
            padding: 0 1rem;
        }
        
        .logo-text img {
            height: 5rem;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }
        
        /* Remove all animations on mobile */
        * {
            animation: none !important;
            transition: none !important;
        }
    }
    
    /* Desktop animations */
    @media (min-width: 769px) {
        @keyframes fadeInUp {
          0% { opacity: 0; transform: translateY(30px); }
          100% { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes gradientText {
          0% { background-position: 0% 50%; }
          100% { background-position: 100% 50%; }
        }
        
        @keyframes glow {
          0%, 100% { opacity: 0.2; transform: scale(1.05); }
          50% { opacity: 0.4; transform: scale(1.1); }
        }
        
        @keyframes shine {
          0% { transform: translateX(-100%); }
          100% { transform: translateX(100%); }
        }
        
        @keyframes float {
          0%, 100% { transform: translateY(0px) rotate(0deg); }
          50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .animate-fade-in-up { animation: fadeInUp 0.8s cubic-bezier(.4,0,.2,1) both; }
        .animate-fade-in-delay { animation: fadeInUp 1s cubic-bezier(.4,0,.2,1) both; }
        .animate-fade-in-delay2 { animation: fadeInUp 1.2s cubic-bezier(.4,0,.2,1) both; }
        .animate-fade-in-delay3 { animation: fadeInUp 1.4s cubic-bezier(.4,0,.2,1) both; }
        
        .animate-gradient-text {
          background-size: 200% 200%;
          animation: gradientText 3s linear infinite alternate;
        }
        
        .animate-glow {
          animation: glow 2s ease-in-out infinite;
        }
        
        .animate-shine {
          animation: shine 0.6s ease-in-out;
        }
        
        .title-sparkle {
          animation: spin 2s linear infinite;
        }
        
        .floating-shapes .shape {
          animation: float 6s ease-in-out infinite;
        }
        
        .floating-shapes .shape:nth-child(2) { animation-delay: 1s; }
        .floating-shapes .shape:nth-child(3) { animation-delay: 2s; }
        .floating-shapes .shape:nth-child(4) { animation-delay: 3s; }
        .floating-shapes .shape:nth-child(5) { animation-delay: 4s; }
    }
    </style>
</section>