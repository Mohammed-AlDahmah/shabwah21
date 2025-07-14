<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public function render()
    {
        $user = Auth::user();
        return view('livewire.admin.header', compact('user'));
    }
} 