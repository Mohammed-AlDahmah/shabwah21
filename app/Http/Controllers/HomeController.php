<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // الأخبار العاجلة
        $breakingNews = Article::published()
            ->breaking()
            ->latest('published_at')
            ->take(5)
            ->get();

        // الخبر الرئيسي المميز
        $featuredNews = Article::published()
            ->featured()
            ->latest('published_at')
            ->first();

        // آخر الأخبار
        $latestNews = Article::published()
            ->latest('published_at')
            ->take(6)
            ->get();

        // أخبار الرياضة
        $sportsNews = Article::published()
            ->whereHas('category', function($q) {
                $q->where('slug', 'sports');
            })
            ->latest('published_at')
            ->take(4)
            ->get();

        // أخبار التكنولوجيا
        $techNews = Article::published()
            ->whereHas('category', function($q) {
                $q->where('slug', 'technology');
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        // الأكثر قراءة
        $popularNews = Article::published()
            ->orderBy('views_count', 'desc')
            ->take(5)
            ->get();

        // جميع التصنيفات النشطة
        $categories = Category::active()
            ->ordered()
            ->get();

        return view('homepage', compact(
            'breakingNews',
            'featuredNews',
            'latestNews',
            'sportsNews',
            'techNews',
            'popularNews',
            'categories'
        ));
    }
}