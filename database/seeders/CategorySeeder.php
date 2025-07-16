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
            'icon' => 'geo-alt',
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
            'icon' => 'file-text',
        ]);

        $arabic = Category::create([
            'name_ar' => 'عربي وعالمي',
            'name_en' => 'Arabic & International',
            'slug' => 'arabic-international',
            'description_ar' => 'أخبار عربية وعالمية',
            'description_en' => 'Arabic & International News',
            'color' => '#3182ce',
            'sort_order' => 3,
            'show_in_nav' => true,
            'order' => 3,
            'icon' => 'globe',
        ]);

        $community = Category::create([
            'name_ar' => 'مجتمع',
            'name_en' => 'Community',
            'slug' => 'community',
            'description_ar' => 'أخبار المجتمع والتنمية',
            'description_en' => 'Community & Development News',
            'color' => '#d69e2e',
            'sort_order' => 4,
            'show_in_nav' => true,
            'order' => 4,
            'icon' => 'people',
        ]);

        $sports = Category::create([
            'name_ar' => 'رياضة',
            'name_en' => 'Sports',
            'slug' => 'sports',
            'description_ar' => 'أخبار الرياضة المحلية والعالمية',
            'description_en' => 'Local & International Sports News',
            'color' => '#e53e3e',
            'sort_order' => 5,
            'show_in_nav' => true,
            'order' => 5,
            'icon' => 'trophy',
        ]);

        $economy = Category::create([
            'name_ar' => 'اقتصاد',
            'name_en' => 'Economy',
            'slug' => 'economy',
            'description_ar' => 'أخبار الاقتصاد والأعمال',
            'description_en' => 'Economy & Business News',
            'color' => '#38a169',
            'sort_order' => 6,
            'show_in_nav' => true,
            'order' => 6,
            'icon' => 'graph-up',
        ]);

        // تصنيفات فرعية للمحليات
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
            'icon' => 'geo-alt-fill',
        ]);

        Category::create([
            'name_ar' => 'أخبار عدن',
            'name_en' => 'Aden News',
            'slug' => 'aden-news',
            'description_ar' => 'أخبار عدن',
            'description_en' => 'Aden News',
            'color' => '#3182ce',
            'sort_order' => 2,
            'show_in_nav' => true,
            'order' => 2,
            'parent_id' => $local->id,
            'icon' => 'geo-alt-fill',
        ]);

        Category::create([
            'name_ar' => 'أخبار صنعاء',
            'name_en' => 'Sanaa News',
            'slug' => 'sanaa-news',
            'description_ar' => 'أخبار صنعاء',
            'description_en' => 'Sanaa News',
            'color' => '#805ad5',
            'sort_order' => 3,
            'show_in_nav' => true,
            'order' => 3,
            'parent_id' => $local->id,
            'icon' => 'geo-alt-fill',
        ]);

        // تصنيفات فرعية للتقارير
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
            'icon' => 'file-earmark-text',
        ]);

        Category::create([
            'name_ar' => 'تحقيقات ميدانية',
            'name_en' => 'Field Investigations',
            'slug' => 'field-investigations',
            'description_ar' => 'تحقيقات ميدانية',
            'description_en' => 'Field Investigations',
            'color' => '#d69e2e',
            'sort_order' => 2,
            'show_in_nav' => true,
            'order' => 2,
            'parent_id' => $reports->id,
            'icon' => 'camera-video',
        ]);

        // تصنيفات فرعية للعربي والعالمي
        Category::create([
            'name_ar' => 'أخبار عربية',
            'name_en' => 'Arabic News',
            'slug' => 'arabic-news',
            'description_ar' => 'أخبار الدول العربية',
            'description_en' => 'Arab Countries News',
            'color' => '#3182ce',
            'sort_order' => 1,
            'show_in_nav' => true,
            'order' => 1,
            'parent_id' => $arabic->id,
            'icon' => 'flag',
        ]);

        Category::create([
            'name_ar' => 'أخبار عالمية',
            'name_en' => 'International News',
            'slug' => 'international-news',
            'description_ar' => 'أخبار العالم',
            'description_en' => 'World News',
            'color' => '#38a169',
            'sort_order' => 2,
            'show_in_nav' => true,
            'order' => 2,
            'parent_id' => $arabic->id,
            'icon' => 'globe2',
        ]);

        // تصنيفات فرعية للمجتمع
        Category::create([
            'name_ar' => 'تنمية مجتمعية',
            'name_en' => 'Community Development',
            'slug' => 'community-development',
            'description_ar' => 'مشاريع التنمية المجتمعية',
            'description_en' => 'Community Development Projects',
            'color' => '#d69e2e',
            'sort_order' => 1,
            'show_in_nav' => true,
            'order' => 1,
            'parent_id' => $community->id,
            'icon' => 'heart',
        ]);

        Category::create([
            'name_ar' => 'شؤون اجتماعية',
            'name_en' => 'Social Affairs',
            'slug' => 'social-affairs',
            'description_ar' => 'الشؤون الاجتماعية',
            'description_en' => 'Social Affairs',
            'color' => '#e53e3e',
            'sort_order' => 2,
            'show_in_nav' => true,
            'order' => 2,
            'parent_id' => $community->id,
            'icon' => 'people-fill',
        ]);

        // تصنيفات فرعية للرياضة
        Category::create([
            'name_ar' => 'كرة القدم',
            'name_en' => 'Football',
            'slug' => 'football',
            'description_ar' => 'أخبار كرة القدم',
            'description_en' => 'Football News',
            'color' => '#e53e3e',
            'sort_order' => 1,
            'show_in_nav' => true,
            'order' => 1,
            'parent_id' => $sports->id,
            'icon' => 'trophy-fill',
        ]);

        Category::create([
            'name_ar' => 'رياضات أخرى',
            'name_en' => 'Other Sports',
            'slug' => 'other-sports',
            'description_ar' => 'أخبار الرياضات الأخرى',
            'description_en' => 'Other Sports News',
            'color' => '#3182ce',
            'sort_order' => 2,
            'show_in_nav' => true,
            'order' => 2,
            'parent_id' => $sports->id,
            'icon' => 'sport',
        ]);

        // تصنيفات فرعية للاقتصاد
        Category::create([
            'name_ar' => 'أعمال وتجارة',
            'name_en' => 'Business & Trade',
            'slug' => 'business-trade',
            'description_ar' => 'أخبار الأعمال والتجارة',
            'description_en' => 'Business & Trade News',
            'color' => '#38a169',
            'sort_order' => 1,
            'show_in_nav' => true,
            'order' => 1,
            'parent_id' => $economy->id,
            'icon' => 'briefcase',
        ]);

        Category::create([
            'name_ar' => 'أسواق ومال',
            'name_en' => 'Markets & Finance',
            'slug' => 'markets-finance',
            'description_ar' => 'أخبار الأسواق والمال',
            'description_en' => 'Markets & Finance News',
            'color' => '#d69e2e',
            'sort_order' => 2,
            'show_in_nav' => true,
            'order' => 2,
            'parent_id' => $economy->id,
            'icon' => 'graph-up-arrow',
        ]);
    }
}
