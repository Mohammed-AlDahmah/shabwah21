<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSettings;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        // معلومات الموقع الأساسية
        SiteSettings::setValue('site_name', 'شبوة21');
        SiteSettings::setValue('site_description', 'موقع شبوة21 الإخباري - آخر الأخبار والتقارير من حضرموت واليمن، نقدم أخبار دقيقة ومصدوقة مع التركيز على الأحداث المحلية والإقليمية.');
        SiteSettings::setValue('site_keywords', 'أخبار, حضرموت, اليمن, إخبارية, شبوة, عدن, المكلا, سيئون');
        SiteSettings::setValue('site_logo', '/images/logo.png');
        SiteSettings::setValue('site_favicon', '/favicon.ico');

        // معلومات التواصل
        SiteSettings::setValue('contact_email', 'info@shabwah21.com');
        SiteSettings::setValue('contact_phone', '+967 777 123 456');
        SiteSettings::setValue('contact_address', 'المكلا، حضرموت، اليمن');
        SiteSettings::setValue('work_hours', 'الأحد - الخميس: 8:00 ص - 5:00 م');
        SiteSettings::setValue('map_url', 'https://maps.google.com/?q=المكلا،+حضرموت،+اليمن');

        // روابط التواصل الاجتماعي
        SiteSettings::setValue('social_facebook', 'https://facebook.com/shabwah21');
        SiteSettings::setValue('social_twitter', 'https://twitter.com/shabwah21');
        SiteSettings::setValue('social_instagram', 'https://instagram.com/shabwah21');
        SiteSettings::setValue('social_youtube', 'https://youtube.com/shabwah21');
        SiteSettings::setValue('social_telegram', 'https://t.me/shabwah21');
        SiteSettings::setValue('social_whatsapp', '+967777123456');

        // معلومات من نحن
        SiteSettings::setValue('about_title', 'من نحن');
        SiteSettings::setValue('about_subtitle', 'موقع إخباري احترافي يخدم المجتمع المحلي');
        SiteSettings::setValue('about_vision', 'نسعى لأن نكون المصدر الأول للأخبار الموثوقة في منطقة حضرموت واليمن، مع التركيز على الدقة والموضوعية في نقل المعلومات.');
        SiteSettings::setValue('about_mission', 'تقديم أخبار دقيقة ومحدثة، وتعزيز الوعي المجتمعي، والمساهمة في تطوير الإعلام المحلي من خلال تقنيات حديثة ومحتوى متميز.');
        SiteSettings::setValue('about_description', 'شبوة21 هو موقع إخباري متخصص يغطي أخبار وأحداث منطقة حضرموت واليمن بشكل عام. نعمل على تقديم محتوى إخباري متميز ومصدوق، مع التركيز على الأحداث المحلية والتطورات الإقليمية.');

        // القيم
        SiteSettings::setValue('values', [
            [
                'title' => 'المصداقية',
                'description' => 'نلتزم بنقل الأخبار بدقة وموضوعية',
                'icon' => 'bi bi-shield-check'
            ],
            [
                'title' => 'السرعة',
                'description' => 'نوفر الأخبار العاجلة في الوقت المناسب',
                'icon' => 'bi bi-lightning'
            ],
            [
                'title' => 'الشفافية',
                'description' => 'نعرض المعلومات بوضوح وشفافية تامة',
                'icon' => 'bi bi-eye'
            ]
        ]);

        // الخدمات
        SiteSettings::setValue('services', [
            [
                'title' => 'الأخبار العاجلة',
                'description' => 'تغطية فورية للأحداث المهمة',
                'icon' => 'bi bi-newspaper'
            ],
            [
                'title' => 'التقارير التحليلية',
                'description' => 'تحليلات معمقة للأحداث الجارية',
                'icon' => 'bi bi-graph-up'
            ],
            [
                'title' => 'التغطية المحلية',
                'description' => 'أخبار شاملة عن المنطقة المحلية',
                'icon' => 'bi bi-geo-alt'
            ],
            [
                'title' => 'المحتوى المرئي',
                'description' => 'فيديوهات وصور عالية الجودة',
                'icon' => 'bi bi-camera-video'
            ]
        ]);

        // الإحصائيات
        SiteSettings::setValue('stats', [
            [
                'title' => 'ألف قارئ',
                'value' => '50+',
                'icon' => 'bi bi-people'
            ],
            [
                'title' => 'خبر يومياً',
                'value' => '100+',
                'icon' => 'bi bi-newspaper'
            ],
            [
                'title' => 'سنة خبرة',
                'value' => '5+',
                'icon' => 'bi bi-calendar-check'
            ],
            [
                'title' => 'مراسل',
                'value' => '20+',
                'icon' => 'bi bi-person-badge'
            ]
        ]);

        // الأسئلة الشائعة
        SiteSettings::setValue('faq', [
            [
                'question' => 'كيف يمكنني التواصل معكم؟',
                'answer' => 'يمكنك التواصل معنا عبر البريد الإلكتروني أو الهاتف الموجود في صفحة اتصل بنا.'
            ],
            [
                'question' => 'هل يمكنني إرسال أخبار لكم؟',
                'answer' => 'نعم، نرحب بمساهماتكم. يمكنكم إرسال الأخبار عبر البريد الإلكتروني مع الوثائق المطلوبة.'
            ],
            [
                'question' => 'كيف يمكنني الاشتراك في النشرة الإخبارية؟',
                'answer' => 'يمكنك الاشتراك في النشرة الإخبارية من خلال النموذج الموجود في الصفحة الرئيسية.'
            ]
        ]);

        // إعدادات العرض
        SiteSettings::setValue('footer_text', 'جميع الحقوق محفوظة لموقع شبوة21 الإخباري');
        SiteSettings::setValue('analytics_code', '');
        SiteSettings::setValue('show_hero_section', true);
        SiteSettings::setValue('show_breaking_news', true);
        SiteSettings::setValue('show_newsletter', true);
        SiteSettings::setValue('show_video_in_nav', true);
        SiteSettings::setValue('show_about_in_nav', true);
        SiteSettings::setValue('show_contact_in_nav', true);
        SiteSettings::setValue('show_social_links_in_nav', true);
    }
}
