<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherWidget extends Component
{
    public $weatherData = [];
    public $loading = true;
    public $error = null;

    public function mount()
    {
        $this->loadWeatherData();
    }

    public function loadWeatherData()
    {
        try {
            // استخدام Cache لتجنب استدعاء API كثيراً
            $this->weatherData = Cache::remember('weather_data_shabwa', 1800, function () {
                // إحداثيات شبوة (تقريبية)
                $lat = 14.5529;
                $lon = 46.8364;
                
                // يمكنك الحصول على API key من https://openweathermap.org/api
                $apiKey = config('services.openweathermap.key', 'your_api_key_here');
                
                if ($apiKey === 'your_api_key_here') {
                    // بيانات وهمية محسنة إذا لم يكن هناك API key
                    return $this->getMockWeatherData();
                }

                $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                    'lat' => $lat,
                    'lon' => $lon,
                    'appid' => $apiKey,
                    'units' => 'metric',
                    'lang' => 'ar'
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    return $this->formatWeatherData($data);
                }

                return $this->getMockWeatherData();
            });

            $this->loading = false;
        } catch (\Exception $e) {
            $this->error = 'فشل في تحميل بيانات الطقس';
            $this->weatherData = $this->getMockWeatherData();
            $this->loading = false;
        }
    }

    private function formatWeatherData($data)
    {
        $weatherId = $data['weather'][0]['id'] ?? 800;
        $icon = $this->getWeatherIcon($weatherId);
        
        return [
            'city' => 'شبوة',
            'temperature' => round($data['main']['temp'] ?? 25),
            'feels_like' => round($data['main']['feels_like'] ?? 25),
            'condition' => $data['weather'][0]['description'] ?? 'مشمس',
            'humidity' => $data['main']['humidity'] ?? 65,
            'wind_speed' => round(($data['wind']['speed'] ?? 0) * 3.6, 1), // تحويل من m/s إلى km/h
            'pressure' => $data['main']['pressure'] ?? 1013,
            'icon' => $icon,
            'sunrise' => $data['sys']['sunrise'] ?? null,
            'sunset' => $data['sys']['sunset'] ?? null,
            'updated_at' => now()->format('H:i')
        ];
    }

    private function getWeatherIcon($weatherId)
    {
        // تحويل weather ID إلى Bootstrap Icons
        if ($weatherId >= 200 && $weatherId < 300) return 'bi-lightning';
        if ($weatherId >= 300 && $weatherId < 400) return 'bi-cloud-drizzle';
        if ($weatherId >= 500 && $weatherId < 600) return 'bi-cloud-rain';
        if ($weatherId >= 600 && $weatherId < 700) return 'bi-cloud-snow';
        if ($weatherId >= 700 && $weatherId < 800) return 'bi-cloud-fog';
        if ($weatherId == 800) return 'bi-sun';
        if ($weatherId == 801) return 'bi-cloud-sun';
        if ($weatherId >= 802 && $weatherId < 900) return 'bi-cloud';
        
        return 'bi-sun';
    }

    private function getMockWeatherData()
    {
        // بيانات وهمية محسنة ومتنوعة
        $conditions = [
            ['condition' => 'مشمس', 'icon' => 'bi-sun', 'temp' => 28, 'humidity' => 45],
            ['condition' => 'غائم جزئياً', 'icon' => 'bi-cloud-sun', 'temp' => 25, 'humidity' => 60],
            ['condition' => 'غائم', 'icon' => 'bi-cloud', 'temp' => 22, 'humidity' => 75],
            ['condition' => 'ممطر خفيف', 'icon' => 'bi-cloud-drizzle', 'temp' => 20, 'humidity' => 85],
            ['condition' => 'عاصف', 'icon' => 'bi-wind', 'temp' => 26, 'humidity' => 55],
        ];

        $randomCondition = $conditions[array_rand($conditions)];
        
        return [
            'city' => 'شبوة',
            'temperature' => $randomCondition['temp'],
            'feels_like' => $randomCondition['temp'] + rand(-2, 2),
            'condition' => $randomCondition['condition'],
            'humidity' => $randomCondition['humidity'],
            'wind_speed' => rand(5, 25),
            'pressure' => rand(1000, 1020),
            'icon' => $randomCondition['icon'],
            'sunrise' => null,
            'sunset' => null,
            'updated_at' => now()->format('H:i')
        ];
    }

    public function refreshWeather()
    {
        Cache::forget('weather_data_shabwa');
        $this->loadWeatherData();
    }

    public function render()
    {
        return view('livewire.weather-widget', [
            'weatherData' => $this->weatherData,
            'loading' => $this->loading,
            'error' => $this->error
        ]);
    }
}