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
