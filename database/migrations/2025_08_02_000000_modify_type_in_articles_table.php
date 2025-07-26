<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // تغيير type إلى ENUM مع قيم محدودة (يمكنك إضافة المزيد إذا لزم)
            $table->enum('type', ['news', 'report', 'opinion', 'infographic', 'video'])
                ->change(); // تغيير نوع الحقل إذا كان موجوداً

            // إضافة فهرس على type لتسريع الاستعلامات (فقط إذا لم يكن موجوداً)
            if (!Schema::hasIndex('articles', 'articles_type_index')) {
                $table->index('type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // إعادة type إلى string إذا لزم (للتراجع)
            $table->string('type')->change();
            
            // حذف index إذا كان موجوداً
            if (Schema::hasIndex('articles', 'articles_type_index')) {
                $table->dropIndex(['type']);
            }
        });
    }
};