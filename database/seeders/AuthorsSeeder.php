<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Str;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'أحمد محمد علي',
                'email' => 'ahmed.mohamed@shabwah21.com',
                'bio' => 'كاتب ومحلل سياسي متخصص في شؤون الشرق الأوسط، له أكثر من 15 عاماً من الخبرة في التحليل السياسي والاقتصادي. حاصل على درجة الماجستير في العلوم السياسية من جامعة صنعاء.',
                'specialization' => 'التحليل السياسي والاقتصادي',
                'experience_years' => 15,
                'education' => 'ماجستير في العلوم السياسية - جامعة صنعاء',
                'awards' => 'جائزة أفضل كاتب سياسي 2023 - اتحاد الصحفيين اليمنيين',
                'social_media' => [
                    'twitter' => 'https://twitter.com/ahmed_mohamed',
                    'linkedin' => 'https://linkedin.com/in/ahmed-mohamed',
                    'facebook' => 'https://facebook.com/ahmed.mohamed',
                    'instagram' => 'https://instagram.com/ahmed_mohamed',
                    'website' => 'https://ahmed-mohamed.com'
                ],
                'is_active' => true,
                'is_featured' => true,
                'contact_info' => '+967 777 123 456',
                'location' => 'صنعاء، اليمن',
                'languages' => 'العربية، الإنجليزية، الفرنسية',
                'expertise_areas' => 'السياسة الخارجية، الاقتصاد، الأمن القومي، العلاقات الدولية',
                'publication_count' => 245,
                'join_date' => '2020-01-15',
            ],
            [
                'name' => 'فاطمة عبدالله حسن',
                'email' => 'fatima.abdullah@shabwah21.com',
                'bio' => 'صحفية استقصائية متخصصة في حقوق الإنسان والمرأة، عملت في عدة صحف محلية ودولية. حاصلة على بكالوريوس في الإعلام من جامعة عدن.',
                'specialization' => 'الصحافة الاستقصائية وحقوق الإنسان',
                'experience_years' => 12,
                'education' => 'بكالوريوس في الإعلام - جامعة عدن',
                'awards' => 'جائزة الصحافة الاستقصائية 2022 - منظمة مراسلون بلا حدود',
                'social_media' => [
                    'twitter' => 'https://twitter.com/fatima_abdullah',
                    'linkedin' => 'https://linkedin.com/in/fatima-abdullah',
                    'facebook' => 'https://facebook.com/fatima.abdullah',
                    'instagram' => 'https://instagram.com/fatima_abdullah',
                    'website' => 'https://fatima-abdullah.com'
                ],
                'is_active' => true,
                'is_featured' => true,
                'contact_info' => '+967 777 234 567',
                'location' => 'عدن، اليمن',
                'languages' => 'العربية، الإنجليزية',
                'expertise_areas' => 'حقوق الإنسان، حقوق المرأة، التنمية الاجتماعية، المجتمع المدني',
                'publication_count' => 189,
                'join_date' => '2020-03-20',
            ],
            [
                'name' => 'محمد سالم القحطاني',
                'email' => 'mohamed.salem@shabwah21.com',
                'bio' => 'خبير اقتصادي متخصص في الاقتصاد اليمني والتنمية المستدامة، عمل مستشاراً لعدة مؤسسات حكومية وخاصة. حاصل على دكتوراه في الاقتصاد من جامعة القاهرة.',
                'specialization' => 'الاقتصاد والتنمية المستدامة',
                'experience_years' => 20,
                'education' => 'دكتوراه في الاقتصاد - جامعة القاهرة',
                'awards' => 'جائزة الاقتصاديين العرب 2021 - اتحاد الاقتصاديين العرب',
                'social_media' => [
                    'twitter' => 'https://twitter.com/mohamed_salem',
                    'linkedin' => 'https://linkedin.com/in/mohamed-salem',
                    'facebook' => 'https://facebook.com/mohamed.salem',
                    'instagram' => '',
                    'website' => 'https://mohamed-salem.com'
                ],
                'is_active' => true,
                'is_featured' => false,
                'contact_info' => '+967 777 345 678',
                'location' => 'تعز، اليمن',
                'languages' => 'العربية، الإنجليزية، الألمانية',
                'expertise_areas' => 'الاقتصاد الكلي، التنمية الاقتصادية، السياسات المالية، الاستثمار',
                'publication_count' => 312,
                'join_date' => '2020-06-10',
            ],
            [
                'name' => 'سارة أحمد المقطري',
                'email' => 'sara.ahmed@shabwah21.com',
                'bio' => 'كاتبة متخصصة في الشؤون الاجتماعية والثقافية، تهتم بقضايا الشباب والتعليم. حاصلة على ماجستير في علم الاجتماع من جامعة صنعاء.',
                'specialization' => 'الشؤون الاجتماعية والثقافية',
                'experience_years' => 8,
                'education' => 'ماجستير في علم الاجتماع - جامعة صنعاء',
                'awards' => 'جائزة الكاتبة الشابة المتميزة 2023 - وزارة الثقافة',
                'social_media' => [
                    'twitter' => 'https://twitter.com/sara_ahmed',
                    'linkedin' => 'https://linkedin.com/in/sara-ahmed',
                    'facebook' => 'https://facebook.com/sara.ahmed',
                    'instagram' => 'https://instagram.com/sara_ahmed',
                    'website' => 'https://sara-ahmed.com'
                ],
                'is_active' => true,
                'is_featured' => false,
                'contact_info' => '+967 777 456 789',
                'location' => 'حضرموت، اليمن',
                'languages' => 'العربية، الإنجليزية',
                'expertise_areas' => 'الشباب، التعليم، الثقافة، المجتمع، التنمية الاجتماعية',
                'publication_count' => 156,
                'join_date' => '2021-01-05',
            ],
            [
                'name' => 'علي حسن الشميري',
                'email' => 'ali.hassan@shabwah21.com',
                'bio' => 'محلل عسكري وأمني متخصص في شؤون الأمن القومي والاستراتيجية العسكرية، عمل مستشاراً أمنياً لعدة مؤسسات. حاصل على ماجستير في الدراسات الاستراتيجية.',
                'specialization' => 'التحليل العسكري والأمني',
                'experience_years' => 18,
                'education' => 'ماجستير في الدراسات الاستراتيجية - أكاديمية ناصر العسكرية',
                'awards' => 'جائزة التحليل الاستراتيجي 2022 - مركز الدراسات الاستراتيجية',
                'social_media' => [
                    'twitter' => 'https://twitter.com/ali_hassan',
                    'linkedin' => 'https://linkedin.com/in/ali-hassan',
                    'facebook' => 'https://facebook.com/ali.hassan',
                    'instagram' => '',
                    'website' => 'https://ali-hassan.com'
                ],
                'is_active' => true,
                'is_featured' => true,
                'contact_info' => '+967 777 567 890',
                'location' => 'صنعاء، اليمن',
                'languages' => 'العربية، الإنجليزية، الروسية',
                'expertise_areas' => 'الأمن القومي، الاستراتيجية العسكرية، مكافحة الإرهاب، الدفاع',
                'publication_count' => 278,
                'join_date' => '2020-09-15',
            ],
            [
                'name' => 'نورا محمد العولقي',
                'email' => 'nora.mohamed@shabwah21.com',
                'bio' => 'صحفية متخصصة في الشؤون الصحية والطبية، تهتم بقضايا الصحة العامة والرعاية الصحية. حاصلة على بكالوريوس في الصحافة مع دبلوم في الصحة العامة.',
                'specialization' => 'الصحافة الصحية والطبية',
                'experience_years' => 10,
                'education' => 'بكالوريوس في الصحافة - جامعة عدن، دبلوم في الصحة العامة',
                'awards' => 'جائزة الصحافة الصحية 2023 - وزارة الصحة',
                'social_media' => [
                    'twitter' => 'https://twitter.com/nora_mohamed',
                    'linkedin' => 'https://linkedin.com/in/nora-mohamed',
                    'facebook' => 'https://facebook.com/nora.mohamed',
                    'instagram' => 'https://instagram.com/nora_mohamed',
                    'website' => 'https://nora-mohamed.com'
                ],
                'is_active' => true,
                'is_featured' => false,
                'contact_info' => '+967 777 678 901',
                'location' => 'عدن، اليمن',
                'languages' => 'العربية، الإنجليزية',
                'expertise_areas' => 'الصحة العامة، الرعاية الصحية، الطب الوقائي، التغذية',
                'publication_count' => 203,
                'join_date' => '2021-03-12',
            ],
            [
                'name' => 'يوسف عبدالرحمن الحمادي',
                'email' => 'yousef.abdulrahman@shabwah21.com',
                'bio' => 'كاتب متخصص في الشؤون التكنولوجية والابتكار، مهتم بالتحول الرقمي والذكاء الاصطناعي. حاصل على بكالوريوس في علوم الحاسوب من جامعة صنعاء.',
                'specialization' => 'التكنولوجيا والابتكار',
                'experience_years' => 6,
                'education' => 'بكالوريوس في علوم الحاسوب - جامعة صنعاء',
                'awards' => 'جائزة الكاتب التقني المتميز 2023 - جمعية تقنية المعلومات',
                'social_media' => [
                    'twitter' => 'https://twitter.com/yousef_abdulrahman',
                    'linkedin' => 'https://linkedin.com/in/yousef-abdulrahman',
                    'facebook' => 'https://facebook.com/yousef.abdulrahman',
                    'instagram' => 'https://instagram.com/yousef_abdulrahman',
                    'website' => 'https://yousef-abdulrahman.com'
                ],
                'is_active' => true,
                'is_featured' => false,
                'contact_info' => '+967 777 789 012',
                'location' => 'صنعاء، اليمن',
                'languages' => 'العربية، الإنجليزية',
                'expertise_areas' => 'التكنولوجيا، الذكاء الاصطناعي، التحول الرقمي، الابتكار',
                'publication_count' => 134,
                'join_date' => '2021-07-08',
            ],
            [
                'name' => 'مريم أحمد السقاف',
                'email' => 'maryam.ahmed@shabwah21.com',
                'bio' => 'كاتبة متخصصة في الشؤون البيئية والتنمية المستدامة، تهتم بقضايا التغير المناخي وحماية البيئة. حاصلة على ماجستير في العلوم البيئية.',
                'specialization' => 'البيئة والتنمية المستدامة',
                'experience_years' => 9,
                'education' => 'ماجستير في العلوم البيئية - جامعة عدن',
                'awards' => 'جائزة الصحافة البيئية 2022 - وزارة المياه والبيئة',
                'social_media' => [
                    'twitter' => 'https://twitter.com/maryam_ahmed',
                    'linkedin' => 'https://linkedin.com/in/maryam-ahmed',
                    'facebook' => 'https://facebook.com/maryam.ahmed',
                    'instagram' => 'https://instagram.com/maryam_ahmed',
                    'website' => 'https://maryam-ahmed.com'
                ],
                'is_active' => true,
                'is_featured' => false,
                'contact_info' => '+967 777 890 123',
                'location' => 'حضرموت، اليمن',
                'languages' => 'العربية، الإنجليزية، الفرنسية',
                'expertise_areas' => 'البيئة، التغير المناخي، التنمية المستدامة، الطاقة المتجددة',
                'publication_count' => 167,
                'join_date' => '2021-11-20',
            ],
            [
                'name' => 'خالد محمد البكري',
                'email' => 'khalid.mohamed@shabwah21.com',
                'bio' => 'محلل رياضي متخصص في كرة القدم والرياضة المحلية، عمل معلقاً رياضياً ومحللاً في عدة قنوات رياضية. حاصل على بكالوريوس في التربية الرياضية.',
                'specialization' => 'التحليل الرياضي',
                'experience_years' => 14,
                'education' => 'بكالوريوس في التربية الرياضية - جامعة صنعاء',
                'awards' => 'جائزة أفضل محلل رياضي 2023 - اتحاد كرة القدم',
                'social_media' => [
                    'twitter' => 'https://twitter.com/khalid_mohamed',
                    'linkedin' => 'https://linkedin.com/in/khalid-mohamed',
                    'facebook' => 'https://facebook.com/khalid.mohamed',
                    'instagram' => 'https://instagram.com/khalid_mohamed',
                    'website' => 'https://khalid-mohamed.com'
                ],
                'is_active' => true,
                'is_featured' => false,
                'contact_info' => '+967 777 901 234',
                'location' => 'تعز، اليمن',
                'languages' => 'العربية، الإنجليزية',
                'expertise_areas' => 'كرة القدم، الرياضة المحلية، التحليل الرياضي، الأندية',
                'publication_count' => 298,
                'join_date' => '2020-12-03',
            ],
            [
                'name' => 'ليلى عبدالله الحميري',
                'email' => 'layla.abdullah@shabwah21.com',
                'bio' => 'كاتبة متخصصة في الشؤون الثقافية والفنية، تهتم بالأدب والفنون والتراث اليمني. حاصلة على بكالوريوس في اللغة العربية وآدابها.',
                'specialization' => 'الشؤون الثقافية والفنية',
                'experience_years' => 11,
                'education' => 'بكالوريوس في اللغة العربية وآدابها - جامعة صنعاء',
                'awards' => 'جائزة الأدب والثقافة 2022 - وزارة الثقافة',
                'social_media' => [
                    'twitter' => 'https://twitter.com/layla_abdullah',
                    'linkedin' => 'https://linkedin.com/in/layla-abdullah',
                    'facebook' => 'https://facebook.com/layla.abdullah',
                    'instagram' => 'https://instagram.com/layla_abdullah',
                    'website' => 'https://layla-abdullah.com'
                ],
                'is_active' => true,
                'is_featured' => false,
                'contact_info' => '+967 777 012 345',
                'location' => 'صنعاء، اليمن',
                'languages' => 'العربية، الإنجليزية، الفرنسية',
                'expertise_areas' => 'الأدب، الفنون، التراث، الثقافة اليمنية، الشعر',
                'publication_count' => 223,
                'join_date' => '2021-05-18',
            ]
        ];

        foreach ($authors as $authorData) {
            Author::create([
                'name' => $authorData['name'],
                'email' => $authorData['email'],
                'bio' => $authorData['bio'],
                'slug' => Str::slug($authorData['name']),
                'specialization' => $authorData['specialization'],
                'experience_years' => $authorData['experience_years'],
                'education' => $authorData['education'],
                'awards' => $authorData['awards'],
                'social_media' => $authorData['social_media'],
                'is_active' => $authorData['is_active'],
                'is_featured' => $authorData['is_featured'],
                'contact_info' => $authorData['contact_info'],
                'location' => $authorData['location'],
                'languages' => $authorData['languages'],
                'expertise_areas' => $authorData['expertise_areas'],
                'publication_count' => $authorData['publication_count'],
                'join_date' => $authorData['join_date'],
            ]);
        }

        $this->command->info('تم إنشاء ' . count($authors) . ' مؤلف بنجاح!');
    }
}
