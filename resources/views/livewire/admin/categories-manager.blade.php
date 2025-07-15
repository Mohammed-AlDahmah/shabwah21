<div class="admin-layout">
    <!-- الشريط الجانبي -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand">
                <i class="bi bi-speedometer2"></i>
                <span>حضرموت21</span>
            </a>
        </div>
        <nav class="admin-sidebar-nav">
            <div class="admin-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link">
                    <i class="bi bi-speedometer2 admin-nav-icon"></i>
                    <span>الرئيسية</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-file-earmark-text admin-nav-icon"></i>
                    <span>المقالات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-collection-play admin-nav-icon"></i>
                    <span>الفيديوهات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link active">
                    <i class="bi bi-tags admin-nav-icon"></i>
                    <span>التصنيفات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.users') }}" class="admin-nav-link">
                    <i class="bi bi-people admin-nav-icon"></i>
                    <span>المستخدمون</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.settings') }}" class="admin-nav-link">
                    <i class="bi bi-gear admin-nav-icon"></i>
                    <span>الإعدادات</span>
                </a>
            </div>
        </nav>
        <div class="mt-auto p-3">
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-box-arrow-right admin-nav-icon"></i>
                    <span>تسجيل الخروج</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="admin-main">
        <!-- الهيدر -->
        <header class="admin-header">
            <div class="admin-header-title">
                <i class="bi bi-tags me-2"></i>
                إدارة التصنيفات
            </div>
            <div class="admin-header-actions">
                <button wire:click="$set('showCreateModal', true)" class="admin-btn admin-btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    تصنيف جديد
                </button>
                <div class="admin-user-menu">
                    <i class="bi bi-person-circle"></i>
                    <span>المدير</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
        </header>

        <!-- المحتوى -->
        <div class="admin-content">
            <!-- شريط البحث -->
            <div class="admin-card mb-4">
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" wire:model.live="search" class="admin-form-input" placeholder="البحث في التصنيفات...">
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="typeFilter" class="admin-form-input">
                                <option value="">جميع الأنواع</option>
                                <option value="news">أخبار</option>
                                <option value="video">فيديو</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button wire:click="clearFilters" class="admin-btn admin-btn-outline w-100">
                                <i class="bi bi-arrow-clockwise"></i>
                                إعادة تعيين
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- بطاقات التصنيفات -->
            <div class="row g-4">
                @forelse($categories as $category)
                <div class="col-md-6 col-lg-4">
                    <div class="admin-card admin-fade-in">
                        <div class="admin-card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="admin-stat-icon primary me-3">
                                    <i class="bi bi-tag"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">{{ $category->name }}</h6>
                                    <small class="text-muted">{{ $category->articles_count ?? 0 }} مقال</small>
                                </div>
                            </div>
                            
                            @if($category->description)
                            <p class="text-muted small mb-3">{{ Str::limit($category->description, 100) }}</p>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-primary">{{ $category->type ?? 'أخبار' }}</span>
                                    @if($category->is_active)
                                        <span class="badge bg-success">نشط</span>
                                    @else
                                        <span class="badge bg-secondary">غير نشط</span>
                                    @endif
                                </div>
                                <div class="d-flex gap-1">
                                    <button wire:click="editCategory({{ $category->id }})" 
                                            class="admin-btn admin-btn-outline btn-sm" 
                                            title="تعديل">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button wire:click="deleteCategory({{ $category->id }})" 
                                            class="admin-btn admin-btn-outline btn-sm text-danger" 
                                            title="حذف"
                                            onclick="return confirm('هل أنت متأكد من حذف هذا التصنيف؟')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="admin-card">
                        <div class="admin-card-body text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-tags fs-1 d-block mb-3"></i>
                                <h5>لا توجد تصنيفات متاحة</h5>
                                <p>ابدأ بإنشاء تصنيف جديد لإدارة محتوى موقعك</p>
                                <button wire:click="$set('showCreateModal', true)" class="admin-btn admin-btn-primary">
                                    <i class="bi bi-plus-circle"></i>
                                    إنشاء تصنيف جديد
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- ترقيم الصفحات -->
            @if($categories->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links() }}
            </div>
            @endif
        </div>
    </main>

    <!-- Modal إنشاء/تعديل تصنيف -->
    @if($showCreateModal || $showEditModal)
    <div class="modal fade show" style="display: block;" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-tag me-2"></i>
                        {{ $showEditModal ? 'تعديل التصنيف' : 'تصنيف جديد' }}
                    </h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateCategory' : 'createCategory' }}">
                        <div class="admin-form-group">
                            <label class="admin-form-label">اسم التصنيف</label>
                            <input type="text" wire:model="form.name" class="admin-form-input" required>
                            @error('form.name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        
                        <div class="admin-form-group">
                            <label class="admin-form-label">وصف التصنيف</label>
                            <textarea wire:model="form.description" class="admin-form-input" rows="3"></textarea>
                            @error('form.description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">نوع التصنيف</label>
                                    <select wire:model="form.type" class="admin-form-input" required>
                                        <option value="news">أخبار</option>
                                        <option value="video">فيديو</option>
                                    </select>
                                    @error('form.type') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">الحالة</label>
                                    <select wire:model="form.is_active" class="admin-form-input" required>
                                        <option value="1">نشط</option>
                                        <option value="0">غير نشط</option>
                                    </select>
                                    @error('form.is_active') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="admin-form-group">
                            <label class="admin-form-label">لون التصنيف</label>
                            <input type="color" wire:model="form.color" class="admin-form-input" style="height: 50px;">
                            @error('form.color') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="admin-btn admin-btn-outline" wire:click="closeModal">إلغاء</button>
                    <button type="button" class="admin-btn admin-btn-primary" wire:click="{{ $showEditModal ? 'updateCategory' : 'createCategory' }}">
                        <i class="bi bi-check-circle"></i>
                        {{ $showEditModal ? 'تحديث' : 'إنشاء' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>

<style>
.modal {
    z-index: 1050;
}
.modal-backdrop {
    z-index: 1040;
}
</style>