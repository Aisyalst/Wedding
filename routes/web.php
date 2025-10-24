<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeddingInvitationController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/my-invitation/preview', [WeddingInvitationController::class, 'preview'])->name('invitation.preview');
});

// Public Wedding Invitation Routes
Route::get('/invitation/{slug}', [WeddingInvitationController::class, 'show'])->name('invitation.show');

require __DIR__.'/auth.php';
