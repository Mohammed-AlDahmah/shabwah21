<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Article;

class DashboardStats extends Component
{
    public $usersCount;
    public $postsCount;

    public function mount(): void
    {
        $this->refreshStats();
    }

    public function refreshStats(): void
    {
        $this->usersCount = User::count();
        $this->postsCount = Article::count();
    }

    protected $listeners = ['statsUpdated' => 'refreshStats'];

    public function render()
    {
        return view('livewire.admin.dashboard-stats');
    }
}