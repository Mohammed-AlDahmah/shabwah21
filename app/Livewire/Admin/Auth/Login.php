<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            Session::regenerate();
            return redirect()->intended(route('admin.dashboard'));
        } else {
            $this->addError('email', 'بيانات الدخول غير صحيحة');
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.login')->layout('layouts.app');
    }
}
