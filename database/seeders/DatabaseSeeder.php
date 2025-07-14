<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!\App\Models\User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        $this->call([
            CategorySeeder::class,
            ArticleSeeder::class,
            VideoSeeder::class,
        ]);

        // إضافة صور افتراضية للأقسام الرئيسية
        $categories = [
            ['name_ar' => 'أخبار حضرموت', 'name_en' => 'Hadramout News', 'slug' => 'hadramout-news', 'image' => 'hadramout.jpg'],
            ['name_ar' => 'تقارير وتحقيقات', 'name_en' => 'Reports', 'slug' => 'reports', 'image' => 'report.jpg'],
            ['name_ar' => 'فيديو', 'name_en' => 'Video', 'slug' => 'video', 'image' => 'video.jpg'],
            ['name_ar' => 'مجتمع', 'name_en' => 'Community', 'slug' => 'community', 'image' => 'community.jpg'],
        ];
        foreach ($categories as $cat) {
            \App\Models\Category::updateOrCreate([
                'slug' => $cat['slug'],
            ], $cat);
        }
        // نسخ الصور الافتراضية إلى public/images إذا لم تكن موجودة
        $defaultImages = [
            'hadramout.jpg', 'report.jpg', 'video.jpg', 'community.jpg'
        ];
        foreach ($defaultImages as $img) {
            $src = database_path('seeders/images/' . $img);
            $dest = public_path('images/' . $img);
            if (!file_exists($dest) && file_exists($src)) {
                copy($src, $dest);
            }
        }
    }
}
