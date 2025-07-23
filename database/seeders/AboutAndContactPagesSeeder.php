<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutAndContactPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // About Page
        DB::table('about_pages')->truncate();
        DB::table('about_pages')->insert([
            'title' => 'من نحن',
            'subtitle' => 'شبوة 21 - منصة إخبارية احترافية من قلب حضرموت واليمن',
            'vision' => 'أن نكون المصدر الأول للأخبار والتحليلات العميقة من شبوة واليمن، ونقدم محتوى موثوقاً وشفافاً يعكس نبض المجتمع.',
            'mission' => 'تقديم محتوى إخباري وتحليلي عالي الجودة، محايد وموضوعي، يلبي احتياجات القارئ العربي ويعزز الوعي المجتمعي.',
            'values' => json_encode([
                ['icon' => 'bi-shield-check', 'title' => 'المصداقية', 'desc' => 'نلتزم بالدقة والتحقق من صحة المعلومات قبل نشرها.'],
                ['icon' => 'bi-balance-scale', 'title' => 'الحياد', 'desc' => 'نعرض جميع وجهات النظر دون تحيز.'],
                ['icon' => 'bi-eye', 'title' => 'الشفافية', 'desc' => 'نوضح مصادرنا وطرق عملنا بوضوح.'],
                ['icon' => 'bi-people', 'title' => 'المسؤولية المجتمعية', 'desc' => 'نخدم المجتمع ونساهم في رفع الوعي والمعرفة.'],
            ]),
            'team' => 'يضم فريق شبوة 21 نخبة من الصحفيين والمحررين ذوي الخبرة، يعملون بروح الفريق لتقديم أفضل محتوى إخباري وتحليلي.',
            'services' => json_encode([
                'تغطية شاملة لأخبار شبوة واليمن',
                'تحليلات وتقارير معمقة',
                'محتوى فيديو وإنفوجرافيك احترافي',
                'نشرات إخبارية دورية عبر البريد الإلكتروني',
                'خدمة تواصل مباشر مع القراء',
            ]),
            'stats' => json_encode([
                ['label' => 'مقال منشور', 'value' => '1500+', 'color' => '#C08B2D'],
                ['label' => 'قارئ شهري', 'value' => '70K+', 'color' => '#B22B2B'],
                ['label' => 'سنوات خبرة', 'value' => '10+', 'color' => '#C08B2D'],
            ]),
            'contact_email' => 'info@shabwah21.com',
            'contact_phone' => '+967 777 123 456',
            'contact_address' => 'شارع التحرير، عتق، محافظة شبوة، اليمن',
            'work_hours' => 'الأحد - الخميس: 8:00 ص - 6:00 م | الجمعة - السبت: 9:00 ص - 4:00 م',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Contact Page
        DB::table('contact_pages')->truncate();
        DB::table('contact_pages')->insert([
            'title' => 'اتصل بنا',
            'subtitle' => 'نحن هنا لخدمتكم والإجابة على جميع استفساراتكم واقتراحاتكم',
            'contact_info' => json_encode([
                'email' => 'info@shabwah21.com',
                'phone' => '+967 777 123 456',
                'address' => 'شارع التحرير، عتق، محافظة شبوة، اليمن',
                'work_hours' => [
                    'الأحد - الخميس: 8:00 ص - 6:00 م',
                    'الجمعة - السبت: 9:00 ص - 4:00 م',
                ],
            ]),
            'social_links' => json_encode([
                ['icon' => 'bi-facebook', 'label' => 'فيسبوك', 'url' => 'https://facebook.com/shabwah21', 'color' => 'bg-blue-600'],
                ['icon' => 'bi-twitter-x', 'label' => 'تويتر', 'url' => 'https://twitter.com/shabwah21', 'color' => 'bg-blue-400'],
                ['icon' => 'bi-youtube', 'label' => 'يوتيوب', 'url' => 'https://youtube.com/shabwah21', 'color' => 'bg-red-600'],
                ['icon' => 'bi-telegram', 'label' => 'تليجرام', 'url' => 'https://t.me/shabwah21', 'color' => 'bg-blue-500'],
            ]),
            'faq' => json_encode([
                ['q' => 'كيف يمكنني إرسال خبر أو تقرير؟', 'a' => 'يمكنك إرسال الأخبار والتقارير عبر البريد الإلكتروني info@shabwah21.com أو نموذج الاتصال في هذه الصفحة.'],
                ['q' => 'هل يمكنني إعادة نشر محتوى الموقع؟', 'a' => 'يجب الحصول على إذن مسبق قبل إعادة نشر أي محتوى من الموقع.'],
                ['q' => 'كيف يمكنني الاشتراك في النشرة الإخبارية؟', 'a' => 'يمكنك الاشتراك عبر النموذج الموجود في أسفل الصفحة الرئيسية.'],
                ['q' => 'هل تقدمون خدمات إعلانية؟', 'a' => 'نعم، تواصل معنا عبر البريد أو الهاتف لمزيد من التفاصيل حول الإعلانات.'],
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
