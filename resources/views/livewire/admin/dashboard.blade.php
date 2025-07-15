@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <!-- الشريط الجانبي -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand">
                <i class="bi bi-speedometer2"></i>
                <span>حضرموت21</span>
            </a>
        </div>
        <nav class="admin-sidebar-nav">
            <div class="admin-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link active">
                    <i class="bi bi-speedometer2 admin-nav-icon"></i>
                    <span>الرئيسية</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.news') }}" class="admin-nav-link">
                    <i class="bi bi-file-earmark-text admin-nav-icon"></i>
                    <span>المقالات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-collection-play admin-nav-icon"></i>
                    <span>الفيديوهات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.categories') }}" class="admin-nav-link">
                    <i class="bi bi-tags admin-nav-icon"></i>
                    <span>التصنيفات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.users') }}" class="admin-nav-link">
                    <i class="bi bi-people admin-nav-icon"></i>
                    <span>المستخدمون</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.settings') }}" class="admin-nav-link">
                    <i class="bi bi-gear admin-nav-icon"></i>
                    <span>الإعدادات</span>
                </a>
            </div>
        </nav>
        <div class="mt-auto p-3">
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-box-arrow-right admin-nav-icon"></i>
                    <span>تسجيل الخروج</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="admin-main">
        <!-- الهيدر -->
        <header class="admin-header">
            <div class="admin-header-title">
                <i class="bi bi-speedometer2 me-2"></i>
                لوحة التحكم
            </div>
            <div class="admin-header-actions">
                <div class="admin-user-menu">
                    <i class="bi bi-person-circle"></i>
                    <span>المدير</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
        </header>

        <!-- المحتوى -->
        <div class="admin-content">
            <!-- الإحصائيات -->
            <div class="admin-stats-grid admin-fade-in">
                <div class="admin-stat-card">
                    <div class="admin-stat-icon primary">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="admin-stat-number">{{ $articlesCount ?? 0 }}</div>
                    <div class="admin-stat-label">عدد المقالات</div>
                </div>
                
                <div class="admin-stat-card">
                    <div class="admin-stat-icon secondary">
                        <i class="bi bi-tags"></i>
                    </div>
                    <div class="admin-stat-number">{{ $categoriesCount ?? 0 }}</div>
                    <div class="admin-stat-label">عدد التصنيفات</div>
                </div>
                
                <div class="admin-stat-card">
                    <div class="admin-stat-icon accent">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="admin-stat-number">{{ $usersCount ?? 0 }}</div>
                    <div class="admin-stat-label">عدد المستخدمين</div>
                </div>
                
                <div class="admin-stat-card">
                    <div class="admin-stat-icon info">
                        <i class="bi bi-collection-play"></i>
                    </div>
                    <div class="admin-stat-number">{{ $videosCount ?? 0 }}</div>
                    <div class="admin-stat-label">عدد الفيديوهات</div>
                </div>
            </div>

            <!-- البطاقات الإضافية -->
            <div class="row g-4">
                <!-- بطاقة الترحيب -->
                <div class="col-lg-8">
                    <div class="admin-card admin-fade-in">
                        <div class="admin-card-header">
                            <h5 class="admin-card-title">
                                <i class="bi bi-star me-2"></i>
                                مرحباً بك في لوحة التحكم
                            </h5>
                        </div>
                        <div class="admin-card-body">
                            <p class="text-muted mb-3">
                                يمكنك من هنا إدارة جميع محتوى الموقع من مقالات وفيديوهات وتصنيفات ومستخدمين بسهولة واحترافية.
                            </p>
                            <div class="d-flex gap-2">
                                <a href="#" class="admin-btn admin-btn-primary">
                                    <i class="bi bi-plus-circle"></i>
                                    إضافة خبر جديد
                                </a>
                                <a href="#" class="admin-btn admin-btn-outline">
                                    <i class="bi bi-gear"></i>
                                    إعدادات الموقع
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- بطاقة الإجراءات السريعة -->
                <div class="col-lg-4">
                    <div class="admin-card admin-fade-in">
                        <div class="admin-card-header">
                            <h5 class="admin-card-title">
                                <i class="bi bi-lightning me-2"></i>
                                إجراءات سريعة
                            </h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="d-flex flex-column gap-2">
                                <a href="#" class="admin-btn admin-btn-outline">
                                    <i class="bi bi-file-earmark-plus"></i>
                                    مقال جديد
                                </a>
                                <a href="#" class="admin-btn admin-btn-outline">
                                    <i class="bi bi-collection-play"></i>
                                    فيديو جديد
                                </a>
                                <a href="#" class="admin-btn admin-btn-outline">
                                    <i class="bi bi-tag"></i>
                                    تصنيف جديد
                                </a>
                                <a href="#" class="admin-btn admin-btn-outline">
                                    <i class="bi bi-person-plus"></i>
                                    مستخدم جديد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- جدول آخر المقالات -->
            <div class="admin-card mt-4 admin-fade-in">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">
                        <i class="bi bi-clock-history me-2"></i>
                        آخر المقالات
                    </h5>
                </div>
                <div class="admin-card-body">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>التصنيف</th>
                                <th>التاريخ</th>
                                <th>الحالة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>عنوان المقال الأول</td>
                                <td>أخبار محلية</td>
                                <td>2024-01-15</td>
                                <td><span class="badge bg-success">منشور</span></td>
                                <td>
                                    <a href="#" class="admin-btn admin-btn-outline btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>عنوان المقال الثاني</td>
                                <td>أخبار رياضية</td>
                                <td>2024-01-14</td>
                                <td><span class="badge bg-warning">مسودة</span></td>
                                <td>
                                    <a href="#" class="admin-btn admin-btn-outline btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
// إضافة تأثيرات التحميل
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.admin-fade-in');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endsection
