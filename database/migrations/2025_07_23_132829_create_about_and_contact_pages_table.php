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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('من نحن');
            $table->string('subtitle')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->json('values')->nullable(); // array of values
            $table->text('team')->nullable();
            $table->json('services')->nullable(); // array of services
            $table->json('stats')->nullable(); // array of stats
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('work_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
