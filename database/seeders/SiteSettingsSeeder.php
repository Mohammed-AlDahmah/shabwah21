<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSettings;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // إعدادات عامة
            ['key' => 'site_name', 'value' => 'شبوة21', 'type' => 'text', 'description' => 'اسم الموقع'],
            ['key' => 'site_description', 'value' => 'موقع إخباري احترافي من شبوة', 'type' => 'text', 'description' => 'وصف الموقع'],
            ['key' => 'site_keywords', 'value' => 'أخبار, شبوة, اليمن', 'type' => 'text', 'description' => 'كلمات مفتاحية'],
            ['key' => 'contact_email', 'value' => 'info@shabwah21.com', 'type' => 'text', 'description' => 'البريد الإلكتروني'],
            ['key' => 'contact_phone', 'value' => '+967 777 123 456', 'type' => 'text', 'description' => 'رقم الهاتف'],
            ['key' => 'footer_text', 'value' => 'جميع الحقوق محفوظة © شبوة21', 'type' => 'text', 'description' => 'نص الفوتر'],
            ['key' => 'analytics_code', 'value' => '', 'type' => 'text', 'description' => 'كود التحليلات'],
            // إعدادات النافبار والواجهة
            ['key' => 'show_hero_section', 'value' => true, 'type' => 'boolean', 'description' => 'إظهار الهيرو'],
            ['key' => 'show_breaking_news', 'value' => true, 'type' => 'boolean', 'description' => 'إظهار الأخبار العاجلة'],
            ['key' => 'show_newsletter', 'value' => true, 'type' => 'boolean', 'description' => 'إظهار النشرة البريدية'],
            ['key' => 'show_video_in_nav', 'value' => true, 'type' => 'boolean', 'description' => 'إظهار الفيديو في القائمة'],
            ['key' => 'show_about_in_nav', 'value' => true, 'type' => 'boolean', 'description' => 'إظهار صفحة عن الموقع'],
            ['key' => 'show_contact_in_nav', 'value' => true, 'type' => 'boolean', 'description' => 'إظهار صفحة اتصل بنا'],
            ['key' => 'show_social_links_in_nav', 'value' => true, 'type' => 'boolean', 'description' => 'إظهار أيقونات التواصل'],
            // إعدادات عدد الفيديوهات ومقالات الرأي
            ['key' => 'videos_per_page', 'value' => 6, 'type' => 'number', 'description' => 'عدد الفيديوهات في الصفحة الرئيسية'],
            ['key' => 'opinion_articles_per_page', 'value' => 4, 'type' => 'number', 'description' => 'عدد مقالات الرأي في الصفحة الرئيسية'],
        ];

        foreach ($settings as $setting) {
            SiteSettings::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'type' => $setting['type'],
                    'description' => $setting['description']
                ]
            );
        }
    }
}
