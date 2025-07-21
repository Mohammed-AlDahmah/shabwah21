@extends('layouts.admin')

@section('title', 'إدارة الصلاحيات - شبوة21')

@section('content')
<div class="roles-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إدارة الصلاحيات</h1>
                <p class="text-gray-600">إدارة صلاحيات المستخدمين في النظام</p>
            </div>
        </div>
    </div>

    <!-- Roles Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Admin Role -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                        <i class="bi bi-shield-check text-white text-xl"></i>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-lg font-semibold text-gray-900">مدير النظام</h3>
                        <p class="text-sm text-gray-500">Admin</p>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    إدارة كاملة للموقع
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    إدارة المستخدمين
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    إدارة الإعدادات
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    النسخ الاحتياطية
                </div>
            </div>
        </div>

        <!-- Editor Role -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <i class="bi bi-pencil-square text-white text-xl"></i>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-lg font-semibold text-gray-900">محرر</h3>
                        <p class="text-sm text-gray-500">Editor</p>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    إدارة المقالات
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    إدارة الأقسام
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    إدارة الفيديوهات
                </div>
                <div class="flex items-center text-sm text-gray-400">
                    <i class="bi bi-x-circle text-red-400 ml-2"></i>
                    إدارة المستخدمين
                </div>
            </div>
        </div>

        <!-- Author Role -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <i class="bi bi-person text-white text-xl"></i>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-lg font-semibold text-gray-900">كاتب</h3>
                        <p class="text-sm text-gray-500">Author</p>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    إنشاء المقالات
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="bi bi-check-circle text-green-500 ml-2"></i>
                    تعديل مقالاته
                </div>
                <div class="flex items-center text-sm text-gray-400">
                    <i class="bi bi-x-circle text-red-400 ml-2"></i>
                    إدارة الأقسام
                </div>
                <div class="flex items-center text-sm text-gray-400">
                    <i class="bi bi-x-circle text-red-400 ml-2"></i>
                    إدارة المستخدمين
                </div>
            </div>
        </div>
    </div>

    <!-- Role Permissions Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">تفاصيل الصلاحيات</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            الصلاحية
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            مدير النظام
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            محرر
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            كاتب
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            عرض لوحة التحكم
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            إدارة المقالات
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            إدارة الأقسام
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            إدارة الفيديوهات
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            إدارة المستخدمين
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            إدارة الإعدادات
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            النسخ الاحتياطية
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-check-circle text-green-500 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <i class="bi bi-x-circle text-red-400 text-lg"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Information Card -->
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i class="bi bi-info-circle text-blue-400 text-xl"></i>
            </div>
            <div class="mr-3">
                <h3 class="text-sm font-medium text-blue-800">معلومات حول الصلاحيات</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <p class="mb-2">• <strong>مدير النظام:</strong> لديه صلاحيات كاملة لإدارة جميع جوانب الموقع</p>
                    <p class="mb-2">• <strong>محرر:</strong> يمكنه إدارة المحتوى والمقالات والأقسام والفيديوهات</p>
                    <p class="mb-2">• <strong>كاتب:</strong> يمكنه إنشاء وتعديل المقالات الخاصة به فقط</p>
                    <p>• يمكن تعديل هذه الصلاحيات من خلال إعدادات النظام المتقدمة</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Roles Management Styles */
.roles-management {
    padding: 0;
}

.page-header {
    margin-bottom: 2rem;
}

/* Table Styles */
table {
    border-collapse: collapse;
    width: 100%;
}

th {
    background-color: #f9fafb;
    color: #6b7280;
    font-weight: 500;
    text-align: center;
    padding: 0.75rem 1.5rem;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

th:first-child {
    text-align: right;
}

td {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    vertical-align: middle;
}

tr:hover {
    background-color: #f9fafb;
}

/* Responsive */
@media (max-width: 768px) {
    .grid {
        grid-template-columns: 1fr;
    }
    
    .overflow-x-auto {
        overflow-x: auto;
    }
    
    table {
        min-width: 600px;
    }
}
</style>
@endsection 