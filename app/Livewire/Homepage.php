<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\SiteSettings;

class Homepage extends Component
{
    public $siteSettings;
    public $aboutInfo;
    public $contactInfo;
    public $socialLinks;

    public function mount()
    {
        // تحميل إعدادات الموقع
        $this->siteSettings = [
            'site_name' => SiteSettings::getValue('site_name', 'شبوة21'),
            'site_description' => SiteSettings::getValue('site_description', ''),
            'show_hero_section' => (bool) SiteSettings::getValue('show_hero_section', true),
            'show_breaking_news' => (bool) SiteSettings::getValue('show_breaking_news', true),
            'show_newsletter' => (bool) SiteSettings::getValue('show_newsletter', true),
        ];

        // تحميل معلومات من نحن
        $this->aboutInfo = [
            'title' => SiteSettings::getValue('about_title', 'من نحن'),
            'subtitle' => SiteSettings::getValue('about_subtitle', ''),
            'vision' => SiteSettings::getValue('about_vision', ''),
            'mission' => SiteSettings::getValue('about_mission', ''),
            'description' => SiteSettings::getValue('about_description', ''),
            'values' => SiteSettings::getValue('values', []),
            'services' => SiteSettings::getValue('services', []),
            'stats' => SiteSettings::getValue('stats', []),
        ];

        // تحميل معلومات التواصل
        $this->contactInfo = [
            'email' => SiteSettings::getValue('contact_email', ''),
            'phone' => SiteSettings::getValue('contact_phone', ''),
            'address' => SiteSettings::getValue('contact_address', ''),
            'work_hours' => SiteSettings::getValue('work_hours', ''),
            'map_url' => SiteSettings::getValue('map_url', ''),
        ];

        // تحميل روابط التواصل الاجتماعي
        $this->socialLinks = [
            'facebook' => SiteSettings::getValue('social_facebook', ''),
            'twitter' => SiteSettings::getValue('social_twitter', ''),
            'instagram' => SiteSettings::getValue('social_instagram', ''),
            'youtube' => SiteSettings::getValue('social_youtube', ''),
            'telegram' => SiteSettings::getValue('social_telegram', ''),
            'whatsapp' => SiteSettings::getValue('social_whatsapp', ''),
        ];
    }

    public function render()
    {
        $news = Article::news()->latest()->take(6)->get();
        $reports = Article::reports()->latest()->take(4)->get();
        $articles = Article::articles()->latest()->take(4)->get();
        $infographics = Article::infographics()->latest()->take(4)->get();
        $breakingNews = Article::breaking()->latest()->take(5)->get();
        $featuredNews = Article::featured()->latest()->take(3)->get();
        $popularNews = Article::published()->orderBy('views_count', 'desc')->take(5)->get();
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('livewire.homepage', compact(
            'news', 'reports', 'articles', 'infographics', 
            'breakingNews', 'featuredNews', 'popularNews', 'categories'
        ));
    }
}
