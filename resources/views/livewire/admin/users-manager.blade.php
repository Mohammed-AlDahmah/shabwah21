<div class="users-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إدارة المستخدمين</h1>
                <p class="text-gray-600">إدارة جميع المستخدمين في الموقع</p>
            </div>
            <button wire:click="createUser" class="btn-primary">
                <i class="bi bi-plus-circle ml-2"></i>
                مستخدم جديد
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
                               placeholder="ابحث في المستخدمين..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Role Filter -->
                <div class="role-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">الصلاحية</label>
                    <select wire:model.live="roleFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الصلاحيات</option>
                        <option value="admin">مدير</option>
                        <option value="editor">محرر</option>
                        <option value="author">كاتب</option>
                        <option value="user">مستخدم</option>
                    </select>
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
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="users-table">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                المستخدم
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                البريد الإلكتروني
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الصلاحية
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الحالة
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ التسجيل
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الإجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[#C08B2D] to-[#B22B2B] flex items-center justify-center text-white font-semibold">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="mr-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $user->articles_count ?? 0 }} مقال
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                   {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 
                                                      ($user->role === 'editor' ? 'bg-blue-100 text-blue-800' : 
                                                       ($user->role === 'author' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800')) }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button wire:click="toggleStatus({{ $user->id }})" 
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium cursor-pointer transition-colors
                                                   {{ $user->is_active 
                                                       ? 'bg-green-100 text-green-800 hover:bg-green-200' 
                                                       : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                        <i class="bi bi-{{ $user->is_active ? 'check-circle' : 'x-circle' }} ml-1"></i>
                                        {{ $user->is_active ? 'نشط' : 'غير نشط' }}
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{ $user->created_at->format('Y/m/d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center gap-2">
                                        <button wire:click="editUser({{ $user->id }})" 
                                                class="text-[#C08B2D] hover:text-[#B22B2B] transition-colors">
                                            <i class="bi bi-pencil text-lg"></i>
                                        </button>
                                        @if($user->id !== auth()->id())
                                            <button wire:click="deleteUser({{ $user->id }})" 
                                                    class="text-red-600 hover:text-red-800 transition-colors">
                                                <i class="bi bi-trash text-lg"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="empty-state">
                                        <i class="bi bi-people text-4xl text-gray-300 mb-4"></i>
                                        <h3 class="text-lg font-semibold text-gray-600 mb-2">لا يوجد مستخدمين</h3>
                                        <p class="text-gray-500 mb-4">ابدأ بإنشاء مستخدمك الأول</p>
                                        <button wire:click="createUser" class="btn-primary">
                                            <i class="bi bi-plus-circle ml-2"></i>
                                            إنشاء مستخدم جديد
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $users->links() }}
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
                            {{ $editingUser ? 'تعديل المستخدم' : 'مستخدم جديد' }}
                        </h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <i class="bi bi-x text-2xl"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="saveUser">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الاسم</label>
                                <input type="text" wire:model="form.name" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل الاسم">
                                @error('form.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                                <input type="email" wire:model="form.email" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل البريد الإلكتروني">
                                @error('form.email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Password -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ $editingUser ? 'كلمة المرور الجديدة (اختياري)' : 'كلمة المرور' }}
                                </label>
                                <input type="password" wire:model="form.password" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="{{ $editingUser ? 'اتركها فارغة إذا لم ترد تغييرها' : 'أدخل كلمة المرور' }}">
                                @error('form.password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Role -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">الصلاحية</label>
                                <select wire:model="form.role" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="user">مستخدم</option>
                                    <option value="author">كاتب</option>
                                    <option value="editor">محرر</option>
                                    <option value="admin">مدير</option>
                                </select>
                                @error('form.role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">الحالة</label>
                                <div class="flex items-center space-x-4 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.is_active" value="1" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">نشط</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.is_active" value="0" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">غير نشط</span>
                                    </label>
                                </div>
                                @error('form.is_active') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 space-x-reverse mt-6">
                            <button type="button" wire:click="closeModal" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                إلغاء
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-[#C08B2D] text-white rounded-lg hover:bg-[#B22B2B] transition-colors">
                                {{ $editingUser ? 'تحديث المستخدم' : 'إنشاء المستخدم' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <style>
    /* Users Management Styles */
    .users-management {
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
    .users-table table {
        border-collapse: collapse;
    }

    .users-table th {
        background: #f9fafb;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .users-table td, .users-table th {
        padding: 1rem 1.5rem;
        text-align: right;
    }

    .users-table tbody tr:hover {
        background: #f9fafb;
    }

    /* Modal Styles */
    #modal {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .users-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .users-table {
            overflow-x: auto;
        }
    }
    </style>

    <script>
    // SweetAlert2 Toast Function
    window.addEventListener('showToast', event => {
        const { type, title, message } = event.detail;
        
        Swal.fire({
            icon: type,
            title: title,
            text: message,
            toast: true,
             position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6',
            color: '#ffffff',
            customClass: {
                popup: 'swal2-toast'
            }
        });
    });

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
                @this.deleteUserConfirmed(id);
            }
        });
    });
    </script>
</div> 