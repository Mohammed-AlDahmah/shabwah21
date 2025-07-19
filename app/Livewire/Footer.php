<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteSettings;

class Footer extends Component
{
    public $footerDescription;
    public $socialMediaLinks;
    public $contactInfo;
    public $privacyPolicy;
    public $termsOfService;

    public function mount()
    {
        $this->footerDescription = SiteSettings::getFooterDescription();
        $this->socialMediaLinks = SiteSettings::getSocialMediaLinks();
        $this->contactInfo = SiteSettings::getContactInfo();
        $this->privacyPolicy = SiteSettings::getPrivacyPolicy();
        $this->termsOfService = SiteSettings::getTermsOfService();
    }

    public function render()
    {
        return view('livewire.footer', [
            'footerDescription' => $this->footerDescription,
            'socialMediaLinks' => $this->socialMediaLinks,
            'contactInfo' => $this->contactInfo,
            'privacyPolicy' => $this->privacyPolicy,
            'termsOfService' => $this->termsOfService
        ]);
    }
}
