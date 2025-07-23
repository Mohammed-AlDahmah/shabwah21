<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ContactPage;

class ContactManager extends Component
{
    public $contact;
    public $contact_info = [];
    public $social_links = [];
    public $faq = [];

    public function mount()
    {
        $this->contact = ContactPage::first();
        if ($this->contact) {
            $this->contact_info = $this->contact->contact_info ?? [];
            $this->social_links = $this->contact->social_links ?? [];
            $this->faq = $this->contact->faq ?? [];
        }
    }

    public function save()
    {
        $data = $this->contact->toArray();
        $data['contact_info'] = $this->contact_info;
        $data['social_links'] = $this->social_links;
        $data['faq'] = $this->faq;
        $this->contact->update($data);
        session()->flash('success', 'تم حفظ التعديلات بنجاح!');
    }

    public function render()
    {
        return view('livewire.admin.contact-manager');
    }
}
