<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeddingInvitationController;
use App\Http\Controllers\InvitationPageController;
use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Redirect regular users to their wedding invitation dashboard
    if (Auth::user()->isUser()) {
        return redirect()->route('invitation.dashboard');
    }
    // Show admin dashboard for admins
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User Management Routes (Admin only)
    Route::resource('users', UserController::class);
    Route::get('/api/users', [UserController::class, 'getData'])->name('users.data');

    // Wedding Invitation Dashboard Routes
    Route::get('/my-invitation', [WeddingInvitationController::class, 'dashboard'])->name('invitation.dashboard');
    Route::put('/my-invitation', [WeddingInvitationController::class, 'update'])->name('invitation.update');
    Route::post('/my-invitation/upload-hero', [WeddingInvitationController::class, 'uploadHeroImage'])->name('invitation.upload.hero');
    Route::post('/my-invitation/upload-couple', [WeddingInvitationController::class, 'uploadCoupleImage'])->name('invitation.upload.couple');
    Route::post('/my-invitation/upload-gallery', [WeddingInvitationController::class, 'uploadGalleryImages'])->name('invitation.upload.gallery');
    Route::delete('/my-invitation/delete-gallery', [WeddingInvitationController::class, 'deleteGalleryImage'])->name('invitation.delete.gallery');
    Route::get('/my-invitation/preview', [InvitationPageController::class, 'preview'])->name('invitation.preview');
    
    // Guestbook Routes (authenticated users)
    Route::get('/my-invitation/guestbook', [GuestbookController::class, 'index'])->name('guestbook.index');
    Route::delete('/guestbook/{id}', [GuestbookController::class, 'destroy'])->name('guestbook.destroy');
});

// Public Wedding Invitation Page Routes
Route::get('/invitation/{slug}', [InvitationPageController::class, 'show'])->name('invitation.show');

// Public Guestbook Form Submission
Route::post('/invitation/{slug}/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store');

// QR Code Routes
Route::get('/guestbook/{id}/download-qr', [GuestbookController::class, 'downloadQr'])->name('guestbook.download-qr');
Route::get('/attendance/{id}', [GuestbookController::class, 'attendance'])->name('guestbook.attendance');

// Check-in Route (authenticated only)
Route::post('/guestbook/{id}/check-in', [GuestbookController::class, 'checkIn'])->middleware('auth')->name('guestbook.checkin');

// Test QR Routes (remove in production)
Route::get('/test-qr', [App\Http\Controllers\TestQrController::class, 'showQr'])->name('test.qr.show');
Route::get('/test-qr/download', [App\Http\Controllers\TestQrController::class, 'testQr'])->name('test.qr.download');

require __DIR__.'/auth.php';
