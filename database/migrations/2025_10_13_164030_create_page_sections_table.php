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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page'); // home, about, contact, etc.
            $table->string('section'); // hero, about, features, etc.
            $table->string('key')->unique(); // e.g., home-hero, about-header
            $table->text('heading')->nullable();
            $table->text('subheading')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->json('meta')->nullable(); // For additional flexible data
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('page');
            $table->index('key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
