@extends('layouts.app')

@section('content')
<div class="category-page">
    <!-- Hero Section -->
    <div class="category-hero" style="background: linear-gradient(135deg, {{ $category->color }}20 0%, {{ $category->color }}10 100%);">
        <div class="container mx-auto px-4 py-12">
            <div class="text-center">
                <!-- Category Icon -->
                <div class="category-icon-wrapper mb-6">
                    <div class="category-icon" style="background: linear-gradient(135deg, {{ $category->color }}, {{ $category->color }}dd);">
                        @if($category->icon)
                            <i class="bi bi-{{ $category->icon }} text-4xl text-white"></i>
                        @else
                            <i class="bi bi-folder text-4xl text-white"></i>
                        @endif
                    </div>
                </div>
                
                <!-- Category Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4 category-title">
                    {{ $category->name_ar }}
                </h1>
                
                <!-- Category Description -->
                @if($category->description_ar)
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        {{ $category->description_ar }}
                    </p>
                @endif
                
                <!-- Category Stats -->
                <div class="category-stats mt-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-2xl mx-auto">
                        <div class="stat-card">
                            <div class="stat-number">{{ number_format($articles->total()) }}</div>
                            <div class="stat-label">إجمالي الأخبار</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">{{ $articles->count() }}</div>
                            <div class="stat-label">في هذه الصفحة</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">{{ $category->articles()->where('is_breaking', true)->count() }}</div>
                            <div class="stat-label">أخبار عاجلة</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container mx-auto px-4 py-4">
            <nav class="breadcrumb-nav">
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="breadcrumb-link">
                            <i class="bi bi-house"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-separator">
                        <i class="bi bi-chevron-left"></i>
                    </li>
                    <li class="breadcrumb-item active">
                        <span class="breadcrumb-text">{{ $category->name_ar }}</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Articles Grid -->
        @if($articles->count() > 0)
            <div class="articles-section">
                <div class="section-header mb-8">
                    <h2 class="section-title">أحدث الأخبار في {{ $category->name_ar }}</h2>
                    <div class="section-line"></div>
                </div>
                
                <div class="articles-grid">
                    @foreach($articles as $article)
                        <article class="article-card">
                            <!-- Article Image -->
                            <div class="article-image">
                                @if($article->featured_image)
                                    <img src="{{ $article->featured_image }}" 
                                         alt="{{ $article->title }}" 
                                         class="article-img">
                                @else
                                    <div class="article-placeholder">
                                        <i class="bi bi-image text-4xl text-gray-400"></i>
                                        <span class="text-sm text-gray-500 mt-2">شبوة21</span>
                                    </div>
                                @endif
                                
                                <!-- Article Badges -->
                                <div class="article-badges">
                                    @if($article->is_breaking)
                                        <span class="badge badge-breaking">
                                            <i class="bi bi-lightning"></i>
                                            عاجل
                                        </span>
                                    @endif
                                    @if($article->is_featured)
                                        <span class="badge badge-featured">
                                            <i class="bi bi-star"></i>
                                            مميز
                                        </span>
                                    @endif
                                </div>
                                
                                <!-- Article Overlay -->
                                <div class="article-overlay">
                                    <a href="{{ route('news.show', $article->slug) }}" class="read-more-btn">
                                        <i class="bi bi-arrow-left"></i>
                                        اقرأ المزيد
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Article Content -->
                            <div class="article-content">
                                <div class="article-meta">
                                    <span class="article-category" style="color: {{ $category->color }};">
                                        <i class="bi bi-tag"></i>
                                        {{ $category->name_ar }}
                                    </span>
                                    <span class="article-date">
                                        <i class="bi bi-calendar3"></i>
                                        {{ $article->published_at ? $article->published_at->format('Y-m-d') : '' }}
                                    </span>
                                </div>
                                
                                <h3 class="article-title">
                                    <a href="{{ route('news.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                
                                <p class="article-excerpt">
                                    {{ $article->excerpt }}
                                </p>
                                
                                <div class="article-footer">
                                    <div class="article-author">
                                        <i class="bi bi-person"></i>
                                        <span>{{ $article->author ?? 'شبوة21' }}</span>
                                    </div>
                                    <div class="article-views">
                                        <i class="bi bi-eye"></i>
                                        <span>{{ number_format($article->views_count ?? 0) }}</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="pagination-section">
                    {{ $articles->links() }}
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <h3 class="empty-title">لا توجد أخبار</h3>
                <p class="empty-description">لم يتم العثور على أخبار في هذا التصنيف حالياً</p>
                <div class="empty-actions">
                    <a href="{{ route('home') }}" class="btn-primary">
                        <i class="bi bi-house"></i>
                        العودة للرئيسية
                    </a>
                </div>
            </div>
        @endif

        <!-- Related Categories -->
        <div class="related-categories">
            <div class="section-header mb-8">
                <h2 class="section-title">تصفح التصنيفات الأخرى</h2>
                <div class="section-line"></div>
            </div>
            
            <div class="categories-grid">
                @php
                    $otherCategories = \App\Models\Category::where('id', '!=', $category->id)
                        ->where('is_active', true)
                        ->orderBy('sort_order')
                        ->take(8)
                        ->get();
                @endphp
                
                @foreach($otherCategories as $otherCategory)
                    <a href="{{ route('news.category', $otherCategory->slug) }}" 
                       class="category-card">
                        <div class="category-card-icon" style="background: linear-gradient(135deg, {{ $otherCategory->color }}, {{ $otherCategory->color }}dd);">
                            @if($otherCategory->icon)
                                <i class="bi bi-{{ $otherCategory->icon }}"></i>
                            @else
                                <i class="bi bi-folder"></i>
                            @endif
                        </div>
                        <div class="category-card-content">
                            <h3 class="category-card-title">{{ $otherCategory->name_ar }}</h3>
                            <p class="category-card-count">{{ number_format($otherCategory->articles()->count()) }} خبر</p>
                        </div>
                        <div class="category-card-arrow">
                            <i class="bi bi-arrow-left"></i>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Category Page Styles -->
