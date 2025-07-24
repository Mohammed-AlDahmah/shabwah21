<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SiteSettings;
use App\Models\AboutPage;
use App\Models\ContactPage;
use Illuminate\Support\Facades\Log;

class SettingsManager extends Component
{
    public $isLoading = false;
    public $activeTab = 'general';

    // Form fields - General Settings
    public $general = [
        'site_name' => '',
        'site_description' => '',
        'site_keywords' => '',
        'site_logo' => '',
        'site_favicon' => '',
        'footer_text' => '',
        'analytics_code' => '',
    ];

    // Contact Settings
    public $contact = [
        'contact_email' => '',
        'contact_phone' => '',
        'contact_address' => '',
        'work_hours' => '',
        'map_url' => '',
    ];

    // Social Media Settings
    public $social = [
        'social_facebook' => '',
        'social_twitter' => '',
        'social_instagram' => '',
        'social_youtube' => '',
        'social_telegram' => '',
        'social_whatsapp' => '',
    ];

    // About Settings
    public $about = [
        'about_title' => '',
        'about_subtitle' => '',
        'about_vision' => '',
        'about_mission' => '',
        'about_description' => '',
    ];

    // Display Settings
    public $display = [
        'show_hero_section' => true,
        'show_breaking_news' => true,
        'show_newsletter' => true,
        'show_video_in_nav' => true,
        'show_about_in_nav' => true,
        'show_contact_in_nav' => true,
        'show_social_links_in_nav' => true,
    ];

    // Content Settings
    public $values = [];
    public $services = [];
    public $stats = [];
    public $faq = [];

    // Homepage Settings
    public $homepage = [
        'opinion_articles_per_page' => 4,
        'videos_per_page' => 6,
    ];

    protected $rules = [
        'general.site_name' => 'required|string|max:255',
        'general.site_description' => 'nullable|string|max:500',
        'general.site_keywords' => 'nullable|string|max:500',
        'contact.contact_email' => 'nullable|email',
        'contact.contact_phone' => 'nullable|string|max:20',
        'contact.contact_address' => 'nullable|string|max:500',
        'contact.work_hours' => 'nullable|string|max:100',
        'contact.map_url' => 'nullable|string',
        'social.social_facebook' => 'nullable|url',
        'social.social_twitter' => 'nullable|url',
        'social.social_instagram' => 'nullable|url',
        'social.social_youtube' => 'nullable|url',
        'social.social_telegram' => 'nullable|url',
        'social.social_whatsapp' => 'nullable|string',
        'about.about_title' => 'nullable|string|max:255',
        'about.about_subtitle' => 'nullable|string|max:500',
        'about.about_vision' => 'nullable|string',
        'about.about_mission' => 'nullable|string',
        'about.about_description' => 'nullable|string',
        'general.footer_text' => 'nullable|string|max:500',
        'general.analytics_code' => 'nullable|string',
        'homepage.opinion_articles_per_page' => 'required|integer|min:1|max:20',
        'homepage.videos_per_page' => 'required|integer|min:1|max:20',
    ];

    protected $listeners = [
        'closeModal' => 'closeModal',
        'switchTab' => 'switchTab',
    ];

