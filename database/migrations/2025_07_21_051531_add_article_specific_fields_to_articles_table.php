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
            // Article specific fields
            $table->enum('article_type', ['general', 'analysis', 'feature', 'interview', 'review', 'tutorial'])->nullable();
            $table->string('article_topic')->nullable();
            $table->text('article_keywords')->nullable();
            $table->text('article_summary')->nullable();
            $table->text('article_conclusion')->nullable();
            $table->text('article_references')->nullable();
            $table->string('article_reading_time')->nullable();
            $table->enum('article_difficulty', ['easy', 'medium', 'hard'])->default('easy');
            $table->enum('article_target_audience', ['general', 'experts', 'beginners', 'students'])->default('general');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'article_type', 'article_topic', 'article_keywords', 'article_summary',
                'article_conclusion', 'article_references', 'article_reading_time',
                'article_difficulty', 'article_target_audience'
            ]);
        });
    }
};
