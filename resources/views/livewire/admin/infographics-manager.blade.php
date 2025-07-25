<div class="infographics-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إدارة الإنفوجرافيك</h1>
                <p class="text-gray-600">إدارة جميع الإنفوجرافيك في الموقع</p>
            </div>
            <button wire:click="createArticle" class="btn-primary">
                <i class="bi bi-plus-circle ml-2"></i>
                إنفوجرافيك جديد
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="filters-section mb-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="search-box">
                    <label class="block text-sm font-medium text-gray-700 mb-2">البحث</label>
                    <div class="relative">
                        <input type="text" wire:model.live="search" 
                               placeholder="ابحث في الإنفوجرافيك..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="category-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">القسم</label>
                    <select wire:model.live="categoryFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الأقسام</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="status-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">الحالة</label>
                    <select wire:model.live="statusFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الحالات</option>
                        <option value="published">منشور</option>
                        <option value="draft">مسودة</option>
                    </select>
                </div>

                <!-- Infographic Type Filter -->
                <div class="infographic-type-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">نوع الإنفوجرافيك</label>
                    <select wire:model.live="infographicTypeFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الأنواع</option>
                        <option value="statistical">إحصائي</option>
                        <option value="timeline">زمني</option>
                        <option value="comparison">مقارنة</option>
                        <option value="process">عملية</option>
                        <option value="geographic">جغرافي</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Infographics Table -->
    <div class="infographics-table">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الإنفوجرافيك
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                القسم
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                المصمم
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                النوع
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الحالة
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                التاريخ
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الإجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($articles as $article)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-12 w-16">
                                            @if($article->featured_image)
                                                <img class="h-12 w-16 object-cover rounded-lg" 
                                                     src="{{ \App\Helpers\ImageHelper::getImageUrl($article->featured_image) }}" 
                                                     alt="{{ $article->title }}">
                                            @else
                                                <div class="h-12 w-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                                    <i class="bi bi-bar-chart text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mr-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ Str::limit($article->title, 50) }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ Str::limit($article->excerpt, 60) }}
                                            </div>
                                            @if($article->infographic_designer)
                                                <div class="text-xs text-gray-400">
                                                    المصمم: {{ $article->infographic_designer }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($article->category)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" 
                                              style="background-color: {{ $article->category->color }}20; color: {{ $article->category->color }};">
                                            {{ $article->category->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">بدون قسم</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                    {{ $article->infographic_designer ?? 'غير محدد' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @php
                                        $infographicTypeColors = [
                                            'statistical' => 'bg-blue-100 text-blue-800',
                                            'timeline' => 'bg-green-100 text-green-800',
                                            'comparison' => 'bg-purple-100 text-purple-800',
                                            'process' => 'bg-orange-100 text-orange-800',
                                            'geographic' => 'bg-red-100 text-red-800'
                                        ];
                                        $infographicTypeText = [
                                            'statistical' => 'إحصائي',
                                            'timeline' => 'زمني',
                                            'comparison' => 'مقارنة',
                                            'process' => 'عملية',
                                            'geographic' => 'جغرافي'
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $infographicTypeColors[$article->infographic_type ?? 'statistical'] }}">
                                        {{ $infographicTypeText[$article->infographic_type ?? 'statistical'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button wire:click="togglePublish({{ $article->id }})" 
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium cursor-pointer transition-colors
                                                   {{ $article->is_published 
                                                       ? 'bg-green-100 text-green-800 hover:bg-green-200' 
                                                       : 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' }}">
                                        <i class="bi bi-{{ $article->is_published ? 'check-circle' : 'clock' }} ml-1"></i>
                                        {{ $article->is_published ? 'منشور' : 'مسودة' }}
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{ $article->created_at->format('Y/m/d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center gap-2">
                                        <button wire:click="editArticle({{ $article->id }})" 
                                                class="text-[#C08B2D] hover:text-[#B22B2B] transition-colors">
                                            <i class="bi bi-pencil text-lg"></i>
                                        </button>
                                        <button wire:click="deleteArticle({{ $article->id }})" 
                                                class="text-red-600 hover:text-red-800 transition-colors">
                                            <i class="bi bi-trash text-lg"></i>
                                        </button>
                                        <a href="{{ route('news.show', $article->slug) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800 transition-colors">
                                            <i class="bi bi-eye text-lg"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="empty-state">
                                        <i class="bi bi-bar-chart text-4xl text-gray-300 mb-4"></i>
                                        <h3 class="text-lg font-semibold text-gray-600 mb-2">لا توجد إنفوجرافيك</h3>
                                        <p class="text-gray-500 mb-4">ابدأ بإنشاء إنفوجرافيكك الأول</p>
                                        <button wire:click="createArticle" class="btn-primary">
                                            <i class="bi bi-plus-circle ml-2"></i>
                                            إنشاء إنفوجرافيك جديد
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($articles->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Create/Edit Modal -->
    @if($showCreateModal || $showEditModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" id="modal">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ $editingArticle ? 'تعديل الإنفوجرافيك' : 'إنفوجرافيك جديد' }}
                        </h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <i class="bi bi-x text-2xl"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="saveArticle">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">عنوان الإنفوجرافيك</label>
                                <input type="text" wire:model="form.title" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل عنوان الإنفوجرافيك">
                                @error('form.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">القسم</label>
                                <select wire:model="form.category_id" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="">اختر القسم</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('form.category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Author -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">الكاتب</label>
                                <select wire:model="form.author_id" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="">اختر الكاتب</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('form.author_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Infographic Type -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">نوع الإنفوجرافيك</label>
                                <select wire:model="form.infographic_type" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="statistical">إحصائي</option>
                                    <option value="timeline">زمني</option>
                                    <option value="comparison">مقارنة</option>
                                    <option value="process">عملية</option>
                                    <option value="geographic">جغرافي</option>
                                </select>
                                @error('form.infographic_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Infographic Designer -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">المصمم</label>
                                <input type="text" wire:model="form.infographic_designer" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="اسم المصمم">
                                @error('form.infographic_designer') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Infographic Data Source -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">مصدر البيانات</label>
                                <input type="text" wire:model="form.infographic_data_source" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="مصدر البيانات">
                                @error('form.infographic_data_source') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Infographic Dimensions -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">الأبعاد</label>
                                <input type="text" wire:model="form.infographic_dimensions" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="مثال: 1920x1080">
                                @error('form.infographic_dimensions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Infographic Language -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">اللغة</label>
                                <select wire:model="form.infographic_language" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="ar">عربي</option>
                                    <option value="en">إنجليزي</option>
                                    <option value="both">كلاهما</option>
                                </select>
                                @error('form.infographic_language') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Excerpt -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">ملخص الإنفوجرافيك</label>
                                <textarea wire:model="form.excerpt" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="أدخل ملخص الإنفوجرافيك"></textarea>
                                @error('form.excerpt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Content -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">محتوى الإنفوجرافيك</label>
                                <textarea wire:model="form.content" rows="8"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="أدخل محتوى الإنفوجرافيك"></textarea>
                                @error('form.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Infographic Colors -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الألوان المستخدمة</label>
                                <input type="text" wire:model="form.infographic_colors" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="الألوان المستخدمة في الإنفوجرافيك">
                                @error('form.infographic_colors') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Infographic Embed Code -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">كود التضمين</label>
                                <textarea wire:model="form.infographic_embed_code" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="كود التضمين (إذا كان متوفر)"></textarea>
                                @error('form.infographic_embed_code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Featured Image -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الصورة الرئيسية</label>
                                <input type="file" wire:model="image" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       accept="image/*">
                                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                
                                @if($image)
                                    <div class="mt-2">
                                        <img src="{{ $image->temporaryUrl() }}" 
                                             class="w-32 h-24 object-cover rounded-lg border">
                                    </div>
                                @elseif($editingArticle && $editingArticle->featured_image)
                                    <div class="mt-2">
                                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($editingArticle->featured_image) }}" 
                                             class="w-32 h-24 object-cover rounded-lg border">
                                    </div>
                                @endif
                            </div>

                            <!-- Infographic File -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">ملف الإنفوجرافيك</label>
                                <input type="file" wire:model="infographicFile" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       accept=".pdf,.svg,.png,.jpg,.jpeg">
                                @error('infographicFile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Published Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">حالة النشر</label>
                                <div class="flex items-center space-x-4 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.is_published" value="1" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">منشور</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.is_published" value="0" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">مسودة</span>
                                    </label>
                                </div>
                                @error('form.is_published') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Featured & Interactive & Downloadable -->
                            <div class="md:col-span-2">
                                <div class="flex items-center space-x-6 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="checkbox" wire:model="form.is_featured" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D] rounded">
                                        <span class="text-sm text-gray-700">مميز</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" wire:model="form.infographic_interactive" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D] rounded">
                                        <span class="text-sm text-gray-700">تفاعلي</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" wire:model="form.infographic_downloadable" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D] rounded">
                                        <span class="text-sm text-gray-700">قابل للتحميل</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 space-x-reverse mt-6">
                            <button type="button" wire:click="closeModal" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                إلغاء
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-[#C08B2D] text-white rounded-lg hover:bg-[#B22B2B] transition-colors">
                                {{ $editingArticle ? 'تحديث الإنفوجرافيك' : 'إنشاء الإنفوجرافيك' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <style>
    /* Infographics Management Styles */
    .infographics-management {
        padding: 2rem;
    }

    .page-header {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .btn-primary {
        background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(192, 139, 45, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
    }

    /* Table Styles */
    .infographics-table table {
        border-collapse: collapse;
    }

    .infographics-table th {
        background: #f9fafb;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .infographics-table td, .infographics-table th {
        padding: 1rem 1.5rem;
        text-align: right;
    }

    .infographics-table tbody tr:hover {
        background: #f9fafb;
    }

    /* Modal Styles */
    #modal {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .infographics-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .infographics-table {
            overflow-x: auto;
        }
    }
    </style>

@push('scripts')
  <script>
      document.addEventListener('livewire:update', function () {  // استخدام الحدث الجديد للإعادة التهيئة
          const swiperEl = document.querySelector('.infographics-swiper');
          if (swiperEl && typeof Swiper !== 'undefined') {
              // Destroy any previous instance
              if (swiperEl.swiper) swiperEl.swiper.destroy(true, true);

              const slides = swiperEl.querySelectorAll('.swiper-slide');
              const loopMode = slides.length > 3;  // تفعيل loop إذا كان هناك أكثر من 3 عناصر

              const swiperInstance = new Swiper(swiperEl, {
                  loop: loopMode,
                  slidesPerView: 1,  // افتراضي: 1 على الموبايل
                  spaceBetween: 20,
                  centeredSlides: false,
                  autoplay: {
                      delay: 4000,
                      disableOnInteraction: false
                  },
                  pagination: {
                      el: '.infographic-swiper-pagination',
                      clickable: true,
                      dynamicBullets: true
                  },
                  navigation: {
                      nextEl: '.infographic-swiper-button-next',
                      prevEl: '.infographic-swiper-button-prev'
                  },
                  breakpoints: {
                      640: { slidesPerView: 2, spaceBetween: 20 },  // 2 على التابلت
                      1024: { slidesPerView: 3, spaceBetween: 30 }  // 3 على الديسكتوب
                  }
              });

              swiperEl.addEventListener('mouseleave', () => swiperInstance.autoplay.start());
          }
      });
  </script>
  @endpush
</div> 