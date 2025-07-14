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
