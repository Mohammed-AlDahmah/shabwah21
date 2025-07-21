<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SiteSettings;

class SettingsManager extends Component
{
    public $isLoading = false;

    // Form fields
    public $form = [
        'site_name' => '',
        'site_description' => '',
        'site_keywords' => '',
        'contact_email' => '',
        'contact_phone' => '',
        'social_facebook' => '',
        'social_twitter' => '',
        'social_instagram' => '',
        'social_youtube' => '',
        'footer_text' => '',
        'analytics_code' => '',
        // Navbar & Home (as key/value)
        'show_hero_section' => true,
        'show_breaking_news' => true,
        'show_newsletter' => true,
        'show_video_in_nav' => true,
        'show_about_in_nav' => true,
        'show_contact_in_nav' => true,
        'show_social_links_in_nav' => true,
    ];

    protected $rules = [
        'form.site_name' => 'required|string|max:255',
        'form.site_description' => 'nullable|string|max:500',
        'form.site_keywords' => 'nullable|string|max:500',
        'form.contact_email' => 'nullable|email',
        'form.contact_phone' => 'nullable|string|max:20',
        'form.social_facebook' => 'nullable|url',
        'form.social_twitter' => 'nullable|url',
        'form.social_instagram' => 'nullable|url',
        'form.social_youtube' => 'nullable|url',
        'form.footer_text' => 'nullable|string|max:500',
        'form.analytics_code' => 'nullable|string',
        // Navbar & Home
        'form.show_hero_section' => 'boolean',
        'form.show_breaking_news' => 'boolean',
        'form.show_newsletter' => 'boolean',
        'form.show_video_in_nav' => 'boolean',
        'form.show_about_in_nav' => 'boolean',
        'form.show_contact_in_nav' => 'boolean',
        'form.show_social_links_in_nav' => 'boolean',
    ];

    protected $listeners = [
        'closeModal' => 'closeModal',
    ];

    public function mount()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        $this->isLoading = true;
        try {
            $this->form['site_name'] = \App\Models\SiteSettings::getValue('site_name', '');
            $this->form['site_description'] = \App\Models\SiteSettings::getValue('site_description', '');
            $this->form['site_keywords'] = \App\Models\SiteSettings::getValue('site_keywords', '');
            $this->form['contact_email'] = \App\Models\SiteSettings::getValue('contact_email', '');
            $this->form['contact_phone'] = \App\Models\SiteSettings::getValue('contact_phone', '');
            $this->form['social_facebook'] = \App\Models\SiteSettings::getValue('social_facebook', '');
            $this->form['social_twitter'] = \App\Models\SiteSettings::getValue('social_twitter', '');
            $this->form['social_instagram'] = \App\Models\SiteSettings::getValue('social_instagram', '');
            $this->form['social_youtube'] = \App\Models\SiteSettings::getValue('social_youtube', '');
            $this->form['footer_text'] = \App\Models\SiteSettings::getValue('footer_text', '');
            $this->form['analytics_code'] = \App\Models\SiteSettings::getValue('analytics_code', '');
            // Navbar & Home
            $this->form['show_hero_section'] = (bool) \App\Models\SiteSettings::getValue('show_hero_section', true);
            $this->form['show_breaking_news'] = (bool) \App\Models\SiteSettings::getValue('show_breaking_news', true);
            $this->form['show_newsletter'] = (bool) \App\Models\SiteSettings::getValue('show_newsletter', true);
            $this->form['show_video_in_nav'] = (bool) \App\Models\SiteSettings::getValue('show_video_in_nav', true);
            $this->form['show_about_in_nav'] = (bool) \App\Models\SiteSettings::getValue('show_about_in_nav', true);
            $this->form['show_contact_in_nav'] = (bool) \App\Models\SiteSettings::getValue('show_contact_in_nav', true);
            $this->form['show_social_links_in_nav'] = (bool) \App\Models\SiteSettings::getValue('show_social_links_in_nav', true);
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في التحميل',
                'message' => 'حدث خطأ أثناء تحميل الإعدادات'
            ]);
        }
        $this->isLoading = false;
    }

    public function saveSettings()
    {
        $this->validate();
        $this->isLoading = true;
        try {
            foreach ($this->form as $key => $value) {
                \App\Models\SiteSettings::setValue($key, $value);
            }
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحفظ بنجاح',
                'message' => 'تم حفظ الإعدادات بنجاح'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في الحفظ',
                'message' => 'حدث خطأ أثناء حفظ الإعدادات'
            ]);
        }
        $this->isLoading = false;
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