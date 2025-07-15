<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;
use App\Models\User;

class NewsSeeder extends Seeder
{
    public function run()
    {
        // إنشاء مستخدم افتراضي
        $user = User::firstOrCreate([
            'email' => 'admin@news24.com'
        ], [
            'name' => 'محرر الأخبار',
            'password' => bcrypt('password123')
        ]);

        // إنشاء التصنيفات
        $categories = [
            ['name_ar' => 'محليات', 'name_en' => 'Local', 'slug' => 'local', 'color' => '#dc3545', 'sort_order' => 1],
            ['name_ar' => 'سياسة', 'name_en' => 'Politics', 'slug' => 'politics', 'color' => '#6c757d', 'sort_order' => 2],
            ['name_ar' => 'اقتصاد', 'name_en' => 'Economy', 'slug' => 'economy', 'color' => '#0d6efd', 'sort_order' => 3],
            ['name_ar' => 'رياضة', 'name_en' => 'Sports', 'slug' => 'sports', 'color' => '#198754', 'sort_order' => 4],
            ['name_ar' => 'ثقافة', 'name_en' => 'Culture', 'slug' => 'culture', 'color' => '#6f42c1', 'sort_order' => 5],
            ['name_ar' => 'تكنولوجيا', 'name_en' => 'Technology', 'slug' => 'technology', 'color' => '#0dcaf0', 'sort_order' => 6],
            ['name_ar' => 'منوعات', 'name_en' => 'Miscellaneous', 'slug' => 'miscellaneous', 'color' => '#ffc107', 'sort_order' => 7],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        // الأخبار التجريبية
        $newsData = [
            // أخبار عاجلة
            [
                'title' => 'عاجل: الحكومة تعلن عن حزمة إصلاحات اقتصادية جديدة',
                'content' => 'أعلنت الحكومة اليوم عن حزمة من الإصلاحات الاقتصادية الجديدة التي تهدف إلى تحسين مستوى المعيشة وتعزيز النمو الاقتصادي...',
                'category' => 'economy',
                'is_breaking' => true,
                'is_featured' => true,
                'views_count' => rand(5000, 10000)
            ],
            [
                'title' => 'القمة العربية تختتم أعمالها بإصدار بيان ختامي مهم',
                'content' => 'اختتمت القمة العربية أعمالها اليوم بإصدار بيان ختامي يتضمن عدة قرارات مهمة تتعلق بالقضايا العربية الراهنة...',
                'category' => 'politics',
                'is_breaking' => true,
                'views_count' => rand(3000, 8000)
            ],
            // أخبار محلية
            [
                'title' => 'افتتاح أكبر مشروع للطاقة المتجددة في المنطقة',
                'content' => 'تم اليوم افتتاح أكبر مشروع للطاقة المتجددة في المنطقة بحضور عدد من المسؤولين وممثلي الشركات العالمية...',
                'category' => 'local',
                'is_featured' => true,
                'views_count' => rand(2000, 5000)
            ],
            [
                'title' => 'وزارة الصحة تطلق حملة وطنية للتطعيم ضد الأمراض الموسمية',
                'content' => 'أطلقت وزارة الصحة اليوم حملة وطنية شاملة للتطعيم ضد الأمراض الموسمية تستهدف جميع الفئات العمرية...',
                'category' => 'local',
                'views_count' => rand(1000, 3000)
            ],
            // أخبار رياضية
            [
                'title' => 'المنتخب الوطني يحقق فوزاً مهماً في التصفيات الآسيوية',
                'content' => 'حقق المنتخب الوطني لكرة القدم فوزاً مهماً على نظيره في إطار التصفيات المؤهلة لكأس آسيا...',
                'category' => 'sports',
                'views_count' => rand(4000, 7000)
            ],
            [
                'title' => 'نادي الهلال يتعاقد مع نجم عالمي في صفقة قياسية',
                'content' => 'أعلن نادي الهلال عن التعاقد مع النجم العالمي في صفقة قياسية تعد الأكبر في تاريخ الكرة العربية...',
                'category' => 'sports',
                'views_count' => rand(6000, 9000)
            ],
            // أخبار تكنولوجيا
            [
                'title' => 'إطلاق أول منصة رقمية محلية للذكاء الاصطناعي',
                'content' => 'تم اليوم إطلاق أول منصة رقمية محلية متخصصة في تقنيات الذكاء الاصطناعي لخدمة القطاعات المختلفة...',
                'category' => 'technology',
                'views_count' => rand(2000, 4000)
            ],
            [
                'title' => 'شركة آبل تكشف عن هاتف آيفون الجديد بمميزات ثورية',
                'content' => 'كشفت شركة آبل في مؤتمرها السنوي عن هاتف آيفون الجديد الذي يحمل مميزات ثورية غير مسبوقة...',
                'category' => 'technology',
                'views_count' => rand(8000, 12000)
            ],
            // أخبار اقتصادية
            [
                'title' => 'البورصة تسجل مكاسب قياسية وسط تفاؤل المستثمرين',
                'content' => 'سجلت البورصة مكاسب قياسية اليوم وسط حالة من التفاؤل بين المستثمرين بعد إعلان نتائج إيجابية للشركات...',
                'category' => 'economy',
                'views_count' => rand(1500, 3500)
            ],
            [
                'title' => 'ارتفاع أسعار النفط عالمياً يؤثر على الأسواق المحلية',
                'content' => 'شهدت أسعار النفط ارتفاعاً ملحوظاً في الأسواق العالمية مما أثر على الأسواق المحلية وأسعار المشتقات النفطية...',
                'category' => 'economy',
                'is_breaking' => true,
                'views_count' => rand(3000, 6000)
            ],
            // أخبار ثقافية
            [
                'title' => 'انطلاق فعاليات مهرجان السينما العربية في دورته العاشرة',
                'content' => 'انطلقت اليوم فعاليات مهرجان السينما العربية في دورته العاشرة بمشاركة نخبة من صناع السينما العربية...',
                'category' => 'culture',
                'views_count' => rand(1000, 2500)
            ],
            // منوعات
            [
                'title' => 'دراسة: ممارسة الرياضة يومياً تقلل من خطر الإصابة بأمراض القلب',
                'content' => 'كشفت دراسة حديثة أن ممارسة الرياضة بانتظام لمدة 30 دقيقة يومياً تقلل من خطر الإصابة بأمراض القلب...',
                'category' => 'miscellaneous',
                'views_count' => rand(2000, 4000)
            ],
        ];

        foreach ($newsData as $news) {
            $category = Category::where('slug', $news['category'])->first();
            
            Article::create([
                'title' => $news['title'],
                'slug' => \Str::slug($news['title']),
                'content' => $news['content'],
                'category_id' => $category->id,
                'author_id' => $user->id,
                'is_breaking' => $news['is_breaking'] ?? false,
                'is_featured' => $news['is_featured'] ?? false,
                'is_published' => true,
                'published_at' => now()->subHours(rand(1, 48)),
                'views_count' => $news['views_count'],
                'type' => 'news'
            ]);
        }
    }
}