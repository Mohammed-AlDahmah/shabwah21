<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $loginAttempts = 0;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.exists' => 'البريد الإلكتروني غير مسجل في النظام',
    ];

    public function mount()
    {
        $this->loginAttempts = RateLimiter::attempts($this->throttleKey());
    }

    public function login()
    {
        $this->validate();

        // Throttle login attempts
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $this->addError('email', 'لقد تجاوزت عدد المحاولات المسموح بها. يرجى المحاولة لاحقاً.');
            return;
        }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::clear($this->throttleKey());
            Session::regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        RateLimiter::hit($this->throttleKey());
        $this->loginAttempts++;
        $this->addError('email', 'بيانات الدخول غير صحيحة');
    }

    protected function throttleKey()
    {
        return 'login-attempt-'.request()->ip();
    }

    public function render()
    {
        return view('livewire.admin.auth.login')
            ->layout('layouts.app');
    }
}