<div class="reports-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إدارة التقارير</h1>
                <p class="text-gray-600">إدارة جميع التقارير في الموقع</p>
            </div>
            <button wire:click="createArticle" class="btn-primary">
                <i class="bi bi-plus-circle ml-2"></i>
                تقرير جديد
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
                               placeholder="ابحث في التقارير..." 
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

                <!-- Report Type Filter -->
                <div class="report-type-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">نوع التقرير</label>
                    <select wire:model.live="reportTypeFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الأنواع</option>
                        <option value="investigation">تحقيق</option>
                        <option value="analysis">تحليل</option>
                        <option value="field">ميداني</option>
                        <option value="research">بحثي</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports Table -->
    <div class="reports-table">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                التقرير
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                القسم
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الكاتب
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
                                                    <i class="bi bi-file-earmark-text text-gray-400"></i>
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
                                            @if($article->report_location)
                                                <div class="text-xs text-gray-400">
                                                    الموقع: {{ $article->report_location }}
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
                                    {{ $article->author_name ?? 'غير محدد' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @php
                                        $reportTypeColors = [
                                            'investigation' => 'bg-purple-100 text-purple-800',
                                            'analysis' => 'bg-blue-100 text-blue-800',
                                            'field' => 'bg-green-100 text-green-800',
                                            'research' => 'bg-orange-100 text-orange-800'
                                        ];
                                        $reportTypeText = [
                                            'investigation' => 'تحقيق',
                                            'analysis' => 'تحليل',
                                            'field' => 'ميداني',
                                            'research' => 'بحثي'
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $reportTypeColors[$article->report_type ?? 'investigation'] }}">
                                        {{ $reportTypeText[$article->report_type ?? 'investigation'] }}
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
                                        <i class="bi bi-file-earmark-text text-4xl text-gray-300 mb-4"></i>
                                        <h3 class="text-lg font-semibold text-gray-600 mb-2">لا توجد تقارير</h3>
                                        <p class="text-gray-500 mb-4">ابدأ بإنشاء تقريرك الأول</p>
                                        <button wire:click="createArticle" class="btn-primary">
                                            <i class="bi bi-plus-circle ml-2"></i>
                                            إنشاء تقرير جديد
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
                            {{ $editingArticle ? 'تعديل التقرير' : 'تقرير جديد' }}
                        </h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <i class="bi bi-x text-2xl"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="saveArticle">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">عنوان التقرير</label>
                                <input type="text" wire:model="form.title" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل عنوان التقرير">
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

                            <!-- Report Type -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">نوع التقرير</label>
                                <select wire:model="form.report_type" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="investigation">تحقيق</option>
                                    <option value="analysis">تحليل</option>
                                    <option value="field">ميداني</option>
                                    <option value="research">بحثي</option>
                                </select>
                                @error('form.report_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Report Location -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">موقع التقرير</label>
                                <input type="text" wire:model="form.report_location" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="موقع التقرير">
                                @error('form.report_location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Report Duration -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">مدة التقرير</label>
                                <input type="text" wire:model="form.report_duration" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="مدة التقرير">
                                @error('form.report_duration') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Excerpt -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">ملخص التقرير</label>
                                <textarea wire:model="form.excerpt" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="أدخل ملخص التقرير"></textarea>
                                @error('form.excerpt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Content -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">محتوى التقرير</label>
                                <textarea wire:model="form.content" rows="8"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="أدخل محتوى التقرير"></textarea>
                                @error('form.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Report Interviews -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">المقابلات</label>
                                <textarea wire:model="form.report_interviews" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="تفاصيل المقابلات"></textarea>
                                @error('form.report_interviews') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Report Sources -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">المصادر</label>
                                <textarea wire:model="form.report_sources" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="مصادر التقرير"></textarea>
                                @error('form.report_sources') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Report Conclusions -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الاستنتاجات</label>
                                <textarea wire:model="form.report_conclusions" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="استنتاجات التقرير"></textarea>
                                @error('form.report_conclusions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Report Recommendations -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">التوصيات</label>
                                <textarea wire:model="form.report_recommendations" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="توصيات التقرير"></textarea>
                                @error('form.report_recommendations') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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

                            <!-- Attachments -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">المرفقات</label>
                                <input type="file" wire:model="attachments" multiple
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       accept=".pdf,.doc,.docx,.xls,.xlsx">
                                @error('attachments.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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

                            <!-- Featured -->
                            <div class="md:col-span-2">
                                <div class="flex items-center space-x-6 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="checkbox" wire:model="form.is_featured" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D] rounded">
                                        <span class="text-sm text-gray-700">مميز</span>
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
                                {{ $editingArticle ? 'تحديث التقرير' : 'إنشاء التقرير' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <style>
    /* Reports Management Styles */
    .reports-management {
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
    .reports-table table {
        border-collapse: collapse;
    }

    .reports-table th {
        background: #f9fafb;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .reports-table td, .reports-table th {
        padding: 1rem 1.5rem;
        text-align: right;
    }

    .reports-table tbody tr:hover {
        background: #f9fafb;
    }

    /* Modal Styles */
    #modal {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .reports-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .reports-table {
            overflow-x: auto;
        }
    }
    </style>

    <script>
    // نظام الإشعارات المخصص - تم نقله إلى notifications.js

    // Delete Confirmation
    window.addEventListener('confirmDelete', event => {
        const { id } = event.detail;
        
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لا يمكن التراجع عن هذا الإجراء!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'نعم، احذف!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.deleteArticleConfirmed({id: id});
            }
        });
    });
    </script>
</div> 