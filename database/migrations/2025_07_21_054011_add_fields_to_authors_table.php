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
        Schema::table('authors', function (Blueprint $table) {
            // Professional info
            $table->string('specialization')->nullable()->after('email');
            $table->integer('experience_years')->nullable()->after('specialization');
            $table->text('education')->nullable()->after('experience_years');
            $table->text('awards')->nullable()->after('education');
            
            // Social media (replace old fields)
            $table->json('social_media')->nullable()->after('awards');
            
            // Status and settings
            $table->boolean('is_featured')->default(false)->after('is_active');
            
            // Contact and location
            $table->string('contact_info')->nullable()->after('is_featured');
            $table->string('location')->nullable()->after('contact_info');
            
            // Additional info
            $table->string('languages')->nullable()->after('location');
            $table->text('expertise_areas')->nullable()->after('languages');
            $table->integer('publication_count')->default(0)->after('expertise_areas');
            $table->date('join_date')->nullable()->after('publication_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn([
                'specialization', 'experience_years', 'education', 'awards',
                'social_media', 'is_featured', 'contact_info', 'location',
                'languages', 'expertise_areas', 'publication_count', 'join_date'
            ]);
        });
    }
};
