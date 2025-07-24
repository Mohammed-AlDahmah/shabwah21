<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SiteSettings;

class SettingsTable extends Component
{
    public $isLoading = false;
    public $search = '';
    public $filterCategory = 'all';
    public $editingSetting = null;
    public $editingValue = '';

    public $categories = [
        'general' => 'الإعدادات العامة',
        'contact' => 'معلومات التواصل',
        'social' => 'التواصل الاجتماعي',
        'about' => 'من نحن',
        'display' => 'إعدادات العرض',
        'content' => 'المحتوى الإضافي',
    ];

    public $settings = [];

    public function mount()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        $this->isLoading = true;
        try {
            $this->settings = [
                // General Settings
                ['key' => 'site_name', 'value' => SiteSettings::getValue('site_name', 'شبوة21'), 'category' => 'general', 'type' => 'text', 'label' => 'اسم الموقع', 'description' => 'اسم الموقع كما يظهر في المتصفح'],
                ['key' => 'site_description', 'value' => SiteSettings::getValue('site_description', ''), 'category' => 'general', 'type' => 'textarea', 'label' => 'وصف الموقع', 'description' => 'وصف الموقع للبحث'],
                ['key' => 'site_keywords', 'value' => SiteSettings::getValue('site_keywords', ''), 'category' => 'general', 'type' => 'text', 'label' => 'الكلمات المفتاحية', 'description' => 'كلمات مفتاحية للموقع'],
                ['key' => 'site_logo', 'value' => SiteSettings::getValue('site_logo', ''), 'category' => 'general', 'type' => 'text', 'label' => 'رابط الشعار', 'description' => 'رابط شعار الموقع'],
                ['key' => 'site_favicon', 'value' => SiteSettings::getValue('site_favicon', ''), 'category' => 'general', 'type' => 'text', 'label' => 'رابط الأيقونة', 'description' => 'رابط أيقونة الموقع'],
                ['key' => 'footer_text', 'value' => SiteSettings::getValue('footer_text', ''), 'category' => 'general', 'type' => 'textarea', 'label' => 'نص التذييل', 'description' => 'نص يظهر في تذييل الصفحة'],
                ['key' => 'analytics_code', 'value' => SiteSettings::getValue('analytics_code', ''), 'category' => 'general', 'type' => 'textarea', 'label' => 'كود التحليلات', 'description' => 'كود Google Analytics أو أي كود تحليلات'],

                // Contact Settings
                ['key' => 'contact_email', 'value' => SiteSettings::getValue('contact_email', ''), 'category' => 'contact', 'type' => 'email', 'label' => 'البريد الإلكتروني', 'description' => 'البريد الإلكتروني للتواصل'],
                ['key' => 'contact_phone', 'value' => SiteSettings::getValue('contact_phone', ''), 'category' => 'contact', 'type' => 'text', 'label' => 'رقم الهاتف', 'description' => 'رقم الهاتف للتواصل'],
                ['key' => 'contact_address', 'value' => SiteSettings::getValue('contact_address', ''), 'category' => 'contact', 'type' => 'text', 'label' => 'العنوان', 'description' => 'عنوان الموقع'],
                ['key' => 'work_hours', 'value' => SiteSettings::getValue('work_hours', ''), 'category' => 'contact', 'type' => 'text', 'label' => 'ساعات العمل', 'description' => 'ساعات العمل'],
                ['key' => 'map_url', 'value' => SiteSettings::getValue('map_url', ''), 'category' => 'contact', 'type' => 'url', 'label' => 'رابط الخريطة', 'description' => 'رابط Google Maps'],

                // Social Media Settings
                ['key' => 'social_facebook', 'value' => SiteSettings::getValue('social_facebook', ''), 'category' => 'social', 'type' => 'url', 'label' => 'فيسبوك', 'description' => 'رابط صفحة فيسبوك'],
                ['key' => 'social_twitter', 'value' => SiteSettings::getValue('social_twitter', ''), 'category' => 'social', 'type' => 'url', 'label' => 'تويتر', 'description' => 'رابط حساب تويتر'],
                ['key' => 'social_instagram', 'value' => SiteSettings::getValue('social_instagram', ''), 'category' => 'social', 'type' => 'url', 'label' => 'إنستغرام', 'description' => 'رابط حساب إنستغرام'],
                ['key' => 'social_youtube', 'value' => SiteSettings::getValue('social_youtube', ''), 'category' => 'social', 'type' => 'url', 'label' => 'يوتيوب', 'description' => 'رابط قناة يوتيوب'],
                ['key' => 'social_telegram', 'value' => SiteSettings::getValue('social_telegram', ''), 'category' => 'social', 'type' => 'url', 'label' => 'تليجرام', 'description' => 'رابط قناة تليجرام'],
                ['key' => 'social_whatsapp', 'value' => SiteSettings::getValue('social_whatsapp', ''), 'category' => 'social', 'type' => 'text', 'label' => 'واتساب', 'description' => 'رقم واتساب'],

                // About Settings
                ['key' => 'about_title', 'value' => SiteSettings::getValue('about_title', ''), 'category' => 'about', 'type' => 'text', 'label' => 'عنوان من نحن', 'description' => 'عنوان صفحة من نحن'],
                ['key' => 'about_subtitle', 'value' => SiteSettings::getValue('about_subtitle', ''), 'category' => 'about', 'type' => 'text', 'label' => 'الوصف المختصر', 'description' => 'وصف مختصر لمن نحن'],
                ['key' => 'about_vision', 'value' => SiteSettings::getValue('about_vision', ''), 'category' => 'about', 'type' => 'textarea', 'label' => 'الرؤية', 'description' => 'رؤية الموقع'],
                ['key' => 'about_mission', 'value' => SiteSettings::getValue('about_mission', ''), 'category' => 'about', 'type' => 'textarea', 'label' => 'الرسالة', 'description' => 'رسالة الموقع'],
                ['key' => 'about_description', 'value' => SiteSettings::getValue('about_description', ''), 'category' => 'about', 'type' => 'textarea', 'label' => 'الوصف التفصيلي', 'description' => 'وصف تفصيلي عن الموقع'],

                // Display Settings
                ['key' => 'show_hero_section', 'value' => SiteSettings::getValue('show_hero_section', true), 'category' => 'display', 'type' => 'boolean', 'label' => 'إظهار قسم البطل', 'description' => 'إظهار أو إخفاء قسم البطل'],
                ['key' => 'show_breaking_news', 'value' => SiteSettings::getValue('show_breaking_news', true), 'category' => 'display', 'type' => 'boolean', 'label' => 'إظهار الأخبار العاجلة', 'description' => 'إظهار أو إخفاء الأخبار العاجلة'],
                ['key' => 'show_newsletter', 'value' => SiteSettings::getValue('show_newsletter', true), 'category' => 'display', 'type' => 'boolean', 'label' => 'إظهار النشرة الإخبارية', 'description' => 'إظهار أو إخفاء النشرة الإخبارية'],
                ['key' => 'show_video_in_nav', 'value' => SiteSettings::getValue('show_video_in_nav', true), 'category' => 'display', 'type' => 'boolean', 'label' => 'إظهار الفيديو في القائمة', 'description' => 'إظهار أو إخفاء الفيديو في القائمة'],
                ['key' => 'show_about_in_nav', 'value' => SiteSettings::getValue('show_about_in_nav', true), 'category' => 'display', 'type' => 'boolean', 'label' => 'إظهار من نحن في القائمة', 'description' => 'إظهار أو إخفاء من نحن في القائمة'],
                ['key' => 'show_contact_in_nav', 'value' => SiteSettings::getValue('show_contact_in_nav', true), 'category' => 'display', 'type' => 'boolean', 'label' => 'إظهار اتصل بنا في القائمة', 'description' => 'إظهار أو إخفاء اتصل بنا في القائمة'],
                ['key' => 'show_social_links_in_nav', 'value' => SiteSettings::getValue('show_social_links_in_nav', true), 'category' => 'display', 'type' => 'boolean', 'label' => 'إظهار روابط التواصل في القائمة', 'description' => 'إظهار أو إخفاء روابط التواصل في القائمة'],
            ];
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في التحميل',
                'message' => 'حدث خطأ أثناء تحميل الإعدادات'
            ]);
        }
        $this->isLoading = false;
    }

    public function editSetting($key)
    {
        $setting = collect($this->settings)->firstWhere('key', $key);
        if ($setting) {
            $this->editingSetting = $key;
            $this->editingValue = $setting['value'];
        }
    }

    public function saveSetting()
    {
        if ($this->editingSetting) {
            try {
                SiteSettings::setValue($this->editingSetting, $this->editingValue);
                
                // Update the setting in the array
                $index = collect($this->settings)->search(function ($item) {
                    return $item['key'] === $this->editingSetting;
                });
                
                if ($index !== false) {
                    $this->settings[$index]['value'] = $this->editingValue;
                }

                $this->dispatch('showToast', [
                    'type' => 'success',
                    'title' => 'تم الحفظ بنجاح',
                    'message' => 'تم حفظ جميع الإعدادات بنجاح'
                ]);

                $this->editingSetting = null;
                $this->editingValue = '';
            } catch (\Exception $e) {
                $this->dispatch('showToast', [
                    'type' => 'error',
                    'title' => 'خطأ في الحفظ',
                    'message' => 'حدث خطأ أثناء حفظ الإعداد'
                ]);
            }
        }
    }

    public function cancelEdit()
    {
        $this->editingSetting = null;
        $this->editingValue = '';
    }

    public function getFilteredSettings()
    {
        $settings = collect($this->settings);

        if ($this->filterCategory !== 'all') {
            $settings = $settings->where('category', $this->filterCategory);
        }

        if ($this->search) {
            $settings = $settings->filter(function ($setting) {
                return str_contains(strtolower($setting['label']), strtolower($this->search)) ||
                       str_contains(strtolower($setting['description']), strtolower($this->search));
            });
        }

        return $settings;
    }

    public function render()
    {
        $filteredSettings = $this->getFilteredSettings();
        
        return view('livewire.admin.settings-table', [
            'filteredSettings' => $filteredSettings
        ]);
    }
} 