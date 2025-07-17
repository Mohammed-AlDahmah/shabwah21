<!-- Hero Section -->
<section class="hero-section py-20 md:py-32 bg-gradient-to-br from-yellow-50 via-white to-yellow-100 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Logo (Right) -->
            <div class="logo-container flex justify-center lg:justify-end order-2 lg:order-1">
                <div class="logo-box relative flex flex-col items-center">
                    <div class="logo-bg absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-200 via-yellow-100 to-white blur-2xl opacity-60 scale-125"></div>
                    <div class="logo-glow absolute inset-0 rounded-full bg-yellow-400 opacity-20 blur-3xl scale-110"></div>
                    <div class="logo-text relative z-10">
                        <img src="{{ asset('images/logo.png') }}" alt="شبوة 21" class="h-20 md:h-28 lg:h-32 drop-shadow-xl transition-transform duration-500 hover:scale-105">
                    </div>
                           </div>
            </div>
            <!-- Text Content (Left) -->
            <div class="text-center lg:text-left order-1 lg:order-2 animate-fade-in-up">
                <h1 class="hero-title text-5xl md:text-6xl lg:text-7xl font-extrabold mb-8 text-gray-800 leading-tight">
                    <span class="block animate-gradient-text bg-gradient-to-r from-yellow-700 via-red-600 to-yellow-500 bg-clip-text text-transparent">أخبار <span class="title-highlight">شبوة</span></span>
                    <span class="block mt-6 text-red-700 animate-fade-in-delay">على مدار الساعة</span>
                </h1>
                <p class="text-xl md:text-2xl mb-10 text-gray-600 max-w-2xl mx-auto lg:ml-0 leading-relaxed animate-fade-in-delay2">
                    منبرك الأول للأخبار الصادقة والتحليلات العميقة من قلب محافظة شبوة. نقدم لكم آخر الأخبار والتقارير والتحليلات السياسية والاقتصادية والاجتماعية.
                </p>
                
            </div>
        </div>
    </div>
    <style>
    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(40px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes gradientText {
      0% { background-position: 0% 50%; }
      100% { background-position: 100% 50%; }
    }
    .animate-fade-in-up { animation: fadeInUp 1s cubic-bezier(.4,0,.2,1) both; }
    .animate-fade-in-delay { animation: fadeInUp 1.3s cubic-bezier(.4,0,.2,1) both; }
    .animate-fade-in-delay2 { animation: fadeInUp 1.6s cubic-bezier(.4,0,.2,1) both; }
    .animate-fade-in-delay3 { animation: fadeInUp 1.9s cubic-bezier(.4,0,.2,1) both; }
    .animate-gradient-text {
      background-size: 200% 200%;
      animation: gradientText 3s linear infinite alternate;
    }
    </style>
</section>