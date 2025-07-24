<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // فهارس على categories (للفلترة بالslug أو type)
        Schema::table('categories', function (Blueprint $table) {
            $table->index('slug');
            $table->index('type'); // إذا كان type موجوداً
            $table->index(['type', 'slug']); // فهرس مركب
        });

        // فهارس على authors (افتراضياً جدول users أو authors)
        Schema::table('authors', function (Blueprint $table) {
            $table->index('name');
            $table->index('slug'); // إذا كان موجوداً
        });

        // فهارس على videos (مشابه لـ articles)
        Schema::table('videos', function (Blueprint $table) {
            $table->index('is_published');
            $table->index('published_at');
            $table->index('category_id');
            $table->index('author_id');
            $table->index(['is_published', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['type']);
            $table->dropIndex(['type', 'slug']);
        });

        Schema::table('authors', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['slug']);
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->dropIndex(['is_published']);
            $table->dropIndex(['published_at']);
            $table->dropIndex(['category_id']);
            $table->dropIndex(['author_id']);
            $table->dropIndex(['is_published', 'published_at']);
        });
    }
};