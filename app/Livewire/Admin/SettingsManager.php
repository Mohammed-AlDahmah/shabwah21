<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SiteSettings;
use App\Models\AboutPage;
use App\Models\ContactPage;

class SettingsManager extends Component
{
    public $isLoading = false;

    // Form fields
    public $form = [
        // معلومات الموقع الأساسية
        'site_name' => '',
        'site_description' => '',
        'site_keywords' => '',
        'site_logo' => '',
        'site_favicon' => '',
        
        // معلومات التواصل الأساسية
        'contact_email' => '',
        'contact_phone' => '',
        'contact_address' => '',
        'work_hours' => '',
        'map_url' => '',
        
        // روابط التواصل الاجتماعي
        'social_facebook' => '',
        'social_twitter' => '',
        'social_instagram' => '',
        'social_youtube' => '',
        'social_telegram' => '',
        'social_whatsapp' => '',
        
        // معلومات من نحن
        'about_title' => '',
        'about_subtitle' => '',
        'about_vision' => '',
        'about_mission' => '',
        'about_description' => '',
        
        // إعدادات العرض
        'footer_text' => '',
        'analytics_code' => '',
        'show_hero_section' => true,
        'show_breaking_news' => true,
        'show_newsletter' => true,
        'show_video_in_nav' => true,
        'show_about_in_nav' => true,
        'show_contact_in_nav' => true,
        'show_social_links_in_nav' => true,
    ];

    // معلومات إضافية (قيم، خدمات، إحصائيات)
    public $values = [];
    public $services = [];
    public $stats = [];
    public $social_links = [];
    public $faq = [];

    protected $rules = [
        'form.site_name' => 'required|string|max:255',
        'form.site_description' => 'nullable|string|max:500',
        'form.site_keywords' => 'nullable|string|max:500',
        'form.contact_email' => 'nullable|email',
        'form.contact_phone' => 'nullable|string|max:20',
        'form.contact_address' => 'nullable|string|max:500',
        'form.work_hours' => 'nullable|string|max:100',
        'form.map_url' => 'nullable|url',
        'form.social_facebook' => 'nullable|url',
        'form.social_twitter' => 'nullable|url',
        'form.social_instagram' => 'nullable|url',
        'form.social_youtube' => 'nullable|url',
        'form.social_telegram' => 'nullable|url',
        'form.social_whatsapp' => 'nullable|string',
        'form.about_title' => 'nullable|string|max:255',
        'form.about_subtitle' => 'nullable|string|max:500',
        'form.about_vision' => 'nullable|string',
        'form.about_mission' => 'nullable|string',
        'form.about_description' => 'nullable|string',
        'form.footer_text' => 'nullable|string|max:500',
        'form.analytics_code' => 'nullable|string',
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
            // تحميل إعدادات الموقع الأساسية
            $this->form['site_name'] = SiteSettings::getValue('site_name', 'شبوة21');
            $this->form['site_description'] = SiteSettings::getValue('site_description', '');
            $this->form['site_keywords'] = SiteSettings::getValue('site_keywords', '');
            $this->form['site_logo'] = SiteSettings::getValue('site_logo', '');
            $this->form['site_favicon'] = SiteSettings::getValue('site_favicon', '');
            
            // تحميل معلومات التواصل
            $this->form['contact_email'] = SiteSettings::getValue('contact_email', '');
            $this->form['contact_phone'] = SiteSettings::getValue('contact_phone', '');
            $this->form['contact_address'] = SiteSettings::getValue('contact_address', '');
            $this->form['work_hours'] = SiteSettings::getValue('work_hours', '');
            $this->form['map_url'] = SiteSettings::getValue('map_url', '');
            
            // تحميل روابط التواصل الاجتماعي
            $this->form['social_facebook'] = SiteSettings::getValue('social_facebook', '');
            $this->form['social_twitter'] = SiteSettings::getValue('social_twitter', '');
            $this->form['social_instagram'] = SiteSettings::getValue('social_instagram', '');
            $this->form['social_youtube'] = SiteSettings::getValue('social_youtube', '');
            $this->form['social_telegram'] = SiteSettings::getValue('social_telegram', '');
            $this->form['social_whatsapp'] = SiteSettings::getValue('social_whatsapp', '');
            
            // تحميل معلومات من نحن
            $this->form['about_title'] = SiteSettings::getValue('about_title', '');
            $this->form['about_subtitle'] = SiteSettings::getValue('about_subtitle', '');
            $this->form['about_vision'] = SiteSettings::getValue('about_vision', '');
            $this->form['about_mission'] = SiteSettings::getValue('about_mission', '');
            $this->form['about_description'] = SiteSettings::getValue('about_description', '');
            
            // تحميل إعدادات العرض
            $this->form['footer_text'] = SiteSettings::getValue('footer_text', '');
            $this->form['analytics_code'] = SiteSettings::getValue('analytics_code', '');
            $this->form['show_hero_section'] = (bool) SiteSettings::getValue('show_hero_section', true);
            $this->form['show_breaking_news'] = (bool) SiteSettings::getValue('show_breaking_news', true);
            $this->form['show_newsletter'] = (bool) SiteSettings::getValue('show_newsletter', true);
            $this->form['show_video_in_nav'] = (bool) SiteSettings::getValue('show_video_in_nav', true);
            $this->form['show_about_in_nav'] = (bool) SiteSettings::getValue('show_about_in_nav', true);
            $this->form['show_contact_in_nav'] = (bool) SiteSettings::getValue('show_contact_in_nav', true);
            $this->form['show_social_links_in_nav'] = (bool) SiteSettings::getValue('show_social_links_in_nav', true);
            
            // تحميل البيانات الإضافية
            $this->values = SiteSettings::getValue('values', []);
            $this->services = SiteSettings::getValue('services', []);
            $this->stats = SiteSettings::getValue('stats', []);
            $this->social_links = SiteSettings::getValue('social_links', []);
            $this->faq = SiteSettings::getValue('faq', []);
            
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
            // حفظ الإعدادات الأساسية
            foreach ($this->form as $key => $value) {
                SiteSettings::setValue($key, $value);
            }
            
            // حفظ البيانات الإضافية
            SiteSettings::setValue('values', $this->values);
            SiteSettings::setValue('services', $this->services);
            SiteSettings::setValue('stats', $this->stats);
            SiteSettings::setValue('social_links', $this->social_links);
            SiteSettings::setValue('faq', $this->faq);
            
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحفظ بنجاح',
                'message' => 'تم حفظ جميع الإعدادات بنجاح'
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

    public function addSocialLink()
    {
        $this->social_links[] = ['icon' => '', 'url' => '', 'title' => ''];
    }

    public function removeSocialLink($index)
    {
        unset($this->social_links[$index]);
        $this->social_links = array_values($this->social_links);
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