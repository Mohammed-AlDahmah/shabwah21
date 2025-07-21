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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->boolean('show_hero_section')->default(true);
            $table->boolean('show_breaking_news')->default(true);
            $table->boolean('show_newsletter')->default(true);
            $table->boolean('show_video_in_nav')->default(true);
            $table->boolean('show_about_in_nav')->default(true);
            $table->boolean('show_contact_in_nav')->default(true);
            $table->boolean('show_social_links_in_nav')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'show_hero_section',
                'show_breaking_news',
                'show_newsletter',
                'show_video_in_nav',
                'show_about_in_nav',
                'show_contact_in_nav',
                'show_social_links_in_nav',
            ]);
        });
    }
};
