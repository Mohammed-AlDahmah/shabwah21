<?php

namespace App\Livewire;

use Livewire\Component;

class WeatherWidget extends Component
{
    public function render()
    {
        // Mock weather data - in a real app, this would come from a weather API
        $weatherData = [
            'city' => 'شبوة',
            'temperature' => 28,
            'condition' => 'مشمس',
            'humidity' => 65,
            'wind_speed' => 12,
            'icon' => 'bi-sun'
        ];
        
        return view('livewire.weather-widget', compact('weatherData'));
    }
}