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
            $table->string('page')->default('home'); // home, about, contact, etc.
            $table->string('section_name'); // hero, about, services, etc.
            $table->string('key'); // e.g., hero_title, hero_subtitle, about_title
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, textarea, image, video, color, wysiwyg
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Composite unique key
            $table->unique(['page', 'section_name', 'key']);
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
