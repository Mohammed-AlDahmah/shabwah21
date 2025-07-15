@extends('layouts.admin')

@section('page-title', 'إدارة المستخدمين')
@section('breadcrumb', 'المستخدمون')

@section('content')
<div>
    <!-- شريط الأدوات -->
    <div class="content-card mb-6">
        <div class="card-header-admin">
            <h3 class="card-title">أدوات إدارة المستخدمين</h3>
            <div class="card-actions">
                <button class="btn-admin btn-admin-outline" onclick="toggleFilters()">
                    <i class="bi bi-funnel ml-2"></i>
                    الفلاتر
                </button>
                <a href="#" class="btn-admin btn-admin-primary">
                    <i class="bi bi-person-plus ml-2"></i>
                    إضافة مستخدم جديد
                </a>
            </div>
        </div>
        
        <!-- الفلاتر -->
        <div id="filters-section" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-4 border-t border-gray-200">
                <div class="form-group">
                    <label class="form-label">الدور</label>
                    <select class="form-select">
                        <option value="">جميع الأدوار</option>
                        <option value="admin">مدير</option>
                        <option value="editor">محرر</option>
                        <option value="author">كاتب</option>
                        <option value="user">مستخدم</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">الحالة</label>
                    <select class="form-select">
                        <option value="">جميع الحالات</option>
                        <option value="active">نشط</option>
                        <option value="inactive">غير نشط</option>
                        <option value="banned">محظور</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">تاريخ التسجيل</label>
                    <input type="date" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label">البحث</label>
                    <input type="text" placeholder="البحث في المستخدمين..." class="form-input">
                </div>
            </div>
        </div>
    </div>

    <!-- إحصائيات سريعة -->
    <div class="stats-grid mb-6">
        <div class="stat-card primary">
            <div class="stat-icon primary">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-number">1,247</div>
            <div class="stat-label">إجمالي المستخدمين</div>
        </div>
        
        <div class="stat-card secondary">
            <div class="stat-icon secondary">
                <i class="bi bi-person-check"></i>
            </div>
            <div class="stat-number">1,156</div>
            <div class="stat-label">المستخدمون النشطون</div>
        </div>
        
        <div class="stat-card accent">
            <div class="stat-icon accent">
                <i class="bi bi-person-plus"></i>
            </div>
            <div class="stat-number">45</div>
            <div class="stat-label">مستخدمين جدد هذا الشهر</div>
        </div>
        
        <div class="stat-card dark">
            <div class="stat-icon dark">
                <i class="bi bi-shield-check"></i>
            </div>
            <div class="stat-number">12</div>
            <div class="stat-label">المديرون والمحررون</div>
        </div>
    </div>

    <!-- جدول المستخدمين -->
    <div class="content-card">
        <div class="card-header-admin">
            <h3 class="card-title">قائمة المستخدمين</h3>
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
                        <th>المستخدم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الدور</th>
                        <th>الحالة</th>
                        <th>تاريخ التسجيل</th>
                        <th>آخر تسجيل دخول</th>
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
                                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center ml-3">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                                <div>
                                    <div class="font-medium">أحمد محمد</div>
                                    <div class="text-gray-500 text-xs">@ahmed_mohamed</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm">ahmed@example.com</span>
                        </td>
                        <td>
                            <span class="bg-primary text-white px-2 py-1 rounded-full text-xs">مدير</span>
                        </td>
                        <td>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">نشط</span>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-01</div>
                                <div class="text-gray-500">منذ 15 يوم</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-15</div>
                                <div class="text-gray-500">منذ ساعة</div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="عرض الملف">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">إرسال رسالة</a>
                                        <a href="#" class="dropdown-item">تغيير كلمة المرور</a>
                                        <a href="#" class="dropdown-item text-yellow-600">حظر مؤقت</a>
                                        <a href="#" class="dropdown-item text-red-600">حظر نهائي</a>
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
                                <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center ml-3">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                                <div>
                                    <div class="font-medium">فاطمة أحمد</div>
                                    <div class="text-gray-500 text-xs">@fatima_ahmed</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm">fatima@example.com</span>
                        </td>
                        <td>
                            <span class="bg-secondary text-white px-2 py-1 rounded-full text-xs">محرر</span>
                        </td>
                        <td>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">نشط</span>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-05</div>
                                <div class="text-gray-500">منذ 10 أيام</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-15</div>
                                <div class="text-gray-500">منذ 3 ساعات</div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="عرض الملف">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">إرسال رسالة</a>
                                        <a href="#" class="dropdown-item">تغيير كلمة المرور</a>
                                        <a href="#" class="dropdown-item text-yellow-600">حظر مؤقت</a>
                                        <a href="#" class="dropdown-item text-red-600">حظر نهائي</a>
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
                                <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center ml-3">
                                    <i class="bi bi-person text-dark"></i>
                                </div>
                                <div>
                                    <div class="font-medium">محمد علي</div>
                                    <div class="text-gray-500 text-xs">@mohamed_ali</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm">mohamed@example.com</span>
                        </td>
                        <td>
                            <span class="bg-accent text-dark px-2 py-1 rounded-full text-xs">كاتب</span>
                        </td>
                        <td>
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">معلق</span>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-10</div>
                                <div class="text-gray-500">منذ 5 أيام</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-14</div>
                                <div class="text-gray-500">منذ يوم</div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="عرض الملف">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">إرسال رسالة</a>
                                        <a href="#" class="dropdown-item">تغيير كلمة المرور</a>
                                        <a href="#" class="dropdown-item text-green-600">تفعيل الحساب</a>
                                        <a href="#" class="dropdown-item text-red-600">حظر نهائي</a>
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
                                <div class="w-10 h-10 bg-dark rounded-full flex items-center justify-center ml-3">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                                <div>
                                    <div class="font-medium">علي حسن</div>
                                    <div class="text-gray-500 text-xs">@ali_hassan</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm">ali@example.com</span>
                        </td>
                        <td>
                            <span class="bg-dark text-white px-2 py-1 rounded-full text-xs">مستخدم</span>
                        </td>
                        <td>
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">محظور</span>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-08</div>
                                <div class="text-gray-500">منذ 7 أيام</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <div>2024-01-12</div>
                                <div class="text-gray-500">منذ 3 أيام</div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="تعديل">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="عرض الملف">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown-admin">
                                    <button class="btn-admin btn-admin-outline text-xs px-2 py-1" title="المزيد">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">إرسال رسالة</a>
                                        <a href="#" class="dropdown-item">تغيير كلمة المرور</a>
                                        <a href="#" class="dropdown-item text-green-600">إلغاء الحظر</a>
                                        <a href="#" class="dropdown-item text-red-600">حذف الحساب</a>
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
                عرض 1 إلى 4 من 1,247 مستخدم
            </div>
            <div class="flex items-center space-x-2 space-x-reverse">
                <button class="btn-admin btn-admin-outline px-3 py-2">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <button class="btn-admin btn-admin-primary px-3 py-2">1</button>
                <button class="btn-admin btn-admin-outline px-3 py-2">2</button>
                <button class="btn-admin btn-admin-outline px-3 py-2">3</button>
                <span class="px-3 py-2 text-gray-600">...</span>
                <button class="btn-admin btn-admin-outline px-3 py-2">125</button>
                <button class="btn-admin btn-admin-outline px-3 py-2">
                    <i class="bi bi-chevron-left"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- إحصائيات إضافية -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        <!-- توزيع المستخدمين حسب الدور -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">توزيع المستخدمين حسب الدور</h3>
                <div class="card-actions">
                    <i class="bi bi-pie-chart text-primary"></i>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-primary rounded-full ml-3"></div>
                        <span class="text-sm font-medium">المديرون</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill primary" style="width: 5%"></div>
                        </div>
                        <span class="text-sm text-gray-600">5% (12)</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-secondary rounded-full ml-3"></div>
                        <span class="text-sm font-medium">المحررون</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill secondary" style="width: 15%"></div>
                        </div>
                        <span class="text-sm text-gray-600">15% (187)</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-accent rounded-full ml-3"></div>
                        <span class="text-sm font-medium">الكتّاب</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill accent" style="width: 25%"></div>
                        </div>
                        <span class="text-sm text-gray-600">25% (312)</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-dark rounded-full ml-3"></div>
                        <span class="text-sm font-medium">المستخدمون العاديون</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-32 bg-gray-200 rounded-full h-2 ml-3">
                            <div class="progress-fill dark" style="width: 55%"></div>
                        </div>
                        <span class="text-sm text-gray-600">55% (686)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- نشاط المستخدمين -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">نشاط المستخدمين</h3>
                <div class="card-actions">
                    <i class="bi bi-graph-up text-primary"></i>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-person-check text-green-600 ml-2"></i>
                        <span class="text-sm">المستخدمون النشطون اليوم</span>
                    </div>
                    <span class="font-medium text-green-600">247</span>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-person-plus text-blue-600 ml-2"></i>
                        <span class="text-sm">مستخدمين جدد هذا الأسبوع</span>
                    </div>
                    <span class="font-medium text-blue-600">45</span>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-person-x text-yellow-600 ml-2"></i>
                        <span class="text-sm">حسابات معلقة</span>
                    </div>
                    <span class="font-medium text-yellow-600">23</span>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="bi bi-person-x text-red-600 ml-2"></i>
                        <span class="text-sm">حسابات محظورة</span>
                    </div>
                    <span class="font-medium text-red-600">8</span>
                </div>
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