<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $cacheKey = 'homepage_articles_page_' . request('page', 1); // كاش منفصل لكل صفحة لتجنب تخزين كل البيانات
        $expiration = now()->addMinutes(15); // تقليل الوقت إلى 15 دقيقة لتحديث أسرع

        $articles = Cache::remember($cacheKey, $expiration, function () {
            return Article::with([
                    'category:id,name_ar,slug', // تحسين: إضافة slug إذا كنت تستخدم روابط
                    'author:id,name'
                ])
                ->select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'category_id', 'author_id', 'type') // إضافة type
                ->where('is_published', true)
                ->where('type', 'news') // فلتر على type='news' لعرض الأخبار فقط (غير إذا لزم)
                ->orderBy('published_at', 'desc')
                ->simplePaginate(15); // simplePaginate أسرع من paginate للصفحات الكبيرة
        });

        return view('home', compact('articles'));
    }
}