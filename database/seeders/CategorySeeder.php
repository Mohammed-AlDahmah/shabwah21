<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // تصنيفات رئيسية
        $local = Category::create([
            'name_ar' => 'محليات',
            'name_en' => 'Local',
            'slug' => 'local',
            'description_ar' => 'أخبار محلية',
            'description_en' => 'Local News',
            'color' => '#38a169',
            'sort_order' => 1,
            'show_in_nav' => true,
            'order' => 1,
        ]);
        $reports = Category::create([
            'name_ar' => 'تقارير وتحقيقات',
            'name_en' => 'Reports & Investigations',
            'slug' => 'reports-investigations',
            'description_ar' => 'تقارير وتحقيقات ميدانية',
            'description_en' => 'Field Reports & Investigations',
            'color' => '#805ad5',
            'sort_order' => 2,
            'show_in_nav' => true,
            'order' => 2,
        ]);
        // تصنيفات فرعية
        Category::create([
            'name_ar' => 'أخبار شبوة',
            'name_en' => 'Shabwa News',
            'slug' => 'shabwa-news',
            'description_ar' => 'كل جديد عن شبوة',
            'description_en' => 'All about Shabwa',
            'color' => '#e53e3e',
            'sort_order' => 1,
            'show_in_nav' => true,
            'order' => 1,
            'parent_id' => $local->id,
        ]);
        Category::create([
            'name_ar' => 'ملفات وتحقيقات',
            'name_en' => 'Files & Investigations',
            'slug' => 'files-investigations',
            'description_ar' => 'ملفات وتحقيقات معمقة',
            'description_en' => 'In-depth Files & Investigations',
            'color' => '#9f7aea',
            'sort_order' => 1,
            'show_in_nav' => true,
            'order' => 1,
            'parent_id' => $reports->id,
        ]);
    }
}
