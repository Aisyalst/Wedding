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
        Schema::create('wedding_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Couple Information
            $table->string('bride_name')->nullable();
            $table->string('groom_name')->nullable();
            $table->string('couple_nickname')->nullable(); // e.g., "John & Jane"
            
            // Wedding Details
            $table->date('wedding_date')->nullable();
            $table->time('ceremony_time')->nullable();
            $table->time('reception_time')->nullable();
            
            // Venue Information
            $table->string('venue_name')->nullable();
            $table->text('venue_address')->nullable();
            $table->string('venue_city')->nullable();
            $table->string('venue_state')->nullable();
            $table->string('venue_zipcode')->nullable();
            $table->decimal('venue_latitude', 10, 8)->nullable();
            $table->decimal('venue_longitude', 11, 8)->nullable();
            
            // Content Sections
            $table->text('welcome_message')->nullable();
            $table->text('love_story')->nullable();
            $table->text('special_message')->nullable();
            
            // Images
            $table->string('hero_image')->nullable(); // Main banner image
            $table->string('couple_image')->nullable(); // Couple photo
            $table->json('gallery_images')->nullable(); // Array of gallery images
            
            // Design & Template
            $table->string('template_style')->default('classic'); // classic, modern, elegant, rustic
            $table->string('color_scheme')->default('default'); // default, pink, blue, gold, etc.
            $table->string('font_style')->default('default');
            
            // RSVP & Guest Management
            $table->boolean('enable_rsvp')->default(false);
            $table->text('rsvp_message')->nullable();
            
            // Settings
            $table->boolean('is_published')->default(false);
            $table->string('slug')->unique()->nullable(); // URL-friendly identifier
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_invitations');
    }
};