<style>
.category-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
}

/* Hero Section */
.category-hero {
    position: relative;
    overflow: hidden;
}

.category-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(0,0,0,0.02)"/><circle cx="75" cy="75" r="1" fill="rgba(0,0,0,0.02)"/><circle cx="50" cy="10" r="0.5" fill="rgba(0,0,0,0.02)"/><circle cx="10" cy="60" r="0.5" fill="rgba(0,0,0,0.02)"/><circle cx="90" cy="40" r="0.5" fill="rgba(0,0,0,0.02)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.5;
}

.category-icon-wrapper {
    display: flex;
    justify-content: center;
}

.category-icon {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.category-title {
    background: linear-gradient(135deg, #2d3748, #4a5568);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Stats */
.category-stats {
    margin-top: 2rem;
}

.stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: 1rem;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.stat-number {
    font-size: 2rem;
    font-weight: bold;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #6b7280;
    font-size: 0.875rem;
}

/* Breadcrumb */
.breadcrumb-section {
    background: white;
    border-bottom: 1px solid #e5e7eb;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
}

.breadcrumb-list {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
}

.breadcrumb-link {
    color: #6b7280;
    text-decoration: none;
    padding: 0.5rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breadcrumb-link:hover {
    color: var(--primary-color);
    background: rgba(192, 139, 45, 0.1);
}

.breadcrumb-separator {
    color: #d1d5db;
    margin: 0 0.5rem;
}

.breadcrumb-text {
    color: var(--primary-color);
    font-weight: 600;
}

/* Section Headers */
.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2d3748;
    margin-bottom: 1rem;
    position: relative;
}

.section-line {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    margin: 0 auto;
    border-radius: 2px;
}

/* Articles Grid */
.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.article-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
    position: relative;
}

.article-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
}

.article-image {
    position: relative;
    height: 240px;
    overflow: hidden;
}

.article-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.article-card:hover .article-img {
    transform: scale(1.1);
}

.article-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
}

.article-badges {
    position: absolute;
    top: 1rem;
    right: 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.badge {
    padding: 0.25rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.75rem;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    backdrop-filter: blur(10px);
}

.badge-breaking {
    background: rgba(220, 38, 38, 0.9);
    color: white;
}

.badge-featured {
    background: rgba(245, 158, 11, 0.9);
    color: white;
}

.article-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.article-card:hover .article-overlay {
    opacity: 1;
}

.read-more-btn {
    color: white;
    text-decoration: none;
    padding: 0.75rem 1.5rem;
    border: 2px solid white;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.read-more-btn:hover {
    background: white;
    color: #2d3748;
}

.article-content {
    padding: 1.5rem;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    font-size: 0.875rem;
}

.article-category,
.article-date {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    color: #6b7280;
}

.article-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.article-title a {
    color: #2d3748;
    text-decoration: none;
    transition: color 0.3s ease;
}

.article-title a:hover {
    color: var(--primary-color);
}

.article-excerpt {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.article-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: #9ca3af;
}

.article-author,
.article-views {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    font-size: 4rem;
    color: #d1d5db;
    margin-bottom: 1rem;
}

.empty-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.empty-description {
    color: #9ca3af;
    margin-bottom: 2rem;
}

.empty-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(192, 139, 45, 0.3);
    color: white;
}

/* Related Categories */
.related-categories {
    margin-top: 4rem;
    padding-top: 3rem;
    border-top: 1px solid #e5e7eb;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
}

.category-card {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    text-decoration: none;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
    gap: 1rem;
    position: relative;
    overflow: hidden;
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

.category-card:hover::before {
    left: 100%;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
}

.category-card-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.category-card-content {
    flex: 1;
}

.category-card-title {
    font-size: 1.125rem;
    font-weight: bold;
    color: #2d3748;
    margin-bottom: 0.25rem;
}

.category-card-count {
    color: #6b7280;
    font-size: 0.875rem;
}

.category-card-arrow {
    color: #d1d5db;
    transition: all 0.3s ease;
}

.category-card:hover .category-card-arrow {
    color: var(--primary-color);
    transform: translateX(-5px);
}

/* Pagination */
.pagination-section {
    display: flex;
    justify-content: center;
    margin-top: 3rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .category-hero {
        padding: 2rem 0;
    }
    
    .category-icon {
        width: 80px;
        height: 80px;
    }
    
    .category-title {
        font-size: 2rem;
    }
    
    .articles-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .stat-card {
        padding: 1rem;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}

/* Animation for page load */
.category-page {
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection 