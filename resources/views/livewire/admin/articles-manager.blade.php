@extends('layouts.admin')

@section('page-title', 'إدارة المقالات')
@section('breadcrumb', 'المقالات')

@section('content')
<div>
    <!-- شريط الأدوات -->
    <div class="content-card mb-6">
        <div class="card-header-admin">
            <h3 class="card-title">أدوات إدارة المقالات</h3>
            <div class="card-actions">
                <button class="btn-admin btn-admin-outline" onclick="toggleFilters()">
                    <i class="bi bi-funnel ml-2"></i>
                    الفلاتر
                </button>
                <a href="#" class="btn-admin btn-admin-primary">
                    <i class="bi bi-plus-lg ml-2"></i>
                    إضافة مقال جديد
                </a>
            </div>
        </div>
        
        <!-- الفلاتر -->
        <div id="filters-section" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-4 border-t border-gray-200">
                <div class="form-group">
                    <label class="form-label">التصنيف</label>
                    <select class="form-select">
                        <option value="">جميع التصنيفات</option>
                        <option value="local">الأخبار المحلية</option>
                        <option value="sports">الرياضة</option>
                        <option value="tech">التقنية</option>
                        <option value="culture">الثقافة</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">الحالة</label>
                    <select class="form-select">
                        <option value="">جميع الحالات</option>
                        <option value="published">منشور</option>
                        <option value="draft">مسودة</option>
                        <option value="pending">قيد المراجعة</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">التاريخ</label>
                    <input type="date" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label">البحث</label>
                    <input type="text" placeholder="البحث في المقالات..." class="form-input">
                </div>
            </div>
        </div>
    </div>

    <!-- إحصائيات سريعة -->
    <div class="stats-grid mb-6">
        <div class="stat-card primary">
            <div class="stat-icon primary">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <div class="stat-number">156</div>
            <div class="stat-label">إجمالي المقالات</div>
        </div>
        
        <div class="stat-card secondary">
            <div class="stat-icon secondary">
                <i class="bi bi-eye"></i>
            </div>
            <div class="stat-number">45,678</div>
            <div class="stat-label">إجمالي المشاهدات</div>
        </div>
        
        <div class="stat-card accent">
            <div class="stat-icon accent">
                <i class="bi bi-chat-dots"></i>
            </div>
            <div class="stat-number">1,234</div>
            <div class="stat-label">إجمالي التعليقات</div>
        </div>
        
        <div class="stat-card dark">
            <div class="stat-icon dark">
                <i class="bi bi-clock"></i>
            </div>
            <div class="stat-number">12</div>
            <div class="stat-label">في انتظار المراجعة</div>
        </div>
    </div>

    <!-- جدول المقالات -->
    <div class="content-card">
        <div class="card-header-admin">
            <h3 class="card-title">قائمة المقالات</h3>
            <div class="card-actions">
                <div class="flex items-center space-x-2 space-x-reverse">
                    <span class="text-sm text-gray-600">عرض:</span>
                    <select class="form-select w-auto">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </th>
                        <th>المقال</th>
                        <th>التصنيف</th>
                        <th>الكاتب</th>
                        <th>التاريخ</th>
                        <th>المشاهدات</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden ml-3">
                                    <img src="https://via.placeholder.com/48x48" alt="صورة المقال" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="font-medium">تطورات جديدة في مشروع حضرموت</div>
                                    <div class="text-gray-500 text-xs">معلومات عن آخر التطورات في مشروع حضرموت...</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-primary text-white px-2 py-1 rounded-full text-xs">الأخبار المحلية</span>
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center ml-2">
                                    <i class="bi bi-person text-white text-xs"></i>
                                </div>
                                <span class="text-sm">أحمد محمد</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-15</div>
                                <div class="text-gray-500">منذ ساعتين</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div class="font-medium">1,234</div>
                                <div class="text-green-600 text-xs">+12%</div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">منشور</span>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="معاينة">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">نسخ الرابط</a>
                                        <a href="#" class="dropdown-item">إرسال للطباعة</a>
                                        <a href="#" class="dropdown-item text-red-600">حذف</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden ml-3">
                                    <img src="https://via.placeholder.com/48x48" alt="صورة المقال" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="font-medium">نتائج مباراة الأهلي والزمالك</div>
                                    <div class="text-gray-500 text-xs">تفاصيل مباراة الأهلي والزمالك في الدوري المصري...</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-secondary text-white px-2 py-1 rounded-full text-xs">الرياضة</span>
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-secondary rounded-full flex items-center justify-center ml-2">
                                    <i class="bi bi-person text-white text-xs"></i>
                                </div>
                                <span class="text-sm">محمد علي</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-15</div>
                                <div class="text-gray-500">منذ 4 ساعات</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div class="font-medium">856</div>
                                <div class="text-green-600 text-xs">+8%</div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">قيد المراجعة</span>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="معاينة">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">نسخ الرابط</a>
                                        <a href="#" class="dropdown-item">إرسال للطباعة</a>
                                        <a href="#" class="dropdown-item text-red-600">حذف</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden ml-3">
                                    <img src="https://via.placeholder.com/48x48" alt="صورة المقال" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="font-medium">أحدث التقنيات في 2024</div>
                                    <div class="text-gray-500 text-xs">تعرف على أحدث التقنيات التي ستشكل مستقبل التكنولوجيا...</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-accent text-dark px-2 py-1 rounded-full text-xs">التقنية</span>
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-accent rounded-full flex items-center justify-center ml-2">
                                    <i class="bi bi-person text-dark text-xs"></i>
                                </div>
                                <span class="text-sm">فاطمة أحمد</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-14</div>
                                <div class="text-gray-500">منذ يوم</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div class="font-medium">2,345</div>
                                <div class="text-green-600 text-xs">+25%</div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">منشور</span>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="معاينة">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">نسخ الرابط</a>
                                        <a href="#" class="dropdown-item">إرسال للطباعة</a>
                                        <a href="#" class="dropdown-item text-red-600">حذف</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden ml-3">
                                    <img src="https://via.placeholder.com/48x48" alt="صورة المقال" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="font-medium">مهرجان التراث الحضرمي</div>
                                    <div class="text-gray-500 text-xs">تفاصيل مهرجان التراث الحضرمي السنوي...</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-dark text-white px-2 py-1 rounded-full text-xs">الثقافة</span>
                        </td>
                        <td>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-dark rounded-full flex items-center justify-center ml-2">
                                    <i class="bi bi-person text-white text-xs"></i>
                                </div>
                                <span class="text-sm">علي حسن</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-13</div>
                                <div class="text-gray-500">منذ يومين</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div class="font-medium">678</div>
                                <div class="text-red-600 text-xs">-5%</div>
                            </div>
                        </td>
                        <td>
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">مسودة</span>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="معاينة">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">نسخ الرابط</a>
                                        <a href="#" class="dropdown-item">إرسال للطباعة</a>
                                        <a href="#" class="dropdown-item text-red-600">حذف</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- الترقيم -->
        <div class="flex items-center justify-between mt-6 pt-6 border-t border-gray-200">
            <div class="text-sm text-gray-600">
                عرض 1 إلى 4 من 156 مقال
            </div>
            <div class="flex items-center space-x-2 space-x-reverse">
                <button class="btn-admin btn-admin-outline px-3 py-2">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <button class="btn-admin btn-admin-primary px-3 py-2">1</button>
                <button class="btn-admin btn-admin-outline px-3 py-2">2</button>
                <button class="btn-admin btn-admin-outline px-3 py-2">3</button>
                <span class="px-3 py-2 text-gray-600">...</span>
                <button class="btn-admin btn-admin-outline px-3 py-2">16</button>
                <button class="btn-admin btn-admin-outline px-3 py-2">
                    <i class="bi bi-chevron-left"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function toggleFilters() {
    const filtersSection = document.getElementById('filters-section');
    filtersSection.classList.toggle('hidden');
}

// تفعيل القوائم المنسدلة
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.dropdown-admin').forEach(dropdown => {
        const button = dropdown.querySelector('button');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            menu.classList.toggle('hidden');
        });
    });

    // إغلاق القوائم المنسدلة عند النقر خارجها
    document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    });
});
</script>
@endsection