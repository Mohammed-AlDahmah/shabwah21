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
            $settings = SiteSettings::first();
            
            if ($settings) {
                $this->form = [
                    'site_name' => $settings->site_name ?? '',
                    'site_description' => $settings->site_description ?? '',
                    'site_keywords' => $settings->site_keywords ?? '',
                    'contact_email' => $settings->contact_email ?? '',
                    'contact_phone' => $settings->contact_phone ?? '',
                    'social_facebook' => $settings->social_facebook ?? '',
                    'social_twitter' => $settings->social_twitter ?? '',
                    'social_instagram' => $settings->social_instagram ?? '',
                    'social_youtube' => $settings->social_youtube ?? '',
                    'footer_text' => $settings->footer_text ?? '',
                    'analytics_code' => $settings->analytics_code ?? '',
                ];
            }
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
            $settings = SiteSettings::firstOrCreate([]);
            $settings->update($this->form);

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