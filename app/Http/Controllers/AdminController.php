<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Author;
use App\Models\Article;
use App\Models\Category;
use App\Models\Video;
use App\Models\SiteSettings;

class AdminController extends Controller
{
    /**
     * Show login page
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }

    /**
     * Authenticate user
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->withInput($request->only('email'));
    }

    /**
     * Show dashboard
     */
    public function dashboard()
    {
        // Load dashboard data
        $totalArticles = Article::count();
        $publishedArticles = Article::where('is_published', true)->count();
        $totalViews = Article::sum('views_count');
        $totalCategories = Category::count();
        
        // Calculate growth
        $now = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();
        
        $currentMonthArticles = Article::whereMonth('created_at', $now->month)->count();
        $lastMonthArticles = Article::whereMonth('created_at', $lastMonth->month)->count();
        $articlesGrowth = $lastMonthArticles > 0 ? round((($currentMonthArticles - $lastMonthArticles) / $lastMonthArticles) * 100, 1) : 0;
        
        $currentMonthPublished = Article::where('is_published', true)->whereMonth('created_at', $now->month)->count();
        $lastMonthPublished = Article::where('is_published', true)->whereMonth('created_at', $lastMonth->month)->count();
        $publishedGrowth = $lastMonthPublished > 0 ? round((($currentMonthPublished - $lastMonthPublished) / $lastMonthPublished) * 100, 1) : 0;
        
        $currentMonthViews = Article::whereMonth('created_at', $now->month)->sum('views_count');
        $lastMonthViews = Article::whereMonth('created_at', $lastMonth->month)->sum('views_count');
        $viewsGrowth = $lastMonthViews > 0 ? round((($currentMonthViews - $lastMonthViews) / $lastMonthViews) * 100, 1) : 0;
        
        // Recent articles
        $recentArticles = Article::with('category')
            ->latest('created_at')
            ->take(5)
            ->get();
        
        // Popular categories
        $categories = Category::withCount('articles')->get();
        $totalArticlesForPercentage = $categories->sum('articles_count');
        
        $popularCategories = $categories->map(function ($category) use ($totalArticlesForPercentage) {
            $category->percentage = $totalArticlesForPercentage > 0 ? round(($category->articles_count / $totalArticlesForPercentage) * 100, 1) : 0;
            return $category;
        })->sortByDesc('articles_count')->take(5);
        
        return view('livewire.admin.dashboard', compact(
            'totalArticles',
            'publishedArticles', 
            'totalViews',
            'totalCategories',
            'articlesGrowth',
            'publishedGrowth',
            'viewsGrowth',
            'recentArticles',
            'popularCategories'
        ));
    }

    /**
     * Show articles management
     */
    public function articles()
    {
        $articles = Article::with('category', 'author')
            ->latest()
            ->paginate(15);
            
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show create article form
     */
    public function createArticle()
    {
        $categories = Category::where('is_active', true)->get();
        $authors = Author::where('is_active', true)->get();
        return view('admin.articles.create', compact('categories', 'authors'));
    }

    /**
     * Store new article
     */
    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $article = Article::create($validated);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->update(['image' => $imagePath]);
        }

