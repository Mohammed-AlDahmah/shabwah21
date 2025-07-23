<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AboutPage;

class AboutManager extends Component
{
    public $about;
    public $values = [];
    public $services = [];
    public $stats = [];

    public function mount()
    {
        $this->about = AboutPage::first();
        if ($this->about) {
            $this->values = $this->about->values ?? [];
            $this->services = $this->about->services ?? [];
            $this->stats = $this->about->stats ?? [];
        }
    }

    public function save()
    {
        $data = $this->about->toArray();
        $data['values'] = $this->values;
        $data['services'] = $this->services;
        $data['stats'] = $this->stats;
        $this->about->update($data);
        session()->flash('success', 'تم حفظ التعديلات بنجاح!');
    }

    public function render()
    {
        return view('livewire.admin.about-manager');
    }
}
