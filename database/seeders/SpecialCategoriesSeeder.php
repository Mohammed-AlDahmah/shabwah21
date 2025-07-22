<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class SpecialCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        // الأقسام المخصصة الجديدة
        if (!Category::where('slug', 'poems')->exists()) {
            Category::create([
                'name_ar' => 'قصائد شعرية',
                'name_en' => 'Poems',
                'slug' => 'poems',
                'description_ar' => 'قصائد شعرية جميلة ومتنوعة',
                'description_en' => 'Beautiful and diverse poems',
                'color' => '#8B5CF6', // بنفسجي
                'icon' => 'bi bi-quote',
                'type' => 'article',
                'is_active' => true,
                'show_in_nav' => false, // لا تظهر في النافبار
                'sort_order' => 15,
            ]);
        }

        if (!Category::where('slug', 'health')->exists()) {
            Category::create([
                'name_ar' => 'طب وصحة',
                'name_en' => 'Health & Medicine',
                'slug' => 'health',
                'description_ar' => 'مقالات طبية ونصائح صحية',
                'description_en' => 'Medical articles and health tips',
                'color' => '#10B981', // أخضر
                'icon' => 'bi bi-heart-pulse',
                'type' => 'article',
                'is_active' => true,
                'show_in_nav' => false, // لا تظهر في النافبار
                'sort_order' => 16,
            ]);
        }

        if (!Category::where('slug', 'greetings')->exists()) {
            Category::create([
                'name_ar' => 'تهاني وتعازي',
                'name_en' => 'Greetings & Condolences',
                'slug' => 'greetings',
                'description_ar' => 'رسائل التهاني والتعازي',
                'description_en' => 'Greetings and condolences messages',
                'color' => '#F59E0B', // برتقالي
                'icon' => 'bi bi-envelope-heart',
                'type' => 'article',
                'is_active' => true,
                'show_in_nav' => false, // لا تظهر في النافبار
                'sort_order' => 17,
            ]);
        }
    }
} 