<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToArticlesTable extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // إضافة فهارس للأعمدة المستخدمة بكثرة
            $table->index('is_published');
            $table->index('published_at');
            $table->index('category_id');
            $table->index('author_id');
            
            // فهرس مركب للاستعلامات المعقدة
            $table->index(['is_published', 'published_at']);
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex(['is_published']);
            $table->dropIndex(['published_at']);
            $table->dropIndex(['category_id']);
            $table->dropIndex(['author_id']);
            $table->dropIndex(['is_published', 'published_at']);
        });
    }
}