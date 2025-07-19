<div class="weather-widget">
    @if(isset($weatherData) && $weatherData)
        <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white rounded-2xl p-6 shadow-lg">
            <h3 class="text-lg font-bold mb-4 flex items-center">
                <i class="bi bi-cloud-sun me-3 text-2xl"></i>
                الطقس - شبوة
            </h3>
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-4xl font-bold">{{ $weatherData['temperature'] ?? '25' }}°</div>
                    <div class="text-sm opacity-90">{{ $weatherData['condition'] ?? 'مشمس' }}</div>
                    <div class="text-xs opacity-75 mt-1">الرطوبة: {{ $weatherData['humidity'] ?? '65' }}%</div>
                </div>
                <div class="text-5xl opacity-80">
                    <i class="{{ $weatherData['icon'] ?? 'bi bi-sun' }}"></i>
                </div>
            </div>
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