<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف جميع المقالات القديمة
        Article::truncate();

        // التأكد من وجود تصنيفات
        if (Category::count() == 0) {
            Category::create([
                'name_ar' => 'عام',
                'name_en' => 'General',
                'slug' => 'general',
                'description_ar' => 'تصنيف افتراضي للمقالات',
                'description_en' => 'Default category for articles',
                'color' => '#C08B2D',
                'is_active' => true,
            ]);
        }

        // جلب جميع معرفات التصنيفات
        $categoryIds = Category::pluck('id')->toArray();

        // بيانات تجريبية متنوعة
        $articles = [
            [
                'title' => 'افتتاح مشروع مياه جديد في شبوة',
                'slug' => 'new-water-project-shabwa',
                'excerpt' => 'تم افتتاح مشروع مياه جديد يخدم آلاف المواطنين في محافظة شبوة.',
                'content' => 'شهدت محافظة شبوة اليوم افتتاح مشروع مياه جديد يهدف إلى تحسين خدمات المياه في المناطق الريفية...',
                'featured_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
                'author' => 'شبوة21',
                'views_count' => 120,
                'is_featured' => true,
                'is_breaking' => true,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(1),
                'type' => 'news',
            ],
            [
                'title' => 'تقرير: التعليم في المناطق الريفية',
                'slug' => 'report-education-rural',
                'excerpt' => 'تقرير ميداني حول تحديات التعليم في المناطق الريفية بمحافظة شبوة.',
                'content' => 'يواجه التعليم في المناطق الريفية العديد من التحديات أبرزها نقص الكوادر التعليمية والبنية التحتية...',
                'featured_image' => 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80',
                'author' => 'مراسل شبوة21',
                'views_count' => 80,
                'is_featured' => true,
                'is_breaking' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
                'type' => 'report',
            ],
            [
                'title' => 'ملف خاص: مشاريع البنية التحتية',
                'slug' => 'file-infrastructure-projects',
                'excerpt' => 'ملف خاص حول مشاريع البنية التحتية في شبوة خلال السنوات الأخيرة.',
                'content' => 'شهدت محافظة شبوة تنفيذ العديد من مشاريع البنية التحتية التي ساهمت في تحسين مستوى الخدمات...',
                'featured_image' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80',
                'author' => 'شبوة21',
                'views_count' => 60,
                'is_featured' => false,
                'is_breaking' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(3),
                'type' => 'report',
            ],
            [
                'title' => 'مقال: أهمية المشاركة المجتمعية',
                'slug' => 'article-community-participation',
                'excerpt' => 'مقال رأي حول أهمية المشاركة المجتمعية في التنمية المحلية.',
                'content' => 'تلعب المشاركة المجتمعية دورًا محوريًا في تعزيز التنمية المحلية وتحقيق الاستدامة...',
                'featured_image' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80',
                'author' => 'كاتب شبوة21',
                'views_count' => 45,
                'is_featured' => false,
                'is_breaking' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(4),
                'type' => 'article',
            ],
            [
                'title' => 'انفوجرافيك: إحصائيات مشاريع المياه',
                'slug' => 'infographic-water-projects',
                'excerpt' => 'انفوجرافيك يوضح إحصائيات مشاريع المياه المنفذة في شبوة.',
                'content' => 'انفوجرافيك يوضح بالأرقام مشاريع المياه المنفذة في محافظة شبوة خلال السنوات الأخيرة...',
                'featured_image' => 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80',
                'author' => 'شبوة21',
                'views_count' => 30,
                'is_featured' => false,
                'is_breaking' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
                'type' => 'infographic',
            ],
        ];

        foreach ($articles as $data) {
            $data['category_id'] = $categoryIds[array_rand($categoryIds)];
            Article::create($data);
        }
    }
}
