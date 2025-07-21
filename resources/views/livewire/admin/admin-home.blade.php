<div class="admin-dashboard">
    <!-- Header Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
        <!-- Total Articles -->
        <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600">
            <div class="stat-icon">
                <i class="bi bi-newspaper"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-title">إجمالي المقالات</h3>
                <p class="stat-value">{{ $totalArticles }}</p>
                <p class="stat-change {{ $articlesGrowth >= 0 ? 'positive' : 'negative' }}">
                    <i class="bi bi-arrow-{{ $articlesGrowth >= 0 ? 'up' : 'down' }}"></i>
                    {{ abs($articlesGrowth) }}% هذا الشهر
                </p>
            </div>
        </div>

        <!-- Published Articles -->
        <div class="stat-card bg-gradient-to-br from-green-500 to-green-600">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-title">المقالات المنشورة</h3>
                <p class="stat-value">{{ $publishedArticles }}</p>
                <p class="stat-change {{ $publishedGrowth >= 0 ? 'positive' : 'negative' }}">
                    <i class="bi bi-arrow-{{ $publishedGrowth >= 0 ? 'up' : 'down' }}"></i>
                    {{ abs($publishedGrowth) }}% هذا الشهر
                </p>
            </div>
        </div>

        <!-- Total Views -->
        <div class="stat-card bg-gradient-to-br from-purple-500 to-purple-600">
            <div class="stat-icon">
                <i class="bi bi-eye"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-title">إجمالي المشاهدات</h3>
                <p class="stat-value">{{ number_format($totalViews) }}</p>
                <p class="stat-change {{ $viewsGrowth >= 0 ? 'positive' : 'negative' }}">
                    <i class="bi bi-arrow-{{ $viewsGrowth >= 0 ? 'up' : 'down' }}"></i>
                    {{ abs($viewsGrowth) }}% هذا الشهر
                </p>
            </div>
        </div>

        <!-- Categories -->
        <div class="stat-card bg-gradient-to-br from-orange-500 to-orange-600">
            <div class="stat-icon">
                <i class="bi bi-folder"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-title">الأقسام</h3>
                <p class="stat-value">{{ $totalCategories }}</p>
                <p class="stat-change neutral">
                    <i class="bi bi-dash"></i>
                    ثابت
                </p>
            </div>
        </div>

        <!-- Users -->
        <div class="stat-card bg-gradient-to-br from-indigo-500 to-indigo-600">
            <div class="stat-icon">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-title">المستخدمين</h3>
                <p class="stat-value">{{ $totalUsers }}</p>
                <p class="stat-change neutral">
                    <i class="bi bi-dash"></i>
                    ثابت
                </p>
            </div>
        </div>

        <!-- Videos -->
        <div class="stat-card bg-gradient-to-br from-red-500 to-red-600">
            <div class="stat-icon">
                <i class="bi bi-camera-video"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-title">الفيديوهات</h3>
                <p class="stat-value">{{ $totalVideos }}</p>
                <p class="stat-change neutral">
                    <i class="bi bi-dash"></i>
                    ثابت
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Articles -->
        <div class="lg:col-span-2">
            <div class="content-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bi bi-clock-history ml-2"></i>
                        أحدث المقالات
                    </h2>
                    <a href="{{ route('admin.articles') }}" class="btn-primary">
                        <i class="bi bi-file-text ml-2"></i>
                        إدارة المقالات
                    </a>
                </div>
                
                <div class="recent-articles">
                    @forelse($recentArticles as $article)
                        <div class="article-item">
                            <div class="article-image">
                                @if($article->image)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($article->image) }}" 
                                         alt="{{ $article->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                        <i class="bi bi-image text-gray-400 text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="article-content">
                                <h3 class="article-title">
                                    <a href="{{ route('news.show', $article->slug) }}" target="_blank" class="hover:text-[#C08B2D]">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="article-excerpt">{{ Str::limit($article->excerpt, 100) }}</p>
                                
                                <div class="article-meta">
                                    <span class="meta-item">
                                        <i class="bi bi-calendar ml-1"></i>
                                        {{ $article->created_at->diffForHumans() }}
                                    </span>
                                    <span class="meta-item">
                                        <i class="bi bi-eye ml-1"></i>
                                        {{ number_format($article->views_count ?? 0) }}
                                    </span>
                                    <span class="meta-item">
                                        <i class="bi bi-folder ml-1"></i>
                                        {{ $article->category->name ?? 'بدون قسم' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="bi bi-newspaper text-4xl text-gray-300 mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-600 mb-2">لا توجد مقالات</h3>
                            <p class="text-gray-500">ابدأ بإنشاء مقالتك الأولى</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Quick Actions -->
            <div class="content-card mb-6">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bi bi-lightning ml-2"></i>
                        إجراءات سريعة
                    </h2>
                </div>
                
                <div class="quick-actions">
                    <a href="{{ route('admin.articles') }}" class="quick-action-btn primary">
                        <i class="bi bi-plus-circle"></i>
                        <span>مقال جديد</span>
                    </a>
                    
                    <a href="{{ route('admin.categories') }}" class="quick-action-btn secondary">
                        <i class="bi bi-folder-plus"></i>
                        <span>قسم جديد</span>
                    </a>
                    
                    <a href="{{ route('admin.videos') }}" class="quick-action-btn secondary">
                        <i class="bi bi-camera-video"></i>
                        <span>فيديو جديد</span>
                    </a>
                    
                    <a href="{{ route('admin.users') }}" class="quick-action-btn secondary">
                        <i class="bi bi-person-plus"></i>
                        <span>مستخدم جديد</span>
                    </a>
                </div>
            </div>

            <!-- Popular Categories -->
            <div class="content-card mb-6">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bi bi-bar-chart ml-2"></i>
                        الأقسام الشائعة
                    </h2>
                </div>
                
                <div class="popular-categories">
                    @forelse($popularCategories as $category)
                        <div class="category-item">
                            <div class="category-info">
                                <h4 class="category-name">{{ $category->name }}</h4>
                                <p class="category-count">{{ $category->articles_count }} مقال</p>
                            </div>
                            <div class="category-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $category->percentage }}%"></div>
                                </div>
                                <span class="progress-text">{{ $category->percentage }}%</span>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="bi bi-folder text-2xl text-gray-300 mb-2"></i>
                            <p class="text-gray-500 text-sm">لا توجد أقسام</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Users -->
            <div class="content-card mb-6">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bi bi-people ml-2"></i>
                        المستخدمين الجدد
                    </h2>
                </div>
                
                <div class="recent-users">
                    @forelse($recentUsers as $user)
                        <div class="user-item">
                            <div class="user-avatar">
                                <div class="avatar-circle">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="user-info">
                                <h4 class="user-name">{{ $user->name }}</h4>
                                <p class="user-role">{{ ucfirst($user->role) }}</p>
                                <p class="user-date">{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="bi bi-people text-2xl text-gray-300 mb-2"></i>
                            <p class="text-gray-500 text-sm">لا يوجد مستخدمين</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Videos -->
            <div class="content-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bi bi-camera-video ml-2"></i>
                        أحدث الفيديوهات
                    </h2>
                </div>
                
                <div class="recent-videos">
                    @forelse($recentVideos as $video)
                        <div class="video-item">
                            <div class="video-thumbnail">
                                @if($video->thumbnail)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($video->thumbnail) }}" 
                                         alt="{{ $video->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                        <i class="bi bi-play-circle text-gray-400 text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="video-info">
                                <h4 class="video-title">{{ Str::limit($video->title, 40) }}</h4>
                                <p class="video-category">{{ $video->category->name ?? 'بدون قسم' }}</p>
                                <p class="video-date">{{ $video->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="bi bi-camera-video text-2xl text-gray-300 mb-2"></i>
                            <p class="text-gray-500 text-sm">لا توجد فيديوهات</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <style>
    /* Dashboard Styles */
    .admin-dashboard {
        padding: 2rem;
    }

    /* Stat Cards */
    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        color: white;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .stat-card:hover::before {
        left: 100%;
    }

    .stat-icon {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 2rem;
        opacity: 0.8;
    }

    .stat-content {
        position: relative;
        z-index: 1;
    }

    .stat-title {
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        opacity: 0.9;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .stat-change {
        font-size: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .stat-change.positive {
        color: #10b981;
    }

    .stat-change.negative {
        color: #ef4444;
    }

    .stat-change.neutral {
        color: #6b7280;
    }

    /* Content Cards */
    .content-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
        overflow: hidden;
    }

    .card-header {
        padding: 1.5rem;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        justify-content: between;
        align-items: center;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
        display: flex;
        align-items: center;
    }

    /* Recent Articles */
    .recent-articles {
        padding: 1.5rem;
    }

    .article-item {
        display: flex;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .article-item:last-child {
        border-bottom: none;
    }

    .article-image {
        width: 80px;
        height: 60px;
        border-radius: 0.5rem;
        overflow: hidden;
        flex-shrink: 0;
    }

    .article-content {
        flex: 1;
        min-width: 0;
    }

    .article-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
        line-height: 1.4;
    }

    .article-excerpt {
        font-size: 0.75rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .article-meta {
        display: flex;
        gap: 1rem;
    }

    .meta-item {
        font-size: 0.75rem;
        color: #9ca3af;
        display: flex;
        align-items: center;
    }

    /* Quick Actions */
    .quick-actions {
        padding: 1.5rem;
    }

    .quick-action-btn {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        border-radius: 0.75rem;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-bottom: 0.75rem;
    }

    .quick-action-btn:last-child {
        margin-bottom: 0;
    }

    .quick-action-btn.primary {
        background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);
        color: white;
    }

    .quick-action-btn.secondary {
        background: #f3f4f6;
        color: #374151;
    }

    .quick-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Popular Categories */
    .popular-categories {
        padding: 1.5rem;
    }

    .category-item {
        display: flex;
        justify-content: between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .category-item:last-child {
        border-bottom: none;
    }

    .category-info {
        flex: 1;
    }

    .category-name {
        font-size: 0.875rem;
        font-weight: 500;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .category-count {
        font-size: 0.75rem;
        color: #6b7280;
    }

    .category-progress {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: 100px;
    }

    .progress-bar {
        flex: 1;
        height: 0.5rem;
        background: #e5e7eb;
        border-radius: 0.25rem;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #C08B2D, #B22B2B);
        transition: width 0.3s ease;
    }

    .progress-text {
        font-size: 0.75rem;
        color: #6b7280;
        min-width: 2rem;
    }

    /* Recent Users */
    .recent-users {
        padding: 1.5rem;
    }

    .user-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .user-item:last-child {
        border-bottom: none;
    }

    .avatar-circle {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: linear-gradient(135deg, #C08B2D, #B22B2B);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1rem;
    }

    .user-info {
        flex: 1;
    }

    .user-name {
        font-size: 0.875rem;
        font-weight: 500;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .user-role {
        font-size: 0.75rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .user-date {
        font-size: 0.75rem;
        color: #9ca3af;
    }

    /* Recent Videos */
    .recent-videos {
        padding: 1.5rem;
    }

    .video-item {
        display: flex;
        gap: 1rem;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .video-item:last-child {
        border-bottom: none;
    }

    .video-thumbnail {
        width: 60px;
        height: 40px;
        border-radius: 0.375rem;
        overflow: hidden;
        flex-shrink: 0;
    }

    .video-info {
        flex: 1;
    }

    .video-title {
        font-size: 0.875rem;
        font-weight: 500;
        color: #1f2937;
        margin-bottom: 0.25rem;
        line-height: 1.3;
    }

    .video-category {
        font-size: 0.75rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .video-date {
        font-size: 0.75rem;
        color: #9ca3af;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #6b7280;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .admin-dashboard {
            padding: 1rem;
        }
        
        .stat-card {
            padding: 1rem;
        }
        
        .stat-value {
            font-size: 1.5rem;
        }
        
        .article-item {
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .article-image {
            width: 100%;
            height: 120px;
        }
    }
    </style>

    <script>
    // SweetAlert2 Toast Function
    window.addEventListener('showToast', event => {
        const { type, title, message } = event.detail;
        
        Swal.fire({
            icon: type,
            title: title,
            text: message,
            toast: true,
             position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6',
            color: '#ffffff',
            customClass: {
                popup: 'swal2-toast'
            }
        });
    });
    </script>
</div>