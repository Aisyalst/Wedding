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
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_invitation_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('visitor_number')->default(1);
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->enum('attendance', ['yes', 'no', 'maybe'])->default('yes');
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guestbooks');
    }
};
