@extends('layouts.admin')

@section('page-title', 'لوحة التحكم')
@section('breadcrumb', 'الرئيسية')

@section('content')
<div>
    <!-- إحصائيات سريعة -->
    <div class="stats-grid">
        <div class="stat-card primary" style="opacity: 0; transform: translateY(20px);">
            <div class="stat-icon primary">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <div class="stat-number">{{ $articlesCount ?? 156 }}</div>
            <div class="stat-label">إجمالي المقالات</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up ml-1"></i>
                +12% هذا الشهر
            </div>
        </div>
        
        <div class="stat-card secondary" style="opacity: 0; transform: translateY(20px);">
            <div class="stat-icon secondary">
                <i class="bi bi-collection-play"></i>
            </div>
            <div class="stat-number">{{ $videosCount ?? 89 }}</div>
            <div class="stat-label">إجمالي الفيديوهات</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up ml-1"></i>
                +8% هذا الشهر
            </div>
        </div>
        
        <div class="stat-card accent" style="opacity: 0; transform: translateY(20px);">
            <div class="stat-icon accent">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-number">{{ $usersCount ?? 1247 }}</div>
            <div class="stat-label">إجمالي المستخدمين</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up ml-1"></i>
                +15% هذا الشهر
            </div>
        </div>
        
        <div class="stat-card dark" style="opacity: 0; transform: translateY(20px);">
            <div class="stat-icon dark">
                <i class="bi bi-eye"></i>
            </div>
            <div class="stat-number">{{ $viewsCount ?? 45678 }}</div>
            <div class="stat-label">إجمالي المشاهدات</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up ml-1"></i>
                +23% هذا الشهر
            </div>
        </div>
    </div>

    <!-- الصف الثاني - الرسوم البيانية والإحصائيات -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- رسم بياني للمشاهدات -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">إحصائيات المشاهدات</h3>
                <div class="card-actions">
                    <select class="form-select w-auto">
                        <option>آخر 7 أيام</option>
                        <option>آخر 30 يوم</option>
                        <option>آخر 3 أشهر</option>
                    </select>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="viewsChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- إحصائيات التصنيفات -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">أكثر التصنيفات نشاطاً</h3>
                <div class="card-actions">
                    <button class="btn-admin btn-admin-outline">
                        <i class="bi bi-arrow-clockwise ml-2"></i>
                        تحديث
                    </button>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-primary rounded-full ml-3"></div>
                        <span class="text-sm font-medium">الأخبار المحلية</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill primary" style="width: 75%"></div>
                        </div>
                        <span class="text-sm text-gray-600">75%</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-secondary rounded-full ml-3"></div>
                        <span class="text-sm font-medium">الرياضة</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill secondary" style="width: 60%"></div>
                        </div>
                        <span class="text-sm text-gray-600">60%</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-accent rounded-full ml-3"></div>
                        <span class="text-sm font-medium">التقنية</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill accent" style="width: 45%"></div>
                        </div>
                        <span class="text-sm text-gray-600">45%</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-dark rounded-full ml-3"></div>
                        <span class="text-sm font-medium">الثقافة</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill dark" style="width: 30%"></div>
                        </div>
                        <span class="text-sm text-gray-600">30%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- الصف الثالث - الجداول السريعة -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- أحدث المقالات -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">أحدث المقالات</h3>
                <div class="card-actions">
                    <a href="#" class="btn-admin btn-admin-primary">
                        <i class="bi bi-plus-lg ml-2"></i>
                        إضافة مقال
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>التصنيف</th>
                            <th>التاريخ</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center ml-3">
                                        <i class="bi bi-file-text text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">تطورات جديدة في مشروع حضرموت</div>
                                        <div class="text-gray-500 text-xs">بقلم: أحمد محمد</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="bg-primary text-white px-2 py-1 rounded-full text-xs">الأخبار المحلية</span>
                            </td>
                            <td>منذ ساعتين</td>
                            <td>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">منشور</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-secondary rounded-lg flex items-center justify-center ml-3">
                                        <i class="bi bi-file-text text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">نتائج مباراة الأهلي والزمالك</div>
                                        <div class="text-gray-500 text-xs">بقلم: محمد علي</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="bg-secondary text-white px-2 py-1 rounded-full text-xs">الرياضة</span>
                            </td>
                            <td>منذ 4 ساعات</td>
                            <td>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">قيد المراجعة</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center ml-3">
                                        <i class="bi bi-file-text text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">أحدث التقنيات في 2024</div>
                                        <div class="text-gray-500 text-xs">بقلم: فاطمة أحمد</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="bg-accent text-dark px-2 py-1 rounded-full text-xs">التقنية</span>
                            </td>
                            <td>منذ 6 ساعات</td>
                            <td>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">منشور</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- أحدث التعليقات -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">أحدث التعليقات</h3>
                <div class="card-actions">
                    <a href="#" class="btn-admin btn-admin-outline">
                        <i class="bi bi-eye ml-2"></i>
                        عرض الكل
                    </a>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-start space-x-3 space-x-reverse p-4 bg-gray-50 rounded-lg">
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-person text-white text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-medium text-sm">أحمد محمد</span>
                            <span class="text-gray-500 text-xs">منذ 10 دقائق</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-2">مقال رائع ومعلومات مفيدة جداً، شكراً لكم على هذا المحتوى المميز.</p>
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <button class="btn-admin btn-admin-primary text-xs px-3 py-1">
                                <i class="bi bi-check ml-1"></i>
                                موافقة
                            </button>
                            <button class="btn-admin btn-admin-outline text-xs px-3 py-1">
                                <i class="bi bi-x ml-1"></i>
                                رفض
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-start space-x-3 space-x-reverse p-4 bg-gray-50 rounded-lg">
                    <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-person text-white text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-medium text-sm">فاطمة علي</span>
                            <span class="text-gray-500 text-xs">منذ 30 دقيقة</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-2">أتمنى المزيد من المقالات في هذا المجال، محتوى ممتاز.</p>
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <button class="btn-admin btn-admin-primary text-xs px-3 py-1">
                                <i class="bi bi-check ml-1"></i>
                                موافقة
                            </button>
                            <button class="btn-admin btn-admin-outline text-xs px-3 py-1">
                                <i class="bi bi-x ml-1"></i>
                                رفض
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-start space-x-3 space-x-reverse p-4 bg-gray-50 rounded-lg">
                    <div class="w-8 h-8 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-person text-white text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-medium text-sm">محمد حسن</span>
                            <span class="text-gray-500 text-xs">منذ ساعة</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-2">معلومات قيمة ومفيدة، شكراً لكم على هذا الجهد.</p>
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <button class="btn-admin btn-admin-primary text-xs px-3 py-1">
                                <i class="bi bi-check ml-1"></i>
                                موافقة
                            </button>
                            <button class="btn-admin btn-admin-outline text-xs px-3 py-1">
                                <i class="bi bi-x ml-1"></i>
                                رفض
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- الصف الرابع - معلومات سريعة -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- نشاط النظام -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">نشاط النظام</h3>
                <div class="card-actions">
                    <i class="bi bi-circle-fill text-green-500 text-xs"></i>
                    <span class="text-xs text-gray-600">متصل</span>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">المستخدمون النشطون</span>
                    <span class="font-medium">247</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">المشاهدات اليوم</span>
                    <span class="font-medium">1,234</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">التعليقات الجديدة</span>
                    <span class="font-medium">12</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">المقالات الجديدة</span>
                    <span class="font-medium">3</span>
                </div>
            </div>
        </div>

        <!-- إحصائيات سريعة -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">إحصائيات سريعة</h3>
                <div class="card-actions">
                    <i class="bi bi-graph-up text-primary"></i>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">معدل الارتداد</span>
                    <span class="font-medium text-green-600">32%</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">متوسط وقت الجلسة</span>
                    <span class="font-medium">4:32 دقيقة</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">معدل التحويل</span>
                    <span class="font-medium text-blue-600">2.4%</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">الصفحات لكل جلسة</span>
                    <span class="font-medium">3.2</span>
                </div>
            </div>
        </div>

        <!-- المهام السريعة -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">المهام السريعة</h3>
                <div class="card-actions">
                    <i class="bi bi-list-check text-primary"></i>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-exclamation-triangle text-yellow-600 ml-2"></i>
                        <span class="text-sm">مراجعة التعليقات</span>
                    </div>
                    <span class="text-xs bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full">3</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-file-earmark-text text-blue-600 ml-2"></i>
                        <span class="text-sm">كتابة مقال جديد</span>
                    </div>
                    <span class="text-xs bg-blue-200 text-blue-800 px-2 py-1 rounded-full">مطلوب</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-gear text-green-600 ml-2"></i>
                        <span class="text-sm">تحديث الإعدادات</span>
                    </div>
                    <span class="text-xs bg-green-200 text-green-800 px-2 py-1 rounded-full">مكتمل</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-people text-purple-600 ml-2"></i>
                        <span class="text-sm">مراجعة المستخدمين</span>
                    </div>
                    <span class="text-xs bg-purple-200 text-purple-800 px-2 py-1 rounded-full">5</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // رسم بياني للمشاهدات
    const ctx = document.getElementById('viewsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'],
            datasets: [{
                label: 'المشاهدات',
                data: [1200, 1900, 3000, 5000, 2000, 3000, 4000],
                borderColor: '#C08B2D',
                backgroundColor: 'rgba(192, 139, 45, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>
@endsection
