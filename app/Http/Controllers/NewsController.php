<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Video;

class NewsController extends Controller
{
    public function index()
    {
        $news = Article::news()->latest()->paginate(10);
        $reports = Article::reports()->latest()->paginate(6);
        $articles = Article::articles()->latest()->paginate(6);
        $infographics = Article::infographics()->latest()->paginate(6);
        $mainCategories = Category::whereNull('parent_id')->with('children')->orderBy('order')->get();
        return view('news.index', compact('news', 'reports', 'articles', 'infographics', 'mainCategories'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();
            
        // Increment views count
        $article->incrementViews();
        
        return view('news.show', compact('article'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
            
        $articles = $category->articles()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(12);
            
        return view('news.category', compact('category', 'articles'));
    }

    public function videos()
    {
        $videos = Video::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(12);
            
        return view('videos.index', compact('videos'));
    }

    public function video($slug)
    {
        $video = Video::where('slug', $slug)
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();
            
        return view('videos.show', compact('video'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $articles = Article::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->orderBy('published_at', 'desc')
            ->paginate(12);
            
        return view('news.search', compact('articles', 'query'));
    }

    /**
     * صفحة القصائد الشعرية
     */
    public function poems()
    {
        $category = Category::where('slug', 'poems')->first();
        $articles = Article::where('category_id', $category->id)
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(12);
            
        return view('news.category.poems', compact('category', 'articles'));
    }

    /**
     * صفحة الطب والصحة
     */
    public function health()
    {
        $category = Category::where('slug', 'health')->first();
        $articles = Article::where('category_id', $category->id)
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(12);
            
        return view('news.category.health', compact('category', 'articles'));
    }

    /**
     * صفحة التهاني والتعازي
     */
    public function greetings()
    {
        $category = Category::where('slug', 'greetings')->first();
        $articles = Article::where('category_id', $category->id)
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(12);
            
        return view('news.category.greetings', compact('category', 'articles'));
    }

    public function infographics()
    {
        $articles = Article::where('type', 'infographic')
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(12);
        return view('news.category.infographics', compact('articles'));
    }
}
