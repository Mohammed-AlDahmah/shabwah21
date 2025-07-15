<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Header extends Component
{
    public $user;
    public $notificationsCount;
    public $notifications;

    public function mount()
    {
        $this->user = auth()->user();
        $this->loadNotifications();
    }

    public function loadNotifications()
    {
        // هنا يمكنك إضافة الاستعلامات الفعلية لقاعدة البيانات
        // مثال:
        // $this->notifications = auth()->user()->notifications()->latest()->take(5)->get();
        // $this->notificationsCount = auth()->user()->unreadNotifications()->count();
        
        // بيانات تجريبية للعرض
        $this->notificationsCount = 3;
        $this->notifications = collect([
            [
                'id' => 1,
                'title' => 'مقال جديد في انتظار المراجعة',
                'time' => 'منذ 5 دقائق',
                'type' => 'article'
            ],
            [
                'id' => 2,
                'title' => 'تعليق جديد على المقال',
                'time' => 'منذ 15 دقيقة',
                'type' => 'comment'
            ],
            [
                'id' => 3,
                'title' => 'مستخدم جديد سجل في الموقع',
                'time' => 'منذ ساعة',
                'type' => 'user'
            ]
        ]);
    }

    public function markAsRead($notificationId)
    {
        // هنا يمكنك إضافة منطق وضع علامة مقروء على الإشعار
        $this->notificationsCount = max(0, $this->notificationsCount - 1);
    }

    public function render()
    {
        return view('livewire.admin.header');
    }
} 