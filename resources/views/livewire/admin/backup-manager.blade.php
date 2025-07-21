<div class="backup-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إدارة النسخ الاحتياطية</h1>
                <p class="text-gray-600">إدارة نسخ احتياطية للموقع والبيانات</p>
            </div>
            <div class="flex gap-3">
                <button wire:click="createBackup" class="btn-primary">
                    <i class="bi bi-download ml-2"></i>
                    إنشاء نسخة احتياطية
                </button>
                <button wire:click="clearCache" class="btn-secondary">
                    <i class="bi bi-arrow-clockwise ml-2"></i>
                    مسح الكاش
                </button>
            </div>
        </div>
    </div>

    <!-- Backup Stats -->
    <div class="stats-grid mb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-database"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $backupStats['total_backups'] ?? 0 }}</h3>
                    <p class="stat-label">إجمالي النسخ الاحتياطية</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $backupStats['last_backup'] ?? 'لا يوجد' }}</h3>
                    <p class="stat-label">آخر نسخة احتياطية</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-hdd"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $backupStats['total_size'] ?? '0 MB' }}</h3>
                    <p class="stat-label">إجمالي الحجم</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $backupStats['auto_backup'] ? 'مفعل' : 'معطل' }}</h3>
                    <p class="stat-label">النسخ التلقائي</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Backup List -->
    <div class="backup-list">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">النسخ الاحتياطية المتاحة</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                اسم الملف
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                النوع
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الحجم
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ الإنشاء
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الإجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($backups as $backup)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[#C08B2D] to-[#B22B2B] flex items-center justify-center text-white">
                                                <i class="bi bi-file-earmark-zip"></i>
                                            </div>
                                        </div>
                                        <div class="mr-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $backup['name'] }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $backup['description'] ?? 'نسخة احتياطية' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                   {{ $backup['type'] === 'full' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $backup['type'] === 'full' ? 'كاملة' : 'جزئية' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">
                                    {{ $backup['size'] ?? 'غير محدد' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{ $backup['created_at'] ?? 'غير محدد' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center gap-2">
                                        <button wire:click="downloadBackup('{{ $backup['name'] }}')" 
                                                class="text-[#C08B2D] hover:text-[#B22B2B] transition-colors">
                                            <i class="bi bi-download text-lg"></i>
                                        </button>
                                        <button wire:click="restoreBackup('{{ $backup['name'] }}')" 
                                                class="text-blue-600 hover:text-blue-800 transition-colors">
                                            <i class="bi bi-arrow-clockwise text-lg"></i>
                                        </button>
                                        <button wire:click="deleteBackup('{{ $backup['name'] }}')" 
                                                class="text-red-600 hover:text-red-800 transition-colors">
                                            <i class="bi bi-trash text-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="empty-state">
                                        <i class="bi bi-database text-4xl text-gray-300 mb-4"></i>
                                        <h3 class="text-lg font-semibold text-gray-600 mb-2">لا توجد نسخ احتياطية</h3>
                                        <p class="text-gray-500 mb-4">ابدأ بإنشاء نسختك الاحتياطية الأولى</p>
                                        <button wire:click="createBackup" class="btn-primary">
                                            <i class="bi bi-download ml-2"></i>
                                            إنشاء نسخة احتياطية
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Settings Modal -->
    @if($showSettingsModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" id="modal">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">إعدادات النسخ الاحتياطية</h3>
                        <button wire:click="closeSettingsModal" class="text-gray-400 hover:text-gray-600">
                            <i class="bi bi-x text-2xl"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="saveSettings">
                        <div class="space-y-6">
                            <!-- Auto Backup -->
                            <div class="form-group">
                                <label class="form-label">النسخ الاحتياطي التلقائي</label>
                                <div class="flex items-center space-x-4 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.auto_backup" value="1" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">مفعل</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.auto_backup" value="0" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">معطل</span>
                                    </label>
                                </div>
                                @error('form.auto_backup') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <!-- Backup Frequency -->
                            <div class="form-group">
                                <label class="form-label">تكرار النسخ الاحتياطية</label>
                                <select wire:model="form.backup_frequency" class="form-input">
                                    <option value="daily">يومياً</option>
                                    <option value="weekly">أسبوعياً</option>
                                    <option value="monthly">شهرياً</option>
                                </select>
                                @error('form.backup_frequency') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <!-- Retention Period -->
                            <div class="form-group">
                                <label class="form-label">فترة الاحتفاظ (بالأيام)</label>
                                <input type="number" wire:model="form.retention_days" 
                                       class="form-input"
                                       min="1" max="365">
                                @error('form.retention_days') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <!-- Backup Type -->
                            <div class="form-group">
                                <label class="form-label">نوع النسخ الاحتياطية</label>
                                <div class="flex items-center space-x-4 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.backup_type" value="full" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">كاملة</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.backup_type" value="incremental" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">جزئية</span>
                                    </label>
                                </div>
                                @error('form.backup_type') <span class="error-text">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 space-x-reverse mt-6">
                            <button type="button" wire:click="closeSettingsModal" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                إلغاء
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-[#C08B2D] text-white rounded-lg hover:bg-[#B22B2B] transition-colors">
                                حفظ الإعدادات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <style>
    /* Backup Management Styles */
    .backup-management {
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

    .btn-secondary {
        background: #f3f4f6;
        color: #374151;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid #d1d5db;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
    }

    .btn-secondary:hover {
        background: #e5e7eb;
        transform: translateY(-2px);
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .stat-content {
        flex: 1;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
    }

    /* Table Styles */
    .backup-list table {
        border-collapse: collapse;
    }

    .backup-list th {
        background: #f9fafb;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .backup-list td, .backup-list th {
        padding: 1rem 1.5rem;
        text-align: right;
    }

    .backup-list tbody tr:hover {
        background: #f9fafb;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #C08B2D;
        box-shadow: 0 0 0 3px rgba(192, 139, 45, 0.1);
    }

    .error-text {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: block;
    }

    /* Modal Styles */
    #modal {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .backup-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .stats-grid .grid {
            grid-template-columns: 1fr;
        }
        
        .backup-list {
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
            position: 'top-end',
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
        const { name } = event.detail;
        
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
                @this.deleteBackupConfirmed(name);
            }
        });
    });

    // Restore Confirmation
    window.addEventListener('confirmRestore', event => {
        const { name } = event.detail;
        
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "سيتم استبدال البيانات الحالية بالنسخة الاحتياطية!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3b82f6',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'نعم، استعيد!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.restoreBackupConfirmed(name);
            }
        });
    });
    </script>
</div> 