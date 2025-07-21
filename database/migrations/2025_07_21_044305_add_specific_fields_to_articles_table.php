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
            // News specific fields
            $table->string('news_source')->nullable();
            $table->string('news_location')->nullable();
            $table->date('news_date')->nullable();
            $table->enum('news_priority', ['low', 'normal', 'high', 'urgent'])->default('normal');
            $table->text('news_tags')->nullable();
            $table->text('news_related_articles')->nullable();

            // Report specific fields
            $table->enum('report_type', ['investigation', 'analysis', 'field', 'research'])->nullable();
            $table->string('report_duration')->nullable();
            $table->string('report_location')->nullable();
            $table->text('report_interviews')->nullable();
            $table->text('report_sources')->nullable();
            $table->text('report_conclusions')->nullable();
            $table->text('report_recommendations')->nullable();
            $table->text('report_attachments')->nullable();

            // Opinion specific fields
            $table->enum('opinion_type', ['editorial', 'column', 'analysis', 'commentary'])->nullable();
            $table->string('opinion_topic')->nullable();
            $table->enum('opinion_perspective', ['neutral', 'supportive', 'critical', 'balanced'])->default('neutral');
            $table->string('opinion_expertise')->nullable();
            $table->text('opinion_credentials')->nullable();
            $table->text('opinion_related_events')->nullable();
            $table->text('opinion_call_to_action')->nullable();

            // Infographic specific fields
            $table->enum('infographic_type', ['statistical', 'timeline', 'comparison', 'process', 'geographic'])->nullable();
            $table->string('infographic_data_source')->nullable();
            $table->string('infographic_designer')->nullable();
            $table->string('infographic_dimensions')->nullable();
            $table->string('infographic_colors')->nullable();
            $table->enum('infographic_language', ['ar', 'en', 'both'])->default('ar');
            $table->boolean('infographic_downloadable')->default(false);
            $table->boolean('infographic_interactive')->default(false);
            $table->text('infographic_embed_code')->nullable();
            $table->string('infographic_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Drop news fields
            $table->dropColumn([
                'news_source', 'news_location', 'news_date', 'news_priority',
                'news_tags', 'news_related_articles'
            ]);

            // Drop report fields
            $table->dropColumn([
                'report_type', 'report_duration', 'report_location', 'report_interviews',
                'report_sources', 'report_conclusions', 'report_recommendations', 'report_attachments'
            ]);

            // Drop opinion fields
            $table->dropColumn([
                'opinion_type', 'opinion_topic', 'opinion_perspective', 'opinion_expertise',
                'opinion_credentials', 'opinion_related_events', 'opinion_call_to_action'
            ]);

            // Drop infographic fields
            $table->dropColumn([
                'infographic_type', 'infographic_data_source', 'infographic_designer',
                'infographic_dimensions', 'infographic_colors', 'infographic_language',
                'infographic_downloadable', 'infographic_interactive', 'infographic_embed_code',
                'infographic_file'
            ]);
        });
    }
};
