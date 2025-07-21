<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupManager extends Component
{
    public $showSettingsModal = false;
    public $backups = [];
    public $backupStats = [];

    // Form fields
    public $form = [
        'auto_backup' => false,
        'backup_frequency' => 'daily',
        'retention_days' => 30,
        'backup_type' => 'full',
    ];

    protected $rules = [
        'form.auto_backup' => 'boolean',
        'form.backup_frequency' => 'required|in:daily,weekly,monthly',
        'form.retention_days' => 'required|integer|min:1|max:365',
        'form.backup_type' => 'required|in:full,incremental',
    ];

    protected $listeners = [
        'deleteConfirmed' => 'deleteBackupConfirmed',
        'restoreConfirmed' => 'restoreBackupConfirmed',
        'closeModal' => 'closeSettingsModal',
    ];

    public function mount()
    {
        $this->loadBackups();
        $this->loadStats();
    }

    public function loadBackups()
    {
        // Simulate backup data - in real implementation, this would read from storage
        $this->backups = [
            [
                'name' => 'backup_2024_01_15_120000.zip',
                'description' => 'نسخة احتياطية كاملة',
                'type' => 'full',
                'size' => '45.2 MB',
                'created_at' => '2024-01-15 12:00:00',
            ],
            [
                'name' => 'backup_2024_01_14_120000.zip',
                'description' => 'نسخة احتياطية كاملة',
                'type' => 'full',
                'size' => '44.8 MB',
                'created_at' => '2024-01-14 12:00:00',
            ],
            [
                'name' => 'backup_2024_01_13_120000.zip',
                'description' => 'نسخة احتياطية جزئية',
                'type' => 'incremental',
                'size' => '2.1 MB',
                'created_at' => '2024-01-13 12:00:00',
            ],
        ];
    }

    public function loadStats()
    {
        $this->backupStats = [
            'total_backups' => count($this->backups),
            'last_backup' => count($this->backups) > 0 ? $this->backups[0]['created_at'] : 'لا يوجد',
            'total_size' => '92.1 MB',
            'auto_backup' => $this->form['auto_backup'],
        ];
    }

    public function createBackup()
    {
        try {
            // In real implementation, this would create an actual backup
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء النسخة الاحتياطية بنجاح'
            ]);
            
            $this->loadBackups();
            $this->loadStats();
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في الإنشاء',
                'message' => 'حدث خطأ أثناء إنشاء النسخة الاحتياطية'
            ]);
        }
    }

    public function downloadBackup($backupName)
    {
        try {
            // In real implementation, this would trigger a download
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحميل',
                'message' => 'جاري تحميل النسخة الاحتياطية'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في التحميل',
                'message' => 'حدث خطأ أثناء تحميل النسخة الاحتياطية'
            ]);
        }
    }

    public function restoreBackup($backupName)
    {
        $this->dispatch('confirmRestore', ['name' => $backupName]);
    }

    public function restoreBackupConfirmed($data)
    {
        $backupName = $data['name'] ?? null;
        if (!$backupName) return;

        try {
            // In real implementation, this would restore from backup
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الاستعادة بنجاح',
                'message' => 'تم استعادة النسخة الاحتياطية بنجاح'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في الاستعادة',
                'message' => 'حدث خطأ أثناء استعادة النسخة الاحتياطية'
            ]);
        }
    }

    public function deleteBackup($backupName)
    {
        $this->dispatch('confirmDelete', ['name' => $backupName]);
    }

    public function deleteBackupConfirmed($data)
    {
        $backupName = $data['name'] ?? null;
        if (!$backupName) return;

        try {
            // In real implementation, this would delete the backup file
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحذف بنجاح',
                'message' => 'تم حذف النسخة الاحتياطية بنجاح'
            ]);
            
            $this->loadBackups();
            $this->loadStats();
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في الحذف',
                'message' => 'حدث خطأ أثناء حذف النسخة الاحتياطية'
            ]);
        }
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم المسح بنجاح',
                'message' => 'تم مسح جميع أنواع الكاش بنجاح'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في المسح',
                'message' => 'حدث خطأ أثناء مسح الكاش'
            ]);
        }
    }

    public function openSettingsModal()
    {
        $this->showSettingsModal = true;
    }

    public function closeSettingsModal()
    {
        $this->showSettingsModal = false;
    }

    public function saveSettings()
    {
        $this->validate();

        try {
            // In real implementation, this would save to database or config
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحفظ بنجاح',
                'message' => 'تم حفظ إعدادات النسخ الاحتياطية بنجاح'
            ]);
            
            $this->closeSettingsModal();
            $this->loadStats();
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'خطأ في الحفظ',
                'message' => 'حدث خطأ أثناء حفظ الإعدادات'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.backup-manager');
    }
} 