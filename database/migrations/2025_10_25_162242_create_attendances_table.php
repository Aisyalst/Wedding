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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guestbook_id')->constrained('guestbooks')->onDelete('cascade');
            $table->foreignId('wedding_invitation_id')->constrained('wedding_invitations')->onDelete('cascade');
            $table->timestamp('checked_in_at');
            $table->foreignId('checked_in_by')->nullable()->constrained('users')->onDelete('set null'); // User who scanned the QR
            $table->string('device_info')->nullable(); // Device used for check-in
            $table->ipAddress('ip_address')->nullable(); // IP address of check-in
            $table->text('notes')->nullable(); // Any notes about the check-in
            $table->timestamps();
            
            // Indexes
            $table->index('guestbook_id');
            $table->index('wedding_invitation_id');
            $table->index('checked_in_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
