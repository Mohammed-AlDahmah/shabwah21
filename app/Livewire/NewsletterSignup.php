<?php

namespace App\Livewire;

use Livewire\Component;

class NewsletterSignup extends Component
{
    public $email = '';
    public $message = '';
    public $isSubscribed = false;
    
    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email'
        ]);
        
        // Here you would typically save to a newsletter subscription table
        // For now, we'll just show a success message
        
        $this->isSubscribed = true;
        $this->message = 'تم الاشتراك بنجاح! سنرسل لك آخر الأخبار.';
        $this->email = '';
    }
    
    public function render()
    {
        return view('livewire.newsletter-signup');
    }
}