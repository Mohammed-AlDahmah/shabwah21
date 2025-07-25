<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // للتسجيل

class SpecialArticlesSeeder extends Seeder
{
    /**
     * دالة لتوليد slug فريد (مع logging للتصحيح)
     */
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
            Log::info("Slug مكرر: {$originalSlug}، جاري إضافة -{$counter}"); // logging للتصحيح
        }

        Log::info("Slug النهائي: {$slug}"); // logging للتأكيد
        return $slug;
    }

    public function run(): void
    {
        // اختياري: مسح الجدول لإعادة البداية (احذر: يمسح كل المقالات!)
        // Article::truncate();
        // Log::info('تم مسح جدول articles.');

        // الحصول على الأقسام
        $poemsCategory = Category::where('slug', 'poems')->first();
        $healthCategory = Category::where('slug', 'health')->first();
        $greetingsCategory = Category::where('slug', 'greetings')->first();
        
        // الحصول على مؤلف (أو إنشاء واحد)
        $author = Author::first() ?? Author::create([
            'name' => 'مؤلف الموقع',
            'email' => 'author@shabwah21.com',
            'bio' => 'مؤلف محترف في شبوة21',
            'is_active' => true,
        ]);

        // مقالات القصائد الشعرية
        if ($poemsCategory) {
            $poems = [
                // ... (القائمة الحالية للـ $poems تبقى كما هي، بدون تغيير)
            ];

            foreach ($poems as $poem) {
                $slug = $this->generateUniqueSlug($poem['title']);

                // استخدام firstOrCreate للتحقق من الوجود
                Article::firstOrCreate(
                    ['slug' => $slug], // التحقق بناءً على slug
                    [
                        'title' => $poem['title'],
                        'excerpt' => $poem['excerpt'],
                        'content' => $poem['content'],
                        'category_id' => $poemsCategory->id,
                        'author_id' => $author->id,
                        'type' => $poem['type'],
                        'is_published' => $poem['is_published'],
                        'is_featured' => $poem['is_featured'],
                        'published_at' => now(),
                    ]
                );
                Log::info("تم إنشاء/التحقق من مقال: {$poem['title']} مع slug: {$slug}");
            }
        }

        // مقالات الطب والصحة
        if ($healthCategory) {
            $healthArticles = [
                // ... (القائمة الحالية للـ $healthArticles تبقى كما هي)
            ];

            foreach ($healthArticles as $article) {
                $slug = $this->generateUniqueSlug($article['title']);

                Article::firstOrCreate(
                    ['slug' => $slug],
                    [
                        'title' => $article['title'],
                        'excerpt' => $article['excerpt'],
                        'content' => $article['content'],
                        'category_id' => $healthCategory->id,
                        'author_id' => $author->id,
                        'type' => $article['type'],
                        'is_published' => $article['is_published'],
                        'is_featured' => $article['is_featured'],
                        'published_at' => now(),
                    ]
                );
            }
        }

        // رسائل التهاني والتعازي
        if ($greetingsCategory) {
            $greetings = [
                // ... (القائمة الحالية للـ $greetings تبقى كما هي)
            ];

            foreach ($greetings as $greeting) {
                $slug = $this->generateUniqueSlug($greeting['title']);

                Article::firstOrCreate(
                    ['slug' => $slug],
                    [
                        'title' => $greeting['title'],
                        'excerpt' => $greeting['excerpt'],
                        'content' => $greeting['content'],
                        'category_id' => $greetingsCategory->id,
                        'author_id' => $author->id,
                        'type' => $greeting['type'],
                        'is_published' => $greeting['is_published'],
                        'is_featured' => $greeting['is_featured'],
                        'published_at' => now(),
                    ]
                );
            }
        }

        // مقالات الانفوجرافيك
        $infographics = [
            // ... (القائمة الحالية للـ $infographics تبقى كما هي)
        ];

        foreach ($infographics as $infographic) {
            $slug = $this->generateUniqueSlug($infographic['title']);

            Article::firstOrCreate(
                ['slug' => $slug],
                [
                    'title' => $infographic['title'],
                    'excerpt' => $infographic['excerpt'],
                    'content' => $infographic['content'],
                    'category_id' => null,
                    'author_id' => $author->id,
                    'type' => $infographic['type'],
                    'is_published' => $infographic['is_published'],
                    'is_featured' => $infographic['is_featured'],
                    'published_at' => now(),
                ]
            );
        }
    }
}