<div class="categories-management">
    <!-- Test Button -->
    <div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 rounded">
        <button wire:click="createCategory" class="bg-blue-500 text-white px-4 py-2 rounded">
            Test Button - Create Category
        </button>
        <span class="ml-4 text-sm text-gray-600">Click this button to test if Livewire is working</span>
    </div>

    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <i class="bi bi-folder text-[#C08B2D] ml-2"></i>
                إدارة الأقسام
            </h1>
            <p class="page-description">إدارة أقسام الموقع وتنظيم المحتوى</p>
        </div>
        <button wire:click="createCategory" class="btn-primary">
            <i class="bi bi-plus-circle ml-2"></i>
            إضافة قسم جديد
        </button>
    </div>

    <!-- Search and Filters -->
    <div class="filters-section">
        <div class="search-box">
            <i class="bi bi-search text-gray-400"></i>
            <input type="text" wire:model.live="search" 
                   placeholder="البحث في الأقسام..."
                   class="search-input">
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="categories-grid">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($categories as $category)
                <div class="category-card">
                    <div class="category-header" style="background: linear-gradient(135deg, {{ $category->color }} 0%, {{ $category->color }}dd 100%);">
                        <div class="category-icon">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <div class="category-actions">
                            <button wire:click="editCategory({{ $category->id }})" 
                                    class="action-btn edit" title="تعديل">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button wire:click="deleteCategory({{ $category->id }})" 
                                    class="action-btn delete" title="حذف">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="category-content">
                        <h3 class="category-name">{{ $category->name }}</h3>
                        <p class="category-description">{{ $category->description ?: 'لا يوجد وصف' }}</p>
                        
                        <div class="category-stats">
                            <div class="stat-item">
                                <i class="bi bi-newspaper"></i>
                                <span>{{ $category->articles_count }} مقال</span>
                            </div>
                            <div class="stat-item">
                                <i class="bi bi-calendar"></i>
                                <span>{{ $category->created_at->format('Y/m/d') }}</span>
                            </div>
                        </div>
                        
                        <div class="category-footer">
                            <a href="{{ route('news.category', $category->slug) }}" 
                               target="_blank" 
                               class="view-link">
                                <i class="bi bi-eye ml-1"></i>
                                عرض القسم
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="empty-state">
                        <i class="bi bi-folder text-4xl text-gray-300 mb-4"></i>
                        <h3 class="text-lg font-semibold text-gray-600 mb-2">لا توجد أقسام</h3>
                        <p class="text-gray-500 mb-4">ابدأ بإنشاء قسمك الأول</p>
                        <button wire:click="createCategory" class="btn-primary">
                            <i class="bi bi-plus-circle ml-2"></i>
                            إنشاء قسم جديد
                        </button>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($categories->hasPages())
            <div class="pagination-section mt-8">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal -->
    @if($showCreateModal || $showEditModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" id="modal">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ $editingCategory ? 'تعديل القسم' : 'قسم جديد' }}
                        </h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <i class="bi bi-x text-2xl"></i>
                        </button>
                    </div>

                    <form wire:submit="saveCategory">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">اسم القسم</label>
                                <input type="text" wire:model="form.name" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل اسم القسم">
                                @error('form.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">وصف القسم</label>
                                <textarea wire:model="form.description" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="أدخل وصف القسم"></textarea>
                                @error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Color -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">لون القسم</label>
                                <input type="color" wire:model="form.color" 
                                       class="w-full h-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                @error('form.color') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Icon -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">أيقونة القسم</label>
                                <select wire:model="form.icon" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="bi bi-newspaper">📰 صحيفة</option>
                                    <option value="bi bi-camera-video">🎥 فيديو</option>
                                    <option value="bi bi-people">👥 مجتمع</option>
                                    <option value="bi bi-graph-up">📈 اقتصاد</option>
                                    <option value="bi bi-heart-pulse">🏥 صحة</option>
                                    <option value="bi bi-book">📚 تعليم</option>
                                    <option value="bi bi-car-front">🚗 سيارات</option>
                                    <option value="bi bi-house">🏠 عقارات</option>
                                    <option value="bi bi-phone">📱 تكنولوجيا</option>
                                    <option value="bi bi-star">⭐ مميز</option>
                                </select>
                                @error('form.icon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Slug -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الرابط المختصر</label>
                                <input type="text" wire:model="form.slug" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل الرابط المختصر">
                                @error('form.slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 space-x-reverse mt-6">
                            <button type="button" wire:click="closeModal" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                إلغاء
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-[#C08B2D] text-white rounded-lg hover:bg-[#B22B2B] transition-colors">
                                {{ $editingCategory ? 'تحديث القسم' : 'إنشاء القسم' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <style>
    .categories-management {
        padding: 2rem;
        background: #f8fafc;
        min-height: 100vh;
    }

    .page-header {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-title {
        font-size: 1.875rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
    }

    .page-description {
        color: #6b7280;
        font-size: 1rem;
    }

    .filters-section {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .search-box {
        position: relative;
        max-width: 400px;
    }

    .search-box i {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.5rem;
        border: 1px solid #d1d5db;
        border-radius: 0.75rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #C08B2D;
        box-shadow: 0 0 0 3px rgba(192, 139, 45, 0.1);
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

    .category-card {
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .category-header {
        padding: 1.5rem;
        color: white;
        position: relative;
    }

    .category-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .category-actions {
        position: absolute;
        top: 1rem;
        right: 1rem;
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        border: none;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .action-btn.edit {
        background: rgba(255, 255, 255, 0.2);
    }

    .action-btn.delete {
        background: rgba(239, 68, 68, 0.8);
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    .category-content {
        padding: 1.5rem;
    }

    .category-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .category-description {
        color: #6b7280;
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    .category-stats {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .category-footer {
        border-top: 1px solid #e5e7eb;
        padding-top: 1rem;
    }

    .view-link {
        color: #C08B2D;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .view-link:hover {
        color: #B22B2B;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        background: white;
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    /* Modal Styles */
    #modal {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .categories-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .category-actions {
            position: static;
            margin-top: 1rem;
            justify-content: flex-end;
        }
    }
    </style>
</div> 