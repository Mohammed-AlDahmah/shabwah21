<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ActivityLog;

class RecentActivities extends Component
{
    public function render()
    {
        $activities = ActivityLog::with('user')->latest()->take(10)->get();
        return view('livewire.admin.recent-activities', compact('activities'));
    }
}