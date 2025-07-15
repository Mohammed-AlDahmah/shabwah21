@extends('layouts.admin')

@section('title', 'لوحة التحكم - حضرموت21')

@section('content')
<!-- Welcome Section -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-primary to-accent rounded-2xl p-8 text-white shadow-xl">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold mb-2">مرحباً بك في لوحة التحكم</h1>
                <p class="text-lg opacity-90">يمكنك من هنا إدارة جميع محتوى موقع حضرموت21 بسهولة واحترافية</p>
            </div>
            <div class="flex space-x-4 space-x-reverse">
                <a href="#" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors shadow-md">
                    <i class="bi bi-plus-circle ml-2"></i>
                    إضافة مقال جديد
                </a>
                <a href="#" class="bg-white/20 text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/30 transition-colors">
                    <i class="bi bi-gear ml-2"></i>
                    الإعدادات
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Dashboard Statistics -->
@livewire('admin.dashboard-stats')

<!-- Quick Actions & Recent Activities -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">إجراءات سريعة</h3>
        <div class="space-y-3">
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                <div class="bg-primary/10 p-2 rounded-lg group-hover:bg-primary/20 transition-colors">
                    <i class="bi bi-file-earmark-plus text-primary"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm font-medium text-gray-900">إضافة مقال</p>
                    <p class="text-xs text-gray-500">أنشئ مقالاً جديداً</p>
                </div>
            </a>
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                <div class="bg-secondary/10 p-2 rounded-lg group-hover:bg-secondary/20 transition-colors">
                    <i class="bi bi-camera-video text-secondary"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm font-medium text-gray-900">إضافة فيديو</p>
                    <p class="text-xs text-gray-500">ارفع فيديو جديد</p>
                </div>
            </a>
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                <div class="bg-accent/10 p-2 rounded-lg group-hover:bg-accent/20 transition-colors">
                    <i class="bi bi-tag text-accent"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm font-medium text-gray-900">إدارة التصنيفات</p>
                    <p class="text-xs text-gray-500">أضف أو عدل التصنيفات</p>
                </div>
            </a>
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                <div class="bg-gray/10 p-2 rounded-lg group-hover:bg-gray/20 transition-colors">
                    <i class="bi bi-person-plus text-gray"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm font-medium text-gray-900">إدارة المستخدمين</p>
                    <p class="text-xs text-gray-500">أضف مستخدم جديد</p>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Recent Activities -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">النشاطات الأخيرة</h3>
            <a href="#" class="text-sm text-primary hover:text-primary/80">عرض الكل</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                    <i class="bi bi-file-earmark-text text-primary"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">تم نشر مقال جديد</p>
                    <p class="text-xs text-gray-500">أخبار محلية - منذ 5 دقائق</p>
                </div>
                <span class="text-xs text-gray-400">الآن</span>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="w-10 h-10 bg-secondary/10 rounded-full flex items-center justify-center">
                    <i class="bi bi-person-plus text-secondary"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">مستخدم جديد انضم</p>
                    <p class="text-xs text-gray-500">محمد أحمد - منذ 15 دقيقة</p>
                </div>
                <span class="text-xs text-gray-400">15د</span>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center">
                    <i class="bi bi-chat-dots text-accent"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">تعليق جديد</p>
                    <p class="text-xs text-gray-500">على مقال "آخر الأخبار" - منذ 30 دقيقة</p>
                </div>
                <span class="text-xs text-gray-400">30د</span>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="w-10 h-10 bg-gray/10 rounded-full flex items-center justify-center">
                    <i class="bi bi-gear text-gray"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">تم تحديث الإعدادات</p>
                    <p class="text-xs text-gray-500">إعدادات الموقع - منذ ساعة</p>
                </div>
                <span class="text-xs text-gray-400">1س</span>
            </div>
        </div>
    </div>
</div>

<!-- Latest Articles & System Info -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Latest Articles -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">آخر المقالات</h3>
            <a href="#" class="text-sm text-primary hover:text-primary/80">إدارة المقالات</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-center space-x-4 space-x-reverse">
                <img src="https://via.placeholder.com/60x60" alt="مقال" class="w-15 h-15 rounded-lg object-cover">
                <div class="flex-1">
                    <h4 class="text-sm font-medium text-gray-900 mb-1">عنوان المقال الأول</h4>
                    <p class="text-xs text-gray-500">في الأخبار المحلية</p>
                    <p class="text-xs text-gray-400">منذ ساعتين</p>
                </div>
                <div class="flex items-center space-x-1 space-x-reverse">
                    <i class="bi bi-eye text-gray-400 text-xs"></i>
                    <span class="text-xs text-gray-500">245</span>
                </div>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <img src="https://via.placeholder.com/60x60" alt="مقال" class="w-15 h-15 rounded-lg object-cover">
                <div class="flex-1">
                    <h4 class="text-sm font-medium text-gray-900 mb-1">عنوان المقال الثاني</h4>
                    <p class="text-xs text-gray-500">في الرياضة</p>
                    <p class="text-xs text-gray-400">منذ 3 ساعات</p>
                </div>
                <div class="flex items-center space-x-1 space-x-reverse">
                    <i class="bi bi-eye text-gray-400 text-xs"></i>
                    <span class="text-xs text-gray-500">189</span>
                </div>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <img src="https://via.placeholder.com/60x60" alt="مقال" class="w-15 h-15 rounded-lg object-cover">
                <div class="flex-1">
                    <h4 class="text-sm font-medium text-gray-900 mb-1">عنوان المقال الثالث</h4>
                    <p class="text-xs text-gray-500">في الثقافة</p>
                    <p class="text-xs text-gray-400">منذ 5 ساعات</p>
                </div>
                <div class="flex items-center space-x-1 space-x-reverse">
                    <i class="bi bi-eye text-gray-400 text-xs"></i>
                    <span class="text-xs text-gray-500">156</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- System Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">معلومات النظام</h3>
            <i class="bi bi-info-circle text-gray-400"></i>
        </div>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">إصدار Laravel</span>
                <span class="text-sm font-medium text-gray-900">10.x</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">إصدار PHP</span>
                <span class="text-sm font-medium text-gray-900">8.2</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">حالة النظام</span>
                <span class="text-sm font-medium text-green-600">عامل</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">استخدام التخزين</span>
                <span class="text-sm font-medium text-gray-900">2.4 GB</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">آخر نسخة احتياطية</span>
                <span class="text-sm font-medium text-gray-900">اليوم</span>
            </div>
        </div>
    </div>
</div>
@endsection
