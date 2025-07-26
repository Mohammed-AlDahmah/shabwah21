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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('featured_image')->nullable();
            $table->json('images')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('author')->default('شبوة21');
            $table->string('source')->nullable();
            $table->string('source_url')->nullable();
            $table->integer('views_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_breaking')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->json('meta_data')->nullable();
            $table->string('type')->default('news')->index();
            $table->timestamps();

            // إضافة indexes مهمة لتحسين الأداء
            $table->index(['is_published', 'published_at'], 'idx_published_at');
            $table->index(['is_featured'], 'idx_is_featured');
            $table->index(['is_breaking'], 'idx_is_breaking');
            $table->index(['views_count'], 'idx_views_count');
            $table->index(['category_id', 'is_published'], 'idx_category_published');
            $table->index(['type', 'is_published', 'published_at'], 'idx_type_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
