<div class="bg-gradient-to-br from-blue-400 to-blue-600 text-white p-6 rounded-lg">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h4 class="font-bold text-lg">{{ $weatherData['city'] }}</h4>
            <p class="text-blue-100 text-sm">{{ now()->format('l, d F Y') }}</p>
        </div>
        <div class="text-right">
            <i class="{{ $weatherData['icon'] }} text-3xl"></i>
        </div>
    </div>
    
    <div class="flex items-center justify-between mb-4">
        <div>
            <span class="text-3xl font-bold">{{ $weatherData['temperature'] }}°</span>
            <span class="text-blue-100 text-sm">C</span>
        </div>
        <div class="text-right">
            <p class="text-blue-100">{{ $weatherData['condition'] }}</p>
        </div>
    </div>
    
    <div class="grid grid-cols-2 gap-4 text-sm">
        <div class="flex items-center gap-2">
            <i class="bi bi-droplet"></i>
            <div>
                <p class="text-blue-100">الرطوبة</p>
                <p class="font-semibold">{{ $weatherData['humidity'] }}%</p>
            </div>
        </div>
        
        <div class="flex items-center gap-2">
            <i class="bi bi-wind"></i>
            <div>
                <p class="text-blue-100">الرياح</p>
                <p class="font-semibold">{{ $weatherData['wind_speed'] }} كم/س</p>
            </div>
        </div>
    </div>
</div>