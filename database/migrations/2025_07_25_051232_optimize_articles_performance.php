<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // فهارس أساسية لتحسين الأداء
            $table->index(['is_published', 'published_at'], 'articles_published_date_idx');
            $table->index(['is_published', 'type', 'published_at'], 'articles_type_published_idx');
            $table->index(['is_published', 'is_featured', 'published_at'], 'articles_featured_published_idx');
            $table->index(['is_published', 'views_count'], 'articles_views_idx');
            $table->index(['category_id', 'is_published', 'published_at'], 'articles_category_published_idx');
            $table->index('slug', 'articles_slug_idx');
            $table->index('type', 'articles_type_idx');
            $table->index('views_count', 'articles_views_count_idx');
            
            // فهارس مركبة للاستعلامات المعقدة
            $table->index(['is_published', 'type', 'is_featured', 'published_at'], 'articles_complex_query_idx');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'categories_active_sort_idx');
            $table->index('slug', 'categories_slug_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex('articles_published_date_idx');
            $table->dropIndex('articles_type_published_idx');
            $table->dropIndex('articles_featured_published_idx');
            $table->dropIndex('articles_views_idx');
            $table->dropIndex('articles_category_published_idx');
            $table->dropIndex('articles_slug_idx');
            $table->dropIndex('articles_type_idx');
            $table->dropIndex('articles_views_count_idx');
            $table->dropIndex('articles_complex_query_idx');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_active_sort_idx');
            $table->dropIndex('categories_slug_idx');
        });
    }
};
