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
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-tags admin-nav-icon"></i>
                    <span>التصنيفات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link active">
                    <i class="bi bi-people admin-nav-icon"></i>
                    <span>المستخدمون</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
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
                <i class="bi bi-people me-2"></i>
                إدارة المستخدمين
            </div>
            <div class="admin-header-actions">
                <button wire:click="$set('showCreateModal', true)" class="admin-btn admin-btn-primary">
                    <i class="bi bi-person-plus"></i>
                    مستخدم جديد
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
                            <input type="text" wire:model.live="search" class="admin-form-input" placeholder="البحث في المستخدمين...">
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="roleFilter" class="admin-form-input">
                                <option value="">جميع الأدوار</option>
                                <option value="admin">مدير</option>
                                <option value="editor">محرر</option>
                                <option value="author">كاتب</option>
                                <option value="user">مستخدم</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="statusFilter" class="admin-form-input">
                                <option value="">جميع الحالات</option>
                                <option value="active">نشط</option>
                                <option value="inactive">غير نشط</option>
                                <option value="banned">محظور</option>
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

            <!-- جدول المستخدمين -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">
                        <i class="bi bi-list-ul me-2"></i>
                        قائمة المستخدمين
                    </h5>
                </div>
                <div class="admin-card-body">
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>الصورة</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الدور</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>الحالة</th>
                                    <th>آخر تسجيل دخول</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->avatar ?? '/images/default-avatar.png' }}" 
                                                 alt="{{ $user->name }}" 
                                                 class="rounded-circle me-2" 
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $user->name }}</strong>
                                            @if($user->is_verified)
                                                <i class="bi bi-patch-check-fill text-primary ms-1" title="مستخدم موثق"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @switch($user->role)
                                            @case('admin')
                                                <span class="badge bg-danger">مدير</span>
                                                @break
                                            @case('editor')
                                                <span class="badge bg-warning">محرر</span>
                                                @break
                                            @case('author')
                                                <span class="badge bg-info">كاتب</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">مستخدم</span>
                                        @endswitch
                                    </td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($user->is_active)
                                            <span class="badge bg-success">نشط</span>
                                        @elseif($user->is_banned)
                                            <span class="badge bg-danger">محظور</span>
                                        @else
                                            <span class="badge bg-secondary">غير نشط</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->last_login_at)
                                            {{ $user->last_login_at->diffForHumans() }}
                                        @else
                                            <span class="text-muted">لم يسجل دخول</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button wire:click="editUser({{ $user->id }})" 
                                                    class="admin-btn admin-btn-outline btn-sm" 
                                                    title="تعديل">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            @if($user->is_banned)
                                                <button wire:click="unbanUser({{ $user->id }})" 
                                                        class="admin-btn admin-btn-outline btn-sm text-success" 
                                                        title="إلغاء الحظر">
                                                    <i class="bi bi-unlock"></i>
                                                </button>
                                            @else
                                                <button wire:click="banUser({{ $user->id }})" 
                                                        class="admin-btn admin-btn-outline btn-sm text-warning" 
                                                        title="حظر">
                                                    <i class="bi bi-lock"></i>
                                                </button>
                                            @endif
                                            <button wire:click="deleteUser({{ $user->id }})" 
                                                    class="admin-btn admin-btn-outline btn-sm text-danger" 
                                                    title="حذف"
                                                    onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-people fs-1 d-block mb-2"></i>
                                            لا يوجد مستخدمون متاحون
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- ترقيم الصفحات -->
                    @if($users->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Modal إنشاء/تعديل مستخدم -->
    @if($showCreateModal || $showEditModal)
    <div class="modal fade show" style="display: block;" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person-plus me-2"></i>
                        {{ $showEditModal ? 'تعديل المستخدم' : 'مستخدم جديد' }}
                    </h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">الاسم الكامل</label>
                                    <input type="text" wire:model="form.name" class="admin-form-input" required>
                                    @error('form.name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">اسم المستخدم</label>
                                    <input type="text" wire:model="form.username" class="admin-form-input" required>
                                    @error('form.username') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">البريد الإلكتروني</label>
                                    <input type="email" wire:model="form.email" class="admin-form-input" required>
                                    @error('form.email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">رقم الهاتف</label>
                                    <input type="tel" wire:model="form.phone" class="admin-form-input">
                                    @error('form.phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            @if(!$showEditModal)
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">كلمة المرور</label>
                                    <input type="password" wire:model="form.password" class="admin-form-input" required>
                                    @error('form.password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">تأكيد كلمة المرور</label>
                                    <input type="password" wire:model="form.password_confirmation" class="admin-form-input" required>
                                    @error('form.password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">الدور</label>
                                    <select wire:model="form.role" class="admin-form-input" required>
                                        <option value="user">مستخدم</option>
                                        <option value="author">كاتب</option>
                                        <option value="editor">محرر</option>
                                        <option value="admin">مدير</option>
                                    </select>
                                    @error('form.role') <small class="text-danger">{{ $message }}</small> @enderror
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
                            <div class="col-12">
                                <div class="admin-form-group">
                                    <label class="admin-form-label">الملف الشخصي</label>
                                    <textarea wire:model="form.bio" class="admin-form-input" rows="3" placeholder="نبذة مختصرة عن المستخدم..."></textarea>
                                    @error('form.bio') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="admin-btn admin-btn-outline" wire:click="closeModal">إلغاء</button>
                    <button type="button" class="admin-btn admin-btn-primary" wire:click="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
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