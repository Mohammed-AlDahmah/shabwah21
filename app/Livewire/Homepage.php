<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteSettings;

class Homepage extends Component
{
    public $heroDescription;
    public $footerDescription;
    public $socialMediaLinks;
    public $contactInfo;

    public function mount()
    {
        $this->heroDescription = SiteSettings::getHeroDescription();
        $this->footerDescription = SiteSettings::getFooterDescription();
        $this->socialMediaLinks = SiteSettings::getSocialMediaLinks();
        $this->contactInfo = SiteSettings::getContactInfo();
    }

    public function render()
    {
        $videosPerPage = SiteSettings::getValue('videos_per_page', 6);
        $opinionArticlesPerPage = SiteSettings::getValue('opinion_articles_per_page', 4);
        return view('livewire.homepage', [
            'heroDescription' => $this->heroDescription,
            'footerDescription' => $this->footerDescription,
            'socialMediaLinks' => $this->socialMediaLinks,
            'contactInfo' => $this->contactInfo,
            'videosPerPage' => $videosPerPage,
            'opinionArticlesPerPage' => $opinionArticlesPerPage,
        ]);
    }
}
