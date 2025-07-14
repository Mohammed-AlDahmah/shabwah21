<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        // يمكن لاحقًا جلب الإشعارات من قاعدة البيانات
        $notifications = [
            [
                'type' => 'success',
                'message' => 'مرحباً بك في لوحة التحكم!'
            ],
            [
                'type' => 'info',
                'message' => 'يمكنك إدارة الأخبار والفيديوهات والتصنيفات من هنا.'
            ]
        ];
        return view('livewire.admin.notifications', compact('notifications'));
    }
} 