<div class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white rounded-xl p-6 mb-6">
    <h3 class="text-lg font-bold mb-4 flex items-center">
        <i class="bi bi-cloud-sun me-3 text-2xl"></i>
        الطقس - شبوة
    </h3>
    <div class="flex items-center justify-between">
        <div>
            <div class="text-4xl font-bold">{{ $weatherData['temperature'] }}°</div>
            <div class="text-sm opacity-90">{{ $weatherData['condition'] }}</div>
            <div class="text-xs opacity-75 mt-1">الرطوبة: {{ $weatherData['humidity'] }}%</div>
        </div>
        <div class="text-5xl opacity-80">
            <i class="{{ $weatherData['icon'] }}"></i>
        </div>
    </div>
</div>