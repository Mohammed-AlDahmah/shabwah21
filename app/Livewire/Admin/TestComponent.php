<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class TestComponent extends Component
{
    public $message = 'Hello World!';

    public function testClick()
    {
        $this->message = 'Button clicked!';
    }

    public function render()
    {
        return view('livewire.admin.test-component');
    }
} 