        return redirect()->route('admin.articles.index')
            ->with('success', 'تم إنشاء المقال بنجاح');
    }

    /**
     * Show edit article form
     */
    public function editArticle(Article $article)
    {
        $categories = Category::all();
        $authors = Article::where('is_active', 'true')->get();
        
        return view('admin.articles.edit', compact('article', 'categories', 'authors'));
    }

    /**
     * Update article
     */
    public function updateArticle(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $article->update($validated);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->update(['image' => $imagePath]);
        }

        return redirect()->route('admin.articles.index')
            ->with('success', 'تم تحديث المقال بنجاح');
    }

    /**
     * Delete article
     */
    public function deleteArticle(Article $article)
    {
        $article->delete();
        
        return redirect()->route('admin.articles.index')
            ->with('success', 'تم حذف المقال بنجاح');
    }

    /**
     * Show categories management
     */
    public function categories()
    {
        $categories = Category::withCount('articles')
            ->latest()
            ->paginate(15);
            
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show create category form
     */
    public function createCategory()
    {
        return view('admin.categories.create');
    }

    /**
     * Store new category
     */
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string|max:500',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:50',
        ]);

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'تم إنشاء القسم بنجاح');
    }

    /**
     * Show edit category form
     */
    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update category
     */
    public function updateCategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:500',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:50',
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'تم تحديث القسم بنجاح');
    }

    /**
     * Delete category
     */
    public function deleteCategory(Category $category)
    {
        if ($category->articles()->count() > 0) {
            return back()->with('error', 'لا يمكن حذف القسم لوجود مقالات مرتبطة به');
        }
        
        $category->delete();
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'تم حذف القسم بنجاح');
    }

    /**
     * Show videos management
     */
    public function videos()
    {
        $videos = Video::latest()->paginate(15);
        
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show create video form
     */
    public function createVideo()
    {
        return view('admin.videos.create');
    }

    /**
     * Store new video
     */
    public function storeVideo(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'url' => 'required|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'nullable|string|max:10',
            'is_published' => 'boolean',
        ]);

        $video = Video::create($validated);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('videos', 'public');
            $video->update(['thumbnail' => $thumbnailPath]);
        }

        return redirect()->route('admin.videos.index')
            ->with('success', 'تم إنشاء الفيديو بنجاح');
    }

    /**
     * Show edit video form
     */
    public function editVideo(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update video
     */
    public function updateVideo(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'url' => 'required|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'nullable|string|max:10',
            'is_published' => 'boolean',
        ]);

        $video->update($validated);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('videos', 'public');
            $video->update(['thumbnail' => $thumbnailPath]);
        }

        return redirect()->route('admin.videos.index')
            ->with('success', 'تم تحديث الفيديو بنجاح');
    }

    /**
     * Delete video
     */
    public function deleteVideo(Video $video)
    {
        $video->delete();
        
        return redirect()->route('admin.videos.index')
            ->with('success', 'تم حذف الفيديو بنجاح');
    }

    /**
     * Show users management
     */
    public function users()
    {
        $users = User::latest()->paginate(15);
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show create user form
     */
    public function createUser()
    {
        return view('admin.users.create');
    }

    /**
     * Store new user
     */
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,editor,author',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'تم إنشاء المستخدم بنجاح');
    }

    /**
     * Show edit user form
     */
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,editor,author',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'تم تحديث المستخدم بنجاح');
    }

    /**
     * Delete user
     */
    public function deleteUser(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'لا يمكن حذف حسابك الحالي');
        }
        
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'تم حذف المستخدم بنجاح');
    }

    /**
     * Show settings
     */
    public function settings()
    {
        $settings = SiteSettings::first();
        
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings
     */
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'site_keywords' => 'nullable|string|max:500',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:ico,png|max:1024',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:20',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_youtube' => 'nullable|url',
        ]);

        $settings = SiteSettings::firstOrCreate([]);
        $settings->update($validated);

        if ($request->hasFile('site_logo')) {
            $logoPath = $request->file('site_logo')->store('site', 'public');
            $settings->update(['site_logo' => $logoPath]);
        }

        if ($request->hasFile('site_favicon')) {
            $faviconPath = $request->file('site_favicon')->store('site', 'public');
            $settings->update(['site_favicon' => $faviconPath]);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'تم تحديث الإعدادات بنجاح');
    }

    /**
     * Show backup management
     */
    public function backup()
    {
        return view('admin.backup.index');
    }

    /**
     * Create backup
     */
    public function createBackup()
    {
        // Implement backup logic here
        return redirect()->route('admin.backup.index')
            ->with('success', 'تم إنشاء النسخة الاحتياطية بنجاح');
    }

    /**
     * Download backup
     */
    public function downloadBackup($path)
    {
        if (Storage::disk('local')->exists($path)) {
            return Storage::disk('local')->download($path);
        }

        abort(404, 'الملف غير موجود');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')
            ->with('success', 'تم تسجيل الخروج بنجاح');
    }
} 