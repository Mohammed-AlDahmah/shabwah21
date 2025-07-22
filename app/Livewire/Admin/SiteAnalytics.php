<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\VisitorLog;
use Illuminate\Support\Carbon;

class SiteAnalytics extends Component
{
    public $totalVisitors;
    public $todayVisitors;
    public $topCountries;
    public $visitsLast30Days;

    public function mount()
    {
        $this->totalVisitors = VisitorLog::count();
        $this->todayVisitors = VisitorLog::whereDate('visited_at', today())->count();
        $this->topCountries = VisitorLog::selectRaw('country, COUNT(*) as count')
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('count')
            ->limit(5)
            ->get();
        $this->visitsLast30Days = VisitorLog::selectRaw('DATE(visited_at) as date, COUNT(*) as count')
            ->where('visited_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.site-analytics', [
            'totalVisitors' => $this->totalVisitors,
            'todayVisitors' => $this->todayVisitors,
            'topCountries' => $this->topCountries,
            'visitsLast30Days' => $this->visitsLast30Days,
        ]);
    }
}
