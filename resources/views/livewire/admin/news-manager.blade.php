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
                <a href="#" class="admin-nav-link active">
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
                <a href="{{ route('admin.categories') }}" class="admin-nav-link">
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
                <i class="bi bi-file-earmark-text me-2"></i>
                إدارة المقالات
            </div>
            <div class="admin-header-actions">
                <button wire:click="$set('showCreateModal', true)" class="admin-btn admin-btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    مقال جديد
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
            <!-- شريط البحث والفلترة -->
            <div class="admin-card mb-4">
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" wire:model.live="search" class="admin-form-input" placeholder="البحث في المقالات...">
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="categoryFilter" class="admin-form-input">
                                <option value="">جميع التصنيفات</option>
                                <option value="1">أخبار محلية</option>
                                <option value="2">أخبار رياضية</option>
                                <option value="3">أخبار اقتصادية</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="statusFilter" class="admin-form-input">
                                <option value="">جميع الحالات</option>
                                <option value="published">منشور</option>
                                <option value="draft">مسودة</option>
                                <option value="pending">في الانتظار</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button wire:click="clearFilters" class="admin-btn admin-btn-outline w-100">
                                <i class="bi bi-arrow-clockwise"></i>
                                إعادة تعيين
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- جدول المقالات -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">
                        <i class="bi bi-list-ul me-2"></i>
                        قائمة المقالات
                    </h5>
                </div>
                <div class="admin-card-body">
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>الصورة</th>
                                    <th>العنوان</th>
                                    <th>التصنيف</th>
                                    <th>المؤلف</th>
                                    <th>التاريخ</th>
                                    <th>الحالة</th>
                                    <th>المشاهدات</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($articles as $article)
                                <tr>
                                    <td>
                                        <img src="{{ $article->image ?? '/images/placeholder.jpg' }}" 
                                             alt="{{ $article->title }}" 
                                             class="rounded" 
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $article->title }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($article->excerpt, 50) }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $article->category->name ?? 'بدون تصنيف' }}</span>
                                    </td>
                                    <td>{{ $article->author->name ?? 'غير محدد' }}</td>
                                    <td>{{ $article->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($article->status === 'published')
                                            <span class="badge bg-success">منشور</span>
                                        @elseif($article->status === 'draft')
                                            <span class="badge bg-warning">مسودة</span>
                                        @else
                                            <span class="badge bg-secondary">في الانتظار</span>
                                        @endif
                                    </td>
                                    <td>{{ $article->views_count ?? 0 }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button wire:click="editArticle({{ $article->id }})" 
                                                    class="admin-btn admin-btn-outline btn-sm" 
                                                    title="تعديل">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button wire:click="deleteArticle({{ $article->id }})" 
                                                    class="admin-btn admin-btn-outline btn-sm text-danger" 
                                                    title="حذف"
                                                    onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <a href="{{ route('news.show', $article->slug) }}" 
                                               target="_blank"
                                               class="admin-btn admin-btn-outline btn-sm" 
                                               title="عرض">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                            لا توجد مقالات متاحة
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- ترقيم الصفحات -->
                    @if($articles->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $articles->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Modal إنشاء/تعديل مقال -->
    @if($showCreateModal || $showEditModal)
    <div class="modal fade show" style="display: block;" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-file-earmark-plus me-2"></i>
                        {{ $showEditModal ? 'تعديل المقال' : 'مقال جديد' }}
                    </h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateArticle' : 'createArticle' }}">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">عنوان المقال</label>
                                    <input type="text" wire:model="form.title" class="admin-form-input" required>
                                    @error('form.title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">التصنيف</label>
                                    <select wire:model="form.category_id" class="admin-form-input" required>
                                        <option value="">اختر التصنيف</option>
                                        <option value="1">أخبار محلية</option>
                                        <option value="2">أخبار رياضية</option>
                                        <option value="3">أخبار اقتصادية</option>
                                    </select>
                                    @error('form.category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">ملخص المقال</label>
                                    <textarea wire:model="form.excerpt" class="admin-form-input" rows="3" required></textarea>
                                    @error('form.excerpt') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">محتوى المقال</label>
                                    <textarea wire:model="form.content" class="admin-form-input" rows="10" required></textarea>
                                    @error('form.content') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">صورة المقال</label>
                                    <input type="file" wire:model="form.image" class="admin-form-input" accept="image/*">
                                    @error('form.image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">الحالة</label>
                                    <select wire:model="form.status" class="admin-form-input" required>
                                        <option value="draft">مسودة</option>
                                        <option value="pending">في الانتظار</option>
                                        <option value="published">منشور</option>
                                    </select>
                                    @error('form.status') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="admin-btn admin-btn-outline" wire:click="closeModal">إلغاء</button>
                    <button type="button" class="admin-btn admin-btn-primary" wire:click="{{ $showEditModal ? 'updateArticle' : 'createArticle' }}">
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