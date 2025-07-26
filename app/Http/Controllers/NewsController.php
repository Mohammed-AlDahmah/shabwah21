<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function index()
    {
        $cacheKey = 'news_index_page';
        
        $data = Cache::remember($cacheKey, 300, function() {
            return [
                'news' => Article::forHomePage()->news()->paginate(10),
                'reports' => Article::forHomePage()->reports()->paginate(6),
                'articles' => Article::forHomePage()->articles()->paginate(6),
                'infographics' => Article::forHomePage()->infographics()->paginate(6),
                'mainCategories' => Category::whereNull('parent_id')->with('children')->orderBy('order')->get()
            ];
        });
        
        return view('news.index', $data);
    }

    public function show($slug)
    {
        $cacheKey = "article_show_{$slug}";
        
        $article = Cache::remember($cacheKey, 600, function() use ($slug) {
            return Article::where('slug', $slug)
                ->where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->firstOrFail();
        });
        
        // Increment views count
        $article->incrementViews();
        
        return view('news.show', compact('article'));
    }

    public function category($slug)
    {
        $cacheKey = "category_page_{$slug}";
        
        $data = Cache::remember($cacheKey, 300, function() use ($slug) {
            $category = Category::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();
                
            $articles = $category->articles()
                ->where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->paginate(12);
                
            return compact('category', 'articles');
        });
        
        return view('news.category', $data);
    }

    public function videos()
    {
        $cacheKey = 'videos_index_page';
        
        $videos = Cache::remember($cacheKey, 300, function() {
            return Video::where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->paginate(12);
        });
        
        return view('videos.index', compact('videos'));
    }

    public function video($slug)
    {
        $cacheKey = "video_show_{$slug}";
        
        $video = Cache::remember($cacheKey, 600, function() use ($slug) {
            return Video::where('slug', $slug)
                ->where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->firstOrFail();
        });
        
        return view('videos.show', compact('video'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $cacheKey = "search_results_{$query}";
        
        $results = Cache::remember($cacheKey, 300, function() use ($query) {
            return Article::forSearch($query)->paginate(12);
        });
        
        return view('news.search', compact('results', 'query'));
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