    public function mount()
    {
        $this->loadAllSettings();
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function loadAllSettings()
    {
        $this->isLoading = true;
        try {
            // Load General Settings
            $this->general['site_name'] = SiteSettings::getValue('site_name', 'شبوة21');
            $this->general['site_description'] = SiteSettings::getValue('site_description', '');
            $this->general['site_keywords'] = SiteSettings::getValue('site_keywords', '');
            $this->general['site_logo'] = SiteSettings::getValue('site_logo', '');
            $this->general['site_favicon'] = SiteSettings::getValue('site_favicon', '');
            $this->general['footer_text'] = SiteSettings::getValue('footer_text', '');
            $this->general['analytics_code'] = SiteSettings::getValue('analytics_code', '');

            // Load Contact Settings
            $this->contact['contact_email'] = SiteSettings::getValue('contact_email', '');
            $this->contact['contact_phone'] = SiteSettings::getValue('contact_phone', '');
            $this->contact['contact_address'] = SiteSettings::getValue('contact_address', '');
            $this->contact['work_hours'] = SiteSettings::getValue('work_hours', '');
            $this->contact['map_url'] = SiteSettings::getValue('map_url', '');

            // Load Social Media Settings
            $this->social['social_facebook'] = SiteSettings::getValue('social_facebook', '');
            $this->social['social_twitter'] = SiteSettings::getValue('social_twitter', '');
            $this->social['social_instagram'] = SiteSettings::getValue('social_instagram', '');
            $this->social['social_youtube'] = SiteSettings::getValue('social_youtube', '');
            $this->social['social_telegram'] = SiteSettings::getValue('social_telegram', '');
            $this->social['social_whatsapp'] = SiteSettings::getValue('social_whatsapp', '');

            // Load About Settings
            $this->about['about_title'] = SiteSettings::getValue('about_title', '');
            $this->about['about_subtitle'] = SiteSettings::getValue('about_subtitle', '');
            $this->about['about_vision'] = SiteSettings::getValue('about_vision', '');
            $this->about['about_mission'] = SiteSettings::getValue('about_mission', '');
            $this->about['about_description'] = SiteSettings::getValue('about_description', '');

            // Load Display Settings
            $this->display['show_hero_section'] = (bool) SiteSettings::getValue('show_hero_section', true);
            $this->display['show_breaking_news'] = (bool) SiteSettings::getValue('show_breaking_news', true);
            $this->display['show_newsletter'] = (bool) SiteSettings::getValue('show_newsletter', true);
            $this->display['show_video_in_nav'] = (bool) SiteSettings::getValue('show_video_in_nav', true);
            $this->display['show_about_in_nav'] = (bool) SiteSettings::getValue('show_about_in_nav', true);
            $this->display['show_contact_in_nav'] = (bool) SiteSettings::getValue('show_contact_in_nav', true);
            $this->display['show_social_links_in_nav'] = (bool) SiteSettings::getValue('show_social_links_in_nav', true);

            // Load Content Settings
            $this->values = SiteSettings::getValue('values', []);
            $this->services = SiteSettings::getValue('services', []);
            $this->stats = SiteSettings::getValue('stats', []);
            $this->faq = SiteSettings::getValue('faq', []);

            // Load Homepage Settings
            $this->homepage['opinion_articles_per_page'] = (int) SiteSettings::getValue('opinion_articles_per_page', 4);
            $this->homepage['videos_per_page'] = (int) SiteSettings::getValue('videos_per_page', 6);

        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في التحميل',
                'message' => 'حدث خطأ أثناء تحميل الإعدادات'
            ]);
        }
        $this->isLoading = false;
    }

    public function saveAllSettings()
    {
        Log::info('saveAllSettings called', ['user' => auth()->id()]);
        $this->validate();
        Log::info('saveAllSettings after validate', ['user' => auth()->id()]);
        $this->isLoading = true;
        try {
            // Save General Settings
            foreach ($this->general as $key => $value) {
                SiteSettings::setValue($key, $value);
            }

            // Save Contact Settings
            foreach ($this->contact as $key => $value) {
                SiteSettings::setValue($key, $value);
            }

            // Save Social Media Settings
            foreach ($this->social as $key => $value) {
                SiteSettings::setValue($key, $value);
            }

            // Save About Settings
            foreach ($this->about as $key => $value) {
                SiteSettings::setValue($key, $value);
            }

            // Save Display Settings
            foreach ($this->display as $key => $value) {
                SiteSettings::setValue($key, $value);
            }

            // Save Content Settings
            SiteSettings::setValue('values', $this->values);
            SiteSettings::setValue('services', $this->services);
            SiteSettings::setValue('stats', $this->stats);
            SiteSettings::setValue('faq', $this->faq);

            // Save Homepage Settings
            foreach ($this->homepage as $key => $value) {
                SiteSettings::setValue($key, $value);
            }

            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحفظ بنجاح',
                'message' => 'تم حفظ جميع الإعدادات بنجاح'
            ]);
        } catch (\Exception $e) {
            Log::error('saveAllSettings error', ['error' => $e->getMessage()]);
            $this->isLoading = false;
        }
        $this->isLoading = false;
        Log::info('saveAllSettings finished', ['user' => auth()->id()]);
    }

    // Content Management Methods
    public function addValue()
    {
        $this->values[] = ['title' => '', 'description' => '', 'icon' => ''];
    }

    public function removeValue($index)
    {
        unset($this->values[$index]);
        $this->values = array_values($this->values);
    }

    public function addService()
    {
        $this->services[] = ['title' => '', 'description' => '', 'icon' => ''];
    }

    public function removeService($index)
    {
        unset($this->services[$index]);
        $this->services = array_values($this->services);
    }

    public function addStat()
    {
        $this->stats[] = ['title' => '', 'value' => '', 'icon' => ''];
    }

    public function removeStat($index)
    {
        unset($this->stats[$index]);
        $this->stats = array_values($this->stats);
    }

    public function addFaq()
    {
        $this->faq[] = ['question' => '', 'answer' => ''];
    }

    public function removeFaq($index)
    {
        unset($this->faq[$index]);
        $this->faq = array_values($this->faq);
    }

    public function resetSettings()
    {
        $this->dispatch('confirmDelete', ['name' => 'settings']);
    }

    public function closeModal()
    {
        // This method is here for consistency with other components
    }

    public function render()
    {
        return view('livewire.admin.settings-manager');
    }
} 