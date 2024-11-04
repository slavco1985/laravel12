<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TimingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\BusinessDetailController;

Route::controller(UserPagesController::class)->group(function () {
    Route::get('login', 'userLogin')->name('login')->middleware('guest');
    Route::get('registration', 'userRegistration')->name('registration')->middleware('guest');
    Route::get('to-dashboard', 'toDashboard')->name('to-dashboard')->middleware(['auth', 'is_verified']);
    Route::get('user-dashboard', 'dashboard')->name('user-dashboard')->middleware(['auth', 'is_verified']);
    Route::get('my-listing', 'my_listing')->name('my-listing')->middleware(['auth', 'is_verified']);
    Route::get('profile', 'profile')->name('profile')->middleware(['auth', 'is_verified']);
    Route::get('bookmarks', 'bookmarks')->name('bookmarks')->middleware(['auth', 'is_verified']);
    Route::get('reviews', 'reviews')->name('reviews')->middleware(['auth', 'is_verified']);
    Route::get('active-plan', 'active_plan')->name('active-plan')->middleware(['auth', 'is_verified']);
    Route::get('payments', 'payment_history')->name('payments')->middleware(['auth', 'is_verified']);
    Route::get('user-settings', 'user_settings')->name('user-settings')->middleware(['auth', 'is_verified']);
    Route::get('user-messages', 'user_messages')->name('user-messages')->middleware(['auth', 'is_verified']);
    Route::get('new-listing', 'new_listing')->name('new-listing')->middleware(['auth', 'is_verified']);
    Route::get('choos-package', 'choos_package')->name('choos-package')->middleware(['auth', 'is_verified']);
    Route::get('user-profile-image', 'userProfileImage')->name('user-profile-image')->middleware(['auth', 'is_verified']);
   
    Route::get('user-import', 'userImport')->name('user-import')->middleware(['auth', 'is_verified']);
    

});


Route::controller(UserController::class)->group(function () {
    Route::post('update-profile', 'updateProfile')->middleware('auth')->name('update-profile');
    Route::post('upload-profile-image', 'uploadProfileImage')->name('upload-profile-image')->middleware(['auth', 'is_verified']);
    Route::post('crop-profile-image', 'cropProfileImage')->name('crop-profile-image')->middleware(['auth', 'is_verified']);
    Route::post('update-bookmark', 'updateBookMark')->name('update-bookmark')->middleware(['auth']);
    Route::delete('remove-bookmark/{id}', 'removeBookmark')->name('remove-bookmark')->middleware(['auth']);
    
});


Route::resource('listing', ListingController::class)->middleware(['auth', 'is_verified']);
Route::controller(ListingController::class)->group(function () {
    Route::get('add-business-logo/{lid}', 'addBusienssLogo')->middleware('auth')->name('add-business-logo');
    Route::put('upload-business-logo/{lid}', 'uploadBusinessLogo')->middleware('auth')->name('upload-business-logo');
    Route::post('crope-business-logo', 'cropBusinessLogo')->middleware('auth')->name('crope-business-logo');
});

Route::resource('busines-detail', BusinessDetailController::class)->middleware(['auth', 'is_verified']);
Route::resource('service', ServiceController::class)->middleware(['auth', 'is_verified']);
Route::resource('product', ProductController::class)->middleware(['auth', 'is_verified']);
Route::resource('gallery', GalleryController::class)->middleware(['auth', 'is_verified']);
Route::resource('timing', TimingController::class)->middleware(['auth', 'is_verified']);
Route::resource('rating', RatingController::class)->middleware(['auth', 'is_verified']);
Route::resource('message', MessageController::class);


Route::put('updaterating/{id}', [RatingController::class, 'updaterating'])->middleware('auth')->name('updaterating');
Route::delete('deleterating/{id}', [RatingController::class, 'deleterating'])->middleware('auth')->name('deleterating');

Route::resource('purchase', PurchaseController::class)->middleware('auth');
Route::controller(PurchaseController::class)->group(function () {
    Route::get('create-transaction', 'createTransaction')->middleware('auth')->name('create-transaction');
    Route::get('process-transaction', 'processTransaction')->middleware('auth')->name('process-transaction');
    Route::get('success-transaction', 'successTransaction')->middleware('auth')->name('success-transaction');
    Route::get('cancel-transaction', 'cancelTransaction')->middleware('auth')->name('cancel-transaction');
    Route::get('payment-success', 'paymentSuccess')->middleware('auth')->name('payment-success');
});