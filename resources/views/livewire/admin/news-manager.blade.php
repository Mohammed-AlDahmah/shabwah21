@extends('layouts.admin')

@section('title', 'إدارة المقالات - حضرموت21')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">إدارة المقالات</h1>
            <p class="text-sm text-gray-600 mt-1">قم بإدارة جميع المقالات والأخبار المنشورة</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="#" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary/90 transition-colors shadow-md">
                <i class="bi bi-plus-circle ml-2"></i>
                إضافة مقال جديد
            </a>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <!-- Search -->
            <div class="relative flex-1 max-w-md">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <i class="bi bi-search text-gray-400"></i>
                </div>
                <input type="text" 
                       class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                       placeholder="البحث في المقالات...">
            </div>
            
            <!-- Filters -->
            <div class="flex space-x-4 space-x-reverse">
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">جميع التصنيفات</option>
                    <option value="local">أخبار محلية</option>
                    <option value="sports">رياضة</option>
                    <option value="culture">ثقافة</option>
                    <option value="tech">تكنولوجيا</option>
                </select>
                
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">جميع الحالات</option>
                    <option value="published">منشور</option>
                    <option value="draft">مسودة</option>
                    <option value="pending">في انتظار المراجعة</option>
                </select>
                
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-funnel"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-900">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-900">العنوان</th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-900">التصنيف</th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-900">الحالة</th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-900">المشاهدات</th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-900">تاريخ النشر</th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-900">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Article Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <img src="https://via.placeholder.com/60x40" alt="مقال" class="w-15 h-10 rounded-lg object-cover">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">آخر الأخبار من حضرموت</h3>
                                    <p class="text-xs text-gray-500">تقرير شامل عن التطورات الأخيرة في المحافظة</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary">
                                أخبار محلية
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="bi bi-check-circle text-xs ml-1"></i>
                                منشور
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-1 space-x-reverse">
                                <i class="bi bi-eye text-gray-400 text-xs"></i>
                                <span class="text-sm text-gray-900">1,245</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-900">2023-12-15</span>
                            <p class="text-xs text-gray-500">منذ ساعتين</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="p-1 text-gray-400 hover:text-primary transition-colors">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="p-1 text-gray-400 hover:text-accent transition-colors">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="p-1 text-gray-400 hover:text-secondary transition-colors">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Article Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <img src="https://via.placeholder.com/60x40" alt="مقال" class="w-15 h-10 rounded-lg object-cover">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">نتائج المباراة الأخيرة</h3>
                                    <p class="text-xs text-gray-500">تقرير مفصل عن أداء الفريق في المباراة</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary/10 text-secondary">
                                رياضة
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="bi bi-clock text-xs ml-1"></i>
                                مراجعة
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-1 space-x-reverse">
                                <i class="bi bi-eye text-gray-400 text-xs"></i>
                                <span class="text-sm text-gray-900">867</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-900">2023-12-14</span>
                            <p class="text-xs text-gray-500">أمس</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="p-1 text-gray-400 hover:text-primary transition-colors">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="p-1 text-gray-400 hover:text-accent transition-colors">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="p-1 text-gray-400 hover:text-secondary transition-colors">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Article Row 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <img src="https://via.placeholder.com/60x40" alt="مقال" class="w-15 h-10 rounded-lg object-cover">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">معرض الفنون الجديد</h3>
                                    <p class="text-xs text-gray-500">تغطية لافتتاح معرض الفنون المحلي</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-accent/10 text-accent">
                                ثقافة
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                <i class="bi bi-file-earmark text-xs ml-1"></i>
                                مسودة
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-1 space-x-reverse">
                                <i class="bi bi-eye text-gray-400 text-xs"></i>
                                <span class="text-sm text-gray-900">0</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-900">-</span>
                            <p class="text-xs text-gray-500">غير منشور</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <button class="p-1 text-gray-400 hover:text-primary transition-colors">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="p-1 text-gray-400 hover:text-accent transition-colors">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="p-1 text-gray-400 hover:text-secondary transition-colors">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            <div class="flex items-center justify-between">
                <div class="flex justify-between sm:hidden">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        السابق
                    </a>
                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        التالي
                    </a>
                </div>
                <div class="hidden sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            عرض <span class="font-medium">1</span> إلى <span class="font-medium">10</span> من <span class="font-medium">97</span> نتيجة
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">السابق</span>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                1
                            </a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-primary text-sm font-medium text-white">
                                2
                            </a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                3
                            </a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">التالي</span>
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 