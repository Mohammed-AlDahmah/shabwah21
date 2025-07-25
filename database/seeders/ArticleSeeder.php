<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::truncate();

        $defaultCategories = [
            ['name_ar' => 'سياسة', 'name_en' => 'Politics', 'slug' => 'politics'],
            ['name_ar' => 'رياضة', 'name_en' => 'Sports', 'slug' => 'sports'],
            ['name_ar' => 'صحة', 'name_en' => 'Health', 'slug' => 'health'],
            ['name_ar' => 'اقتصاد', 'name_en' => 'Economy', 'slug' => 'economy'],
            ['name_ar' => 'تقنية', 'name_en' => 'Technology', 'slug' => 'technology'],
            ['name_ar' => 'مجتمع', 'name_en' => 'Society', 'slug' => 'society'],
            ['name_ar' => 'ثقافة', 'name_en' => 'Culture', 'slug' => 'culture'],
            ['name_ar' => 'فن', 'name_en' => 'Art', 'slug' => 'art'],
            ['name_ar' => 'علوم', 'name_en' => 'Science', 'slug' => 'science'],
            ['name_ar' => 'منوعات', 'name_en' => 'Variety', 'slug' => 'variety'],
        ];

        foreach ($defaultCategories as $cat) {
            Category::firstOrCreate(
                ['slug' => $cat['slug']],
                [
                    'name_ar' => $cat['name_ar'],
                    'name_en' => $cat['name_en'],
                    'description_ar' => $cat['name_ar'] . ' - وصف تلقائي',
                    'description_en' => $cat['name_en'] . ' - Auto description',
                    'color' => '#C08B2D',
                    'is_active' => true,
                ]
            );
        }

        $categoryIds = Category::pluck('id')->toArray();
        $authorIds = User::pluck('id')->toArray();
        // استخدم كلمات إنجليزية فقط للصور
        $sections = ['news', 'politics', 'sports', 'health', 'economy', 'technology', 'society', 'culture', 'art', 'science', 'world'];
        $types = ['news', 'report', 'article', 'infographic', 'opinion', 'video'];

        $faker = Faker::create('ar_SA');
        $titles = [
            'عاجل: تطورات جديدة في ملف الاقتصاد اليمني',
            'مقال رأي: مستقبل التعليم في الوطن العربي',
            'تقرير: ارتفاع أسعار النفط عالمياً',
            'تحقيق: واقع الصحة في المناطق الريفية',
            'انفوجرافيك: إحصائيات البطالة في الشرق الأوسط',
            'مبادرة شبابية لإعادة تأهيل الحدائق العامة',
            'دراسة: تأثير وسائل التواصل على المجتمع',
            'حوار خاص مع خبير تقني حول الذكاء الاصطناعي',
            'ملف خاص: مشاريع البنية التحتية في شبوة',
            'مقال: أهمية المشاركة المجتمعية في التنمية',
            'تغطية: فعاليات مهرجان الفنون والثقافة',
            'تحليل: مستقبل العملات الرقمية في المنطقة',
            'تقرير: جهود مكافحة الأوبئة في اليمن',
            'مقال: تحديات سوق العمل للشباب',
            'انفوجرافيك: نسب الأمية في العالم العربي',
            'حوار: دور المرأة في التنمية المستدامة',
            'ملف خاص: التعليم عن بعد بعد الجائحة',
            'مقال: أهمية الرياضة لصحة المجتمع',
            'تقرير: مشاريع الطاقة المتجددة',
            'تحقيق: واقع الصحافة المحلية',
        ];

        $images = [
            'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=800&q=80',
            // ... أضف المزيد
        ];

        for ($i = 0; $i < 10000000; $i++) {
            $categoryId = $faker->randomElement($categoryIds);
            $authorId = $faker->randomElement($authorIds);
            $section = $faker->randomElement($sections); // الآن إنجليزي فقط
            $image = $faker->randomElement($images);
            $slug = $faker->unique()->slug;

            Article::create([
                'title' => $faker->randomElement($titles),
                'slug' => $slug . '-' . $i,  // إصلاح: استخدم الوصل بدلاً من الجمع
                'excerpt' => $faker->realText(80, 2),
                'content' => $faker->realText(800, 2),
                'featured_image' => $image,
                'author_id' => $authorId,
                'views_count' => $faker->numberBetween(10, 5000),
                'is_featured' => $faker->boolean(10),
                'is_breaking' => $faker->boolean(5),
                'is_published' => true,
                'published_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'type' => $faker->randomElement($types),
                'category_id' => $categoryId,
            ]);
        }
    }
}
