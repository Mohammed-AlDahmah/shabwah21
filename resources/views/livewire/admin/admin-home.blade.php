<div class="admin-dashboard">
    <!-- إشعارات إدارية (مثال) -->
    <div class="mb-4">
        @livewire('admin.notifications')
    </div>

    <!-- Dashboard Stats Cards (أصغر) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 mb-6">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-tags"></i></div>
            <div class="stat-content">
                <h3 class="stat-title">عدد الأقسام</h3>
                <p class="stat-value">{{ $totalCategories }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-megaphone"></i></div>
            <div class="stat-content">
                <h3 class="stat-title">عدد الأخبار</h3>
                <p class="stat-value">{{ \App\Models\Article::where('type','news')->count() }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-file-earmark-text"></i></div>
            <div class="stat-content">
                <h3 class="stat-title">عدد المقالات</h3>
                <p class="stat-value">{{ \App\Models\Article::where('type','article')->count() }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-camera-video"></i></div>
            <div class="stat-content">
                <h3 class="stat-title">عدد الفيديوهات</h3>
                <p class="stat-value">{{ $totalVideos }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-people"></i></div>
            <div class="stat-content">
                <h3 class="stat-title">عدد المستخدمين</h3>
                <p class="stat-value">{{ $totalUsers }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-person-badge"></i></div>
            <div class="stat-content">
                <h3 class="stat-title">عدد المؤلفين</h3>
                <p class="stat-value">{{ \App\Models\Author::count() }}</p>
            </div>
        </div>
    </div>

    <!-- صف أحدث المحتوى المتنوع (أعرض) -->
    <div class="w-full overflow-x-auto mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-4 min-w-[900px]" style="min-width:900px;">
            <!-- أحدث المقالات -->
            <div class="content-card p-0 min-w-[220px]">
                <div class="card-header"><h3 class="card-title"><i class="bi bi-file-earmark-text ml-2"></i>أحدث المقالات</h3></div>
                <div class="divide-y">
                    @foreach($recentArticles as $item)
                        <div class="flex items-center gap-2 p-2">
                            <div class="w-10 h-10 rounded overflow-hidden flex-shrink-0 bg-gray-100 flex items-center justify-center">
                                @if($item->image)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($item->image) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="bi bi-image text-gray-300 text-xl"></i>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-xs truncate">{{ $item->title }}</div>
                                <div class="text-gray-500 text-[11px] flex items-center gap-1">
                                    <i class="bi bi-calendar"></i>{{ $item->created_at->diffForHumans() }}
                                    <span class="ml-1"><i class="bi bi-folder"></i>{{ $item->category->name ?? 'بدون قسم' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- أحدث الأخبار -->
            <div class="content-card p-0 min-w-[220px]">
                <div class="card-header"><h3 class="card-title"><i class="bi bi-megaphone ml-2"></i>أحدث الأخبار</h3></div>
                <div class="divide-y">
                    @foreach($recentNews as $item)
                        <div class="flex items-center gap-2 p-2">
                            <div class="w-10 h-10 rounded overflow-hidden flex-shrink-0 bg-gray-100 flex items-center justify-center">
                                @if($item->image)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($item->image) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="bi bi-image text-gray-300 text-xl"></i>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-xs truncate">{{ $item->title }}</div>
                                <div class="text-gray-500 text-[11px] flex items-center gap-1">
                                    <i class="bi bi-calendar"></i>{{ $item->created_at->diffForHumans() }}
                                    <span class="ml-1"><i class="bi bi-folder"></i>{{ $item->category->name ?? 'بدون قسم' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- أحدث الرأي -->
            <div class="content-card p-0 min-w-[220px]">
                <div class="card-header"><h3 class="card-title"><i class="bi bi-chat-quote ml-2"></i>أحدث الرأي</h3></div>
                <div class="divide-y">
                    @foreach($recentOpinions as $item)
                        <div class="flex items-center gap-2 p-2">
                            <div class="w-10 h-10 rounded overflow-hidden flex-shrink-0 bg-gray-100 flex items-center justify-center">
                                @if($item->image)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($item->image) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="bi bi-image text-gray-300 text-xl"></i>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-xs truncate">{{ $item->title }}</div>
                                <div class="text-gray-500 text-[11px] flex items-center gap-1">
                                    <i class="bi bi-calendar"></i>{{ $item->created_at->diffForHumans() }}
                                    <span class="ml-1"><i class="bi bi-folder"></i>{{ $item->category->name ?? 'بدون قسم' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- أحدث الفيديوهات -->
            <div class="content-card p-0 min-w-[220px]">
                <div class="card-header"><h3 class="card-title"><i class="bi bi-camera-video ml-2"></i>أحدث الفيديوهات</h3></div>
                <div class="divide-y">
                    @foreach($recentVideos as $item)
                        <div class="flex items-center gap-2 p-2">
                            <div class="w-10 h-10 rounded overflow-hidden flex-shrink-0 bg-gray-100 flex items-center justify-center">
                                @if($item->thumbnail)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($item->thumbnail) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="bi bi-camera-video text-gray-300 text-xl"></i>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-xs truncate">{{ $item->title }}</div>
                                <div class="text-gray-500 text-[11px] flex items-center gap-1">
                                    <i class="bi bi-calendar"></i>{{ $item->created_at->diffForHumans() }}
                                    <span class="ml-1"><i class="bi bi-folder"></i>{{ $item->category->name ?? 'بدون قسم' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- أحدث التقارير -->
            <div class="content-card p-0 min-w-[220px]">
                <div class="card-header"><h3 class="card-title"><i class="bi bi-journal-text ml-2"></i>أحدث التقارير</h3></div>
                <div class="divide-y">
                    @foreach($recentReports as $item)
                        <div class="flex items-center gap-2 p-2">
                            <div class="w-10 h-10 rounded overflow-hidden flex-shrink-0 bg-gray-100 flex items-center justify-center">
                                @if($item->image)
                                    <img src="{{ \App\Helpers\ImageHelper::getImageUrl($item->image) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="bi bi-image text-gray-300 text-xl"></i>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-xs truncate">{{ $item->title }}</div>
                                <div class="text-gray-500 text-[11px] flex items-center gap-1">
                                    <i class="bi bi-calendar"></i>{{ $item->created_at->diffForHumans() }}
                                    <span class="ml-1"><i class="bi bi-folder"></i>{{ $item->category->name ?? 'بدون قسم' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Site Analytics Section -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold mb-4 text-gray-700 flex items-center"><i class="bi bi-graph-up-arrow ml-2"></i>إحصائيات الزوار</h2>
        @livewire('admin.site-analytics')
    </div>

    <style>
    /* Dashboard Styles */
    .admin-dashboard {
        padding: 2rem;
    }

    /* Stat Cards */
    .stat-card {
        background: linear-gradient(135deg, rgba(192,139,45,0.95), rgba(178,43,43,0.92));
        border-radius: 1.5rem;
        box-shadow: 0 6px 32px 0 rgba(0,0,0,0.10), 0 1.5px 4px 0 rgba(0,0,0,0.08);
        color: #fff;
        padding: 2.2rem 1.2rem 1.5rem 1.2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 160px;
        position: relative;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .stat-card:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 40px 0 rgba(192,139,45,0.18), 0 2px 8px 0 rgba(178,43,43,0.10);
    }
    .stat-icon {
        font-size: 2.8rem;
        opacity: 0.92;
        margin-bottom: 1.1rem;
        filter: drop-shadow(0 2px 8px rgba(0,0,0,0.10));
    }
    .stat-title {
        font-size: 1.1rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
        color: #fff;
        text-shadow: 0 1px 4px rgba(0,0,0,0.10);
    }
    .stat-value {
        font-size: 2.7rem;
        font-weight: 900;
        color: #fff;
        text-shadow: 0 2px 8px rgba(0,0,0,0.13);
        margin-bottom: 0.2rem;
    }
    @media (max-width: 768px) {
        .stat-card { padding: 1.2rem 0.5rem; min-height: 120px; }
        .stat-icon { font-size: 2rem; }
        .stat-value { font-size: 1.5rem; }
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

    /* تحسين كروت الإحصائيات (تصغير) */
    .stat-card {
        background: linear-gradient(135deg, rgba(192,139,45,0.95), rgba(178,43,43,0.92));
        border-radius: 1.1rem;
        box-shadow: 0 3px 16px 0 rgba(0,0,0,0.10), 0 1px 2px 0 rgba(0,0,0,0.08);
        color: #fff;
        padding: 1.1rem 0.6rem 0.8rem 0.6rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 90px;
        position: relative;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .stat-card:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 6px 20px 0 rgba(192,139,45,0.13), 0 1px 4px 0 rgba(178,43,43,0.08);
    }
    .stat-icon {
        font-size: 1.5rem;
        opacity: 0.92;
        margin-bottom: 0.5rem;
        filter: drop-shadow(0 1px 4px rgba(0,0,0,0.08));
    }
    .stat-title {
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.2px;
        margin-bottom: 0.2rem;
        color: #fff;
        text-shadow: 0 1px 2px rgba(0,0,0,0.08);
    }
    .stat-value {
        font-size: 1.3rem;
        font-weight: 900;
        color: #fff;
        text-shadow: 0 1px 4px rgba(0,0,0,0.10);
        margin-bottom: 0.1rem;
        text-align: center;
    }
    @media (max-width: 768px) {
        .stat-card { padding: 0.5rem 0.2rem; min-height: 60px; }
        .stat-icon { font-size: 1rem; }
        .stat-value { font-size: 0.9rem; }
    }
    </style>

    <script>
    // نظام الإشعارات المخصص - تم نقله إلى notifications.js
    </script>
</div>