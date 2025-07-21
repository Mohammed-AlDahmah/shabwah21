<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SiteSettings;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        // جلب الأقسام الرئيسية (التي ليس لها أب)
        $mainCategories = Category::where('is_active', true)
            ->where('show_in_nav', true)
            ->whereNull('parent_id')
            ->with(['children' => function($query) {
                $query->where('is_active', true)
                      ->where('show_in_nav', true)
                      ->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->get();

        // جلب جميع الأقسام للبحث
        $allCategories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // جلب الإعدادات كقيم منفصلة
        $showVideo = SiteSettings::getValue('show_video_in_nav', true);
        $showAbout = SiteSettings::getValue('show_about_in_nav', true);
        $showContact = SiteSettings::getValue('show_contact_in_nav', true);
        $showSocial = SiteSettings::getValue('show_social_links_in_nav', true);

        return view('livewire.header', compact('mainCategories', 'allCategories', 'showVideo', 'showAbout', 'showContact', 'showSocial'));
    }
}
