<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSettings;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'hero_description',
                'value' => 'منبرك الأول للأخبار الصادقة والتحليلات العميقة من قلب محافظة شبوة. نقدم لكم آخر الأخبار والتقارير والتحليلات السياسية والاقتصادية والاجتماعية.',
                'type' => 'text',
                'description' => 'وصف منطقة الهيرو الرئيسية'
            ],
            [
                'key' => 'footer_description',
                'value' => 'موقع إخباري شامل يغطي آخر المستجدات في محافظة شبوة واليمن والعالم العربي، برسالة مهنية وحيادية وموضوعية. نقدم لكم الأخبار العاجلة والتحليلات العميقة.',
                'type' => 'text',
                'description' => 'وصف الفوتر'
            ],
            [
                'key' => 'privacy_policy',
                'value' => 'سياسة الخصوصية الخاصة بموقع شبوة 21 - نحن نحترم خصوصيتك ونلتزم بحماية بياناتك الشخصية.',
                'type' => 'text',
                'description' => 'سياسة الخصوصية'
            ],
            [
                'key' => 'terms_of_service',
                'value' => 'شروط الاستخدام الخاصة بموقع شبوة 21 - يرجى قراءة هذه الشروط بعناية قبل استخدام الموقع.',
                'type' => 'text',
                'description' => 'شروط الاستخدام'
            ],
            [
                'key' => 'social_media_links',
                'value' => [
                    'facebook' => 'https://facebook.com/shabwah21',
                    'twitter' => 'https://twitter.com/shabwah21',
                    'instagram' => 'https://instagram.com/shabwah21',
                    'youtube' => 'https://youtube.com/shabwah21',
                    'telegram' => 'https://t.me/shabwah21',
                    'linkedin' => 'https://linkedin.com/company/shabwah21'
                ],
                'type' => 'json',
                'description' => 'روابط وسائل التواصل الاجتماعي'
            ],
            [
                'key' => 'contact_info',
                'value' => [
                    'email' => 'info@shabwah21.com',
                    'phone' => '+967 123 456 789',
                    'address' => 'محافظة شبوة، اليمن',
                    'working_hours' => 'الأحد - الخميس: 8:00 ص - 6:00 م'
                ],
                'type' => 'json',
                'description' => 'معلومات الاتصال'
            ]
        ];

        foreach ($settings as $setting) {
            SiteSettings::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
