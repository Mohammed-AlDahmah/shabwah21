<div class="weather-widget">
    @if($loading)
        <!-- Loading State -->
        <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-center">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-white"></div>
                <span class="mr-3">جاري تحميل الطقس...</span>
            </div>
        </div>
    @elseif($error)
        <!-- Error State -->
        <div class="bg-gradient-to-br from-red-500 via-red-600 to-red-700 text-white rounded-2xl p-6 shadow-lg">
            <h3 class="text-lg font-bold mb-4 flex items-center">
                <i class="bi bi-exclamation-triangle me-3 text-2xl"></i>
                خطأ في الطقس
            </h3>
            <p class="text-sm opacity-90">{{ $error }}</p>
            <button wire:click="refreshWeather" class="mt-3 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg text-sm transition-colors">
                <i class="bi bi-arrow-clockwise me-2"></i>
                إعادة المحاولة
            </button>
        </div>
    @elseif(isset($weatherData) && $weatherData)
        <!-- Weather Data -->
        <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white rounded-2xl p-6 shadow-lg relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                <i class="bi {{ $weatherData['icon'] }} text-8xl"></i>
            </div>
            
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold flex items-center">
                    <i class="bi bi-geo-alt me-2 text-xl"></i>
                    {{ $weatherData['city'] }}
                </h3>
                <button wire:click="refreshWeather" class="text-white/80 hover:text-white transition-colors" title="تحديث الطقس">
                    <i class="bi bi-arrow-clockwise text-lg"></i>
                </button>
            </div>
            
            <!-- Main Weather Info -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <div class="text-5xl font-bold mb-1">{{ $weatherData['temperature'] }}°</div>
                    <div class="text-lg opacity-90 mb-1">{{ $weatherData['condition'] }}</div>
                    @if(isset($weatherData['feels_like']) && $weatherData['feels_like'] != $weatherData['temperature'])
                        <div class="text-sm opacity-75">يشعر بـ {{ $weatherData['feels_like'] }}°</div>
                    @endif
                </div>
                <div class="text-6xl opacity-90">
                    <i class="bi {{ $weatherData['icon'] }}"></i>
                </div>
            </div>
            
            <!-- Weather Details -->
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="flex items-center">
                    <i class="bi bi-droplet me-2 text-blue-200"></i>
                    <span>الرطوبة: {{ $weatherData['humidity'] }}%</span>
                </div>
                <div class="flex items-center">
                    <i class="bi bi-wind me-2 text-blue-200"></i>
                    <span>الرياح: {{ $weatherData['wind_speed'] }} كم/س</span>
                </div>
                @if(isset($weatherData['pressure']))
                <div class="flex items-center">
                    <i class="bi bi-speedometer2 me-2 text-blue-200"></i>
                    <span>الضغط: {{ $weatherData['pressure'] }} hPa</span>
                </div>
                @endif
                @if(isset($weatherData['updated_at']))
                <div class="flex items-center">
                    <i class="bi bi-clock me-2 text-blue-200"></i>
                    <span>آخر تحديث: {{ $weatherData['updated_at'] }}</span>
                </div>
                @endif
            </div>
            
            <!-- Sunrise/Sunset Info -->
            @if(isset($weatherData['sunrise']) && isset($weatherData['sunset']))
            <div class="mt-4 pt-4 border-t border-white/20">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center">
                        <i class="bi bi-sunrise me-2 text-yellow-300"></i>
                        <span>الشروق: {{ date('H:i', $weatherData['sunrise']) }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-sunset me-2 text-orange-300"></i>
                        <span>الغروب: {{ date('H:i', $weatherData['sunset']) }}</span>
                    </div>
                </div>
            </div>
            @endif
        </div>
    @else
        <!-- Placeholder when no weather data -->
        <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white rounded-2xl p-6 shadow-lg">
            <h3 class="text-lg font-bold mb-4 flex items-center">
                <i class="bi bi-cloud-sun me-3 text-2xl"></i>
                الطقس - شبوة
            </h3>
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-4xl font-bold">25°</div>
                    <div class="text-sm opacity-90">مشمس</div>
                    <div class="text-xs opacity-75 mt-1">الرطوبة: 65%</div>
                </div>
                <div class="text-5xl opacity-80">
                    <i class="bi bi-sun"></i>
                </div>
            </div>
        </div>
    @endif
</div>