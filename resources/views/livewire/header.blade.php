<header x-data="{ open:false }" class="bg-white shadow-md sticky top-0 z-50">
    <!-- Top Bar -->
    <div class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-2">
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="flex items-center">
                        <i class="bi bi-calendar-event text-red-400 ml-1"></i>
                        {{ now()->format('Y-m-d') }}
                    </span>
                    <span class="flex items-center">
                        <i class="bi bi-geo-alt text-red-400 ml-1"></i>
                        شبوة، اليمن
                    </span>
                    <span class="flex items-center">
                        <i class="bi bi-thermometer-half text-red-400 ml-1"></i>
                        28°C
                    </span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#" class="text-gray-400 hover:text-red-400 transition-colors" aria-label="Facebook">
                        <i class="bi bi-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-400 transition-colors" aria-label="Twitter">
                        <i class="bi bi-twitter-x text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-400 transition-colors" aria-label="YouTube">
                        <i class="bi bi-youtube text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-400 transition-colors" aria-label="Telegram">
                        <i class="bi bi-telegram text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 space-x-reverse">
                    <div class="relative">
                        <img src="/images/logo.png" alt="شبوة21" class="h-12 w-auto">
                    </div>
                    <div class="hidden md:block">
                        <h1 class="text-3xl font-bold text-gray-900">شبوة<span class="text-red-600">21</span></h1>
                        <p class="text-sm text-gray-600">منبرك الأول والخبر</p>
                    </div>
                </a>
            </div>

            <!-- Search Bar -->
            <div class="hidden md:flex flex-1 max-w-md mx-8">
                <div class="relative w-full">
                    <input type="text" placeholder="ابحث في الأخبار..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-700 placeholder-gray-500">
                    <button class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-600 transition-colors">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-700 hover:text-red-600 transition-colors focus:outline-none p-2">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="hidden md:flex items-center justify-center space-x-8 space-x-reverse py-3">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50 {{ request()->routeIs('home') ? 'text-red-600 bg-red-50 font-semibold' : '' }}">
                    <i class="bi bi-house me-2"></i>الرئيسية
                </a>
                <a href="#" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50">
                    <i class="bi bi-geo-alt me-2"></i>محليات
                </a>
                <a href="#" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50">
                    <i class="bi bi-file-text me-2"></i>تقارير وتحقيقات
                </a>
                <a href="#" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50">
                    <i class="bi bi-globe me-2"></i>عربي وعالمي
                </a>
                <a href="#" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50">
                    <i class="bi bi-people me-2"></i>مجتمع
                </a>
                <a href="#" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50">
                    <i class="bi bi-trophy me-2"></i>رياضة
                </a>
                <a href="{{ route('videos.index') }}" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50 {{ request()->routeIs('videos.index') ? 'text-red-600 bg-red-50 font-semibold' : '' }}">
                    <i class="bi bi-play-circle me-2"></i>فيديو
                </a>
                <a href="#" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-gray-700 hover:text-red-600 hover:bg-red-50">
                    <i class="bi bi-envelope me-2"></i>اتصل بنا
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <nav x-show="open" x-transition.origin.top class="md:hidden bg-white border-t border-gray-200 shadow-lg">
        <div class="px-4 py-4 space-y-2">
            <!-- Mobile Search -->
            <div class="mb-4">
                <div class="relative">
                    <input type="text" placeholder="ابحث في الأخبار..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-700 placeholder-gray-500">
                    <button class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-600 transition-colors">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            
            <a @click="open = false" href="{{ route('home') }}" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-house me-2"></i>الرئيسية
            </a>
            <a @click="open = false" href="#" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-geo-alt me-2"></i>محليات
            </a>
            <a @click="open = false" href="#" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-file-text me-2"></i>تقارير وتحقيقات
            </a>
            <a @click="open = false" href="#" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-globe me-2"></i>عربي وعالمي
            </a>
            <a @click="open = false" href="#" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-people me-2"></i>مجتمع
            </a>
            <a @click="open = false" href="#" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-trophy me-2"></i>رياضة
            </a>
            <a @click="open = false" href="{{ route('videos.index') }}" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-play-circle me-2"></i>فيديو
            </a>
            <a @click="open = false" href="#" class="block py-3 px-4 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                <i class="bi bi-envelope me-2"></i>اتصل بنا
            </a>
        </div>
    </nav>
</header>