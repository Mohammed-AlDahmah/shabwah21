<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'أحمد محمد علي',
                'email' => 'admin@shabwah21.com',
                'password' => 'password123',
                'role' => 'admin',
                'is_active' => true,
                'phone' => '+967 777 123 456',
                'position' => 'مدير عام',
                'department' => 'الإدارة العامة',
                'bio' => 'مدير عام موقع شبوة21، مسؤول عن إدارة جميع العمليات والاستراتيجيات العامة للموقع.',
                'avatar' => null,
                'last_login_at' => now(),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'فاطمة عبدالله حسن',
                'email' => 'editor@shabwah21.com',
                'password' => 'password123',
                'role' => 'editor',
                'is_active' => true,
                'phone' => '+967 777 234 567',
                'position' => 'رئيس التحرير',
                'department' => 'التحرير',
                'bio' => 'رئيسة التحرير في موقع شبوة21، مسؤولة عن مراجعة وتحرير جميع المحتويات قبل النشر.',
                'avatar' => null,
                'last_login_at' => now()->subHours(2),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'محمد سالم القحطاني',
                'email' => 'reporter@shabwah21.com',
                'password' => 'password123',
                'role' => 'editor',
                'is_active' => true,
                'phone' => '+967 777 345 678',
                'position' => 'مراسل صحفي',
                'department' => 'المراسلين',
                'bio' => 'مراسل صحفي متخصص في الشؤون الاقتصادية والسياسية، يغطي الأحداث في منطقة شبوة.',
                'avatar' => null,
                'last_login_at' => now()->subHours(5),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'سارة أحمد المقطري',
                'email' => 'writer@shabwah21.com',
                'password' => 'password123',
                'role' => 'editor',
                'is_active' => true,
                'phone' => '+967 777 456 789',
                'position' => 'كاتبة محتوى',
                'department' => 'المحتوى',
                'bio' => 'كاتبة محتوى متخصصة في الشؤون الاجتماعية والثقافية، تكتب مقالات رأي وتحليلات.',
                'avatar' => null,
                'last_login_at' => now()->subHours(8),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'علي حسن الشميري',
                'email' => 'photographer@shabwah21.com',
                'password' => 'password123',
                'role' => 'user',
                'is_active' => true,
                'phone' => '+967 777 567 890',
                'position' => 'مصور صحفي',
                'department' => 'التصوير',
                'bio' => 'مصور صحفي محترف، متخصص في تصوير الأحداث والمناسبات والتحقيقات الصحفية.',
                'avatar' => null,
                'last_login_at' => now()->subHours(12),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'نورا محمد العولقي',
                'email' => 'social@shabwah21.com',
                'password' => 'password123',
                'role' => 'editor',
                'is_active' => true,
                'phone' => '+967 777 678 901',
                'position' => 'مديرة وسائل التواصل الاجتماعي',
                'department' => 'التسويق الرقمي',
                'bio' => 'مديرة وسائل التواصل الاجتماعي، مسؤولة عن إدارة حسابات الموقع على جميع المنصات.',
                'avatar' => null,
                'last_login_at' => now()->subHours(1),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'يوسف عبدالرحمن الحمادي',
                'email' => 'tech@shabwah21.com',
                'password' => 'password123',
                'role' => 'admin',
                'is_active' => true,
                'phone' => '+967 777 789 012',
                'position' => 'مطور ويب',
                'department' => 'تقنية المعلومات',
                'bio' => 'مطور ويب مسؤول عن تطوير وصيانة موقع شبوة21 وجميع الأنظمة التقنية.',
                'avatar' => null,
                'last_login_at' => now()->subMinutes(30),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'مريم أحمد السقاف',
                'email' => 'design@shabwah21.com',
                'password' => 'password123',
                'role' => 'user',
                'is_active' => true,
                'phone' => '+967 777 890 123',
                'position' => 'مصممة جرافيك',
                'department' => 'التصميم',
                'bio' => 'مصممة جرافيك متخصصة في تصميم الإنفوجرافيك والمواد البصرية للموقع.',
                'avatar' => null,
                'last_login_at' => now()->subHours(3),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'خالد محمد البكري',
                'email' => 'sports@shabwah21.com',
                'password' => 'password123',
                'role' => 'editor',
                'is_active' => true,
                'phone' => '+967 777 901 234',
                'position' => 'مراسل رياضي',
                'department' => 'الرياضة',
                'bio' => 'مراسل رياضي متخصص في تغطية الأحداث الرياضية المحلية والإقليمية.',
                'avatar' => null,
                'last_login_at' => now()->subHours(6),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'ليلى عبدالله الحميري',
                'email' => 'culture@shabwah21.com',
                'password' => 'password123',
                'role' => 'editor',
                'is_active' => true,
                'phone' => '+967 777 012 345',
                'position' => 'كاتبة ثقافية',
                'department' => 'الثقافة والفنون',
                'bio' => 'كاتبة متخصصة في الشؤون الثقافية والفنية، تكتب عن التراث والفنون اليمنية.',
                'avatar' => null,
                'last_login_at' => now()->subHours(4),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'عبدالله أحمد العولقي',
                'email' => 'moderator@shabwah21.com',
                'password' => 'password123',
                'role' => 'editor',
                'is_active' => true,
                'phone' => '+967 777 123 789',
                'position' => 'مشرف المحتوى',
                'department' => 'الإشراف',
                'bio' => 'مشرف المحتوى مسؤول عن مراقبة وتنظيم التعليقات والمحتوى المقدم من المستخدمين.',
                'avatar' => null,
                'last_login_at' => now()->subHours(7),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'أسماء محمد القحطاني',
                'email' => 'assistant@shabwah21.com',
                'password' => 'password123',
                'role' => 'user',
                'is_active' => true,
                'phone' => '+967 777 234 890',
                'position' => 'مساعد إداري',
                'department' => 'الإدارة',
                'bio' => 'مساعد إداري يساعد في تنظيم الأعمال الإدارية والمراسلات الداخلية.',
                'avatar' => null,
                'last_login_at' => now()->subHours(10),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
                'role' => $userData['role'],
                'is_active' => $userData['is_active'],
                'phone' => $userData['phone'],
                'position' => $userData['position'],
                'department' => $userData['department'],
                'bio' => $userData['bio'],
                'avatar' => $userData['avatar'],
                'last_login_at' => $userData['last_login_at'],
                'email_verified_at' => $userData['email_verified_at'],
            ]);
        }

        $this->command->info('تم إنشاء ' . count($users) . ' مستخدم بنجاح!');
        $this->command->info('كلمة المرور لجميع المستخدمين: password123');
    }
}
