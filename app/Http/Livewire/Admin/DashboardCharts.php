<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Article;
use Carbon\Carbon;

class DashboardCharts extends Component
{
    public array $articlesChart = [];

    public function mount(): void
    {
        $this->prepareChartData();
    }

    private function prepareChartData(): void
    {
        $months = collect(range(0,5))->map(function($i){
            return Carbon::now()->subMonths($i)->startOfMonth();
        })->reverse();

        $labels = [];
        $data = [];

        foreach($months as $month){
            $labels[] = $month->format('M');
            $count = Article::whereMonth('created_at',$month->month)
                              ->whereYear('created_at',$month->year)
                              ->count();
            $data[] = $count;
        }

        $this->articlesChart = [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    public function render()
    {
        return view('livewire.admin.dashboard-charts');
    }
}