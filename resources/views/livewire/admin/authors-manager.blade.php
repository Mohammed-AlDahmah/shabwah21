<div class="authors-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إدارة المؤلفين</h1>
                <p class="text-gray-600">إدارة جميع المؤلفين والكتاب في الموقع</p>
            </div>
            <button wire:click="createAuthor" class="btn-primary">
                <i class="bi bi-plus-circle ml-2"></i>
                مؤلف جديد
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="filters-section mb-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search -->
                <div class="search-box">
                    <label class="block text-sm font-medium text-gray-700 mb-2">البحث</label>
                    <div class="relative">
                        <input type="text" wire:model.live="search" 
                               placeholder="ابحث في المؤلفين..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="status-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">الحالة</label>
                    <select wire:model.live="statusFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الحالات</option>
                        <option value="active">نشط</option>
                        <option value="inactive">غير نشط</option>
                    </select>
                </div>

                <!-- Featured Filter -->
                <div class="featured-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">التمييز</label>
                    <select wire:model.live="featuredFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع المؤلفين</option>
                        <option value="featured">مميزون فقط</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Authors Table -->
    <div class="authors-table">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                المؤلف
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                التخصص
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الخبرة
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                المقالات
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الحالة
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ الانضمام
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الإجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($authors as $author)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-12 w-12">
                                            @if($author->avatar)
                                                <img class="h-12 w-12 object-cover rounded-full" 
                                                     src="{{ $author->avatar_url }}" 
                                                     alt="{{ $author->name }}">
                                            @else
                                                <div class="h-12 w-12 bg-gradient-to-br from-[#C08B2D] to-[#B22B2B] rounded-full flex items-center justify-center text-white font-bold text-lg">
                                                    {{ substr($author->name, 0, 1) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mr-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $author->name }}
                                                @if($author->is_featured)
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 ml-2">
                                                        <i class="bi bi-star-fill ml-1"></i>
                                                        مميز
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $author->email }}
                                            </div>
                                            @if($author->location)
                                                <div class="text-xs text-gray-400">
                                                    <i class="bi bi-geo-alt ml-1"></i>
                                                    {{ $author->location }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($author->specialization)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $author->specialization }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">غير محدد</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                    @if($author->experience_years)
                                        <div>
                                            <span class="font-medium">{{ $author->experience_years }}</span> سنة
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $author->experience_level }}
                                        </div>
                                    @else
                                        <span class="text-gray-400">غير محدد</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                    <span class="font-medium">{{ $author->articles_count }}</span>
                                    <div class="text-xs text-gray-500">مقال</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button wire:click="toggleActive({{ $author->id }})" 
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium cursor-pointer transition-colors
                                                   {{ $author->is_active 
                                                       ? 'bg-green-100 text-green-800 hover:bg-green-200' 
                                                       : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                        <i class="bi bi-{{ $author->is_active ? 'check-circle' : 'x-circle' }} ml-1"></i>
                                        {{ $author->is_active ? 'نشط' : 'غير نشط' }}
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{ $author->join_date ? $author->join_date->format('Y/m/d') : 'غير محدد' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center gap-2">
                                        <button wire:click="editAuthor({{ $author->id }})" 
                                                class="text-[#C08B2D] hover:text-[#B22B2B] transition-colors">
                                            <i class="bi bi-pencil text-lg"></i>
                                        </button>
                                        <button wire:click="deleteAuthor({{ $author->id }})" 
                                                class="text-red-600 hover:text-red-800 transition-colors">
                                            <i class="bi bi-trash text-lg"></i>
                                        </button>
                                        <button wire:click="toggleFeatured({{ $author->id }})" 
                                                class="text-yellow-600 hover:text-yellow-800 transition-colors">
                                            <i class="bi bi-star{{ $author->is_featured ? '-fill' : '' }} text-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="empty-state">
                                        <i class="bi bi-people text-4xl text-gray-300 mb-4"></i>
                                        <h3 class="text-lg font-semibold text-gray-600 mb-2">لا توجد مؤلفين</h3>
                                        <p class="text-gray-500 mb-4">ابدأ بإضافة مؤلفك الأول</p>
                                        <button wire:click="createAuthor" class="btn-primary">
                                            <i class="bi bi-plus-circle ml-2"></i>
                                            إضافة مؤلف جديد
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($authors->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $authors->links() }}
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
                            {{ $editingAuthor ? 'تعديل المؤلف' : 'مؤلف جديد' }}
                        </h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <i class="bi bi-x text-2xl"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="saveAuthor">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">اسم المؤلف</label>
                                <input type="text" wire:model="form.name" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل اسم المؤلف">
                                @error('form.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                                <input type="email" wire:model="form.email" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل البريد الإلكتروني">
                                @error('form.email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Specialization -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">التخصص</label>
                                <input type="text" wire:model="form.specialization" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="التخصص الرئيسي">
                                @error('form.specialization') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Experience Years -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">سنوات الخبرة</label>
                                <input type="number" wire:model="form.experience_years" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="عدد سنوات الخبرة">
                                @error('form.experience_years') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Location -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">الموقع</label>
                                <input type="text" wire:model="form.location" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="المدينة، البلد">
                                @error('form.location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Contact Info -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">معلومات الاتصال</label>
                                <input type="text" wire:model="form.contact_info" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="رقم الهاتف أو وسيلة الاتصال">
                                @error('form.contact_info') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Languages -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">اللغات</label>
                                <input type="text" wire:model="form.languages" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="اللغات التي يتحدث بها">
                                @error('form.languages') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Publication Count -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">عدد المنشورات</label>
                                <input type="number" wire:model="form.publication_count" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="عدد المقالات المنشورة">
                                @error('form.publication_count') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Join Date -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">تاريخ الانضمام</label>
                                <input type="date" wire:model="form.join_date" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                @error('form.join_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Bio -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">السيرة الذاتية</label>
                                <textarea wire:model="form.bio" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="السيرة الذاتية للمؤلف"></textarea>
                                @error('form.bio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Education -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">المؤهلات العلمية</label>
                                <textarea wire:model="form.education" rows="2"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="المؤهلات العلمية والشهادات"></textarea>
                                @error('form.education') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Awards -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الجوائز والإنجازات</label>
                                <textarea wire:model="form.awards" rows="2"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="الجوائز والإنجازات"></textarea>
                                @error('form.awards') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Expertise Areas -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">مجالات الخبرة</label>
                                <textarea wire:model="form.expertise_areas" rows="2"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="مجالات الخبرة والتخصصات"></textarea>
                                @error('form.expertise_areas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Social Media -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">وسائل التواصل الاجتماعي</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs text-gray-600 mb-1">تويتر</label>
                                        <input type="url" wire:model="form.social_media.twitter" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                               placeholder="رابط تويتر">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-600 mb-1">لينكد إن</label>
                                        <input type="url" wire:model="form.social_media.linkedin" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                               placeholder="رابط لينكد إن">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-600 mb-1">فيسبوك</label>
                                        <input type="url" wire:model="form.social_media.facebook" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                               placeholder="رابط فيسبوك">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-600 mb-1">إنستغرام</label>
                                        <input type="url" wire:model="form.social_media.instagram" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                               placeholder="رابط إنستغرام">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-xs text-gray-600 mb-1">الموقع الإلكتروني</label>
                                        <input type="url" wire:model="form.social_media.website" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                               placeholder="الموقع الإلكتروني الشخصي">
                                    </div>
                                </div>
                            </div>

                            <!-- Avatar -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الصورة الشخصية</label>
                                <input type="file" wire:model="avatar" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       accept="image/*">
                                @error('avatar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                
                                @if($avatar)
                                    <div class="mt-2">
                                        <img src="{{ $avatar->temporaryUrl() }}" 
                                             class="w-32 h-32 object-cover rounded-lg border">
                                    </div>
                                @elseif($editingAuthor && $editingAuthor->avatar)
                                    <div class="mt-2">
                                        <img src="{{ $editingAuthor->avatar_url }}" 
                                             class="w-32 h-32 object-cover rounded-lg border">
                                    </div>
                                @endif
                            </div>

                            <!-- Status -->
                            <div class="md:col-span-2">
                                <div class="flex items-center space-x-6 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="checkbox" wire:model="form.is_active" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D] rounded">
                                        <span class="text-sm text-gray-700">نشط</span>
                                    </label>
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
                                {{ $editingAuthor ? 'تحديث المؤلف' : 'إنشاء المؤلف' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <style>
    /* Authors Management Styles */
    .authors-management {
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
    .authors-table table {
        border-collapse: collapse;
    }

    .authors-table th {
        background: #f9fafb;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .authors-table td, .authors-table th {
        padding: 1rem 1.5rem;
        text-align: right;
    }

    .authors-table tbody tr:hover {
        background: #f9fafb;
    }

    /* Modal Styles */
    #modal {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .authors-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .authors-table {
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
                @this.deleteAuthorConfirmed({id: id});
            }
        });
    });
    </script>
</div> 