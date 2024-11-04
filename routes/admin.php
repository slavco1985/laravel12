<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\AppSettingsController;
use App\Http\Controllers\Business\ClaimController;
use App\Http\Controllers\PaymentGatewayController;



Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->middleware('admin')->name('admin_check');
    Route::get('admin/dashboard', 'index')->middleware('admin')->name('dashboard');
    Route::get('admin/login', 'login')->middleware(['admin_check', 'guest'])->name('admin/login');
    Route::get('admin/password-settings', 'password_settings')->middleware('admin')->name('password-settings');
    Route::post('change-password', 'change_password')->middleware('admin')->name('change-password');

    Route::post('image-upload', 'image_upload')->middleware('auth')->name('image-upload');
});

Route::controller(SiteInfoController::class)->group(function () {
    Route::post('upload-site-logo', 'upload_site_logo')->middleware('admin')->name('upload-site-logo');
    Route::post('upload-fav-icon', 'upload_fav_icon')->middleware('admin')->name('upload-fav-icon');
    Route::post('update-about', 'update_about')->middleware('admin')->name('update-about');
    Route::post('update-contact-details', 'update_contact_details')->middleware('admin')->name('update-contact-details');
    Route::post('update-social-links', 'update_social_links')->middleware('admin')->name('update-social-links');
   
});

Route::resource('purchase', PurchaseController::class)->middleware('auth');
Route::controller(PurchaseController::class)->group(function () {
    Route::get('create-transaction', 'createTransaction')->middleware('auth')->name('create-transaction');
    Route::get('process-transaction', 'processTransaction')->middleware('auth')->name('process-transaction');
    Route::get('success-transaction', 'successTransaction')->middleware('auth')->name('success-transaction');
    Route::get('cancel-transaction', 'cancelTransaction')->middleware('auth')->name('cancel-transaction');
    Route::get('payment-success', 'paymentSuccess')->middleware('auth')->name('payment-success');

    //PurchaseController Admin Routes
    Route::get('admin/payment-history', 'paymentHistory')->middleware('admin')->name('admin/payment-history');
    Route::get('admin/transaction-history', 'transactionHistory')->middleware('admin')->name('admin/transaction-history');
    
});


Route::controller(UserController::class)->group(function () {
    Route::get('admin/view-users', 'viewUsers')->middleware('admin')->name('admin/view-users');
    Route::delete('remove-user/{id}', 'removeUser')->middleware('auth')->name('remove-user');
    Route::get('admin/view-trashed-users', 'userTrash')->middleware('admin')->name('admin/view-trashed-users');
    Route::delete('restore-user/{id}', 'restoreUser')->middleware('auth')->name('restore-user');
});

Route::resource('listing', ListingController::class)->middleware(['auth', 'is_verified']);
Route::controller(ListingController::class)->group(function () {
    Route::get('admin/view-all-listing', 'viewAllListings')->middleware(['auth', 'admin'])->name('admin/view-all-listing');
    Route::get('admin/view-trash-listing', 'viewTrashListings')->middleware(['auth', 'admin'])->name('admin/view-trash-listing');
    Route::put('update-listing-featured', 'update_listing_featured')->middleware('admin')->name('update-listing-featured');
    Route::delete('restore-listing/{id}', 'restoreListing')->middleware( 'admin')->name('restore-listing');
    Route::get('admin/bulk-import', 'bulkImport')->middleware(['auth', 'admin'])->name('admin/bulk-import');
});

Route::get('admin/viewMessages', [MessageController::class, 'create'])->middleware('admin')->name('admin/viewMessages');

Route::resource('admin/location', LocationController::class)->middleware('admin');
Route::put('update-location-featured', [LocationController::class, 'update_location_featured'])->middleware('admin')->name('update-location-featured');


Route::resource('admin/location', LocationController::class)->middleware('admin');
Route::put('update-location-featured', [LocationController::class, 'update_location_featured'])->middleware('admin')->name('update-location-featured');

Route::resource('admin/category', CategoryController::class)->middleware('admin');
Route::put('update-category-featured', [CategoryController::class, 'update_category_featured'])->middleware('admin')->name('update-category-featured');

Route::resource('admin/package', PackagesController::class)->middleware('admin');
Route::resource('admin/blog', BlogController::class)->middleware('admin');
Route::controller(BlogController::class)->group(function () {
    Route::get('admin/blog-image/{lid}', 'blogImage')->middleware('admin')->name('admin/blog-image');
    Route::get('admin/blog-detail/{lid}', 'blogDetail')->middleware('admin')->name('admin/blog-detail');
    Route::post('crope-blog-image', 'cropBlogImage')->middleware('admin')->name('crope-blog-image');
    Route::post('update-blog-detail', 'updateBlogDetail')->middleware('admin')->name('update-blog-detail');
});

Route::controller(ImportController::class)->group(function () {
    Route::post('upload-bulk-business', 'uploadBulkBusiness')->middleware('auth')->name('upload-bulk-business');
    Route::post('upload-bulk-images', 'uploadBulkImages')->middleware('auth')->name('upload-bulk-images');

    Route::post('upload-bulk-products', 'uploadBulkProducts')->middleware('auth')->name('upload-bulk-products');
    Route::post('upload-bulk-services', 'uploadBulkServices')->middleware('auth')->name('upload-bulk-services');

    Route::post('bulk-products-image', 'bulkProductImage')->middleware('auth')->name('bulk-products-image');
    Route::post('bulk-services-image', 'bulkServiceImage')->middleware('auth')->name('bulk-services-image');
});
Route::controller(ExportController::class)->group(function () {
    Route::get('business-excel-download', 'businessExcelDownload')->middleware('admin')->name('business-excel-download');
    Route::get('export-user-data', 'exportUserData')->middleware('auth')->name('export-user-data');
});

//Subscriber Routes
Route::resource('admin/subscriber', SubscriberController::class)->middleware('admin');
Route::resource('admin/pages', PageController::class)->middleware('admin');

Route::resource('admin/app-settings', AppSettingsController::class)->middleware('admin');
Route::resource('admin/siteinfo', SiteInfoController::class)->middleware('admin');
Route::resource('admin/payment-gateway', PaymentGatewayController::class)->middleware('admin');


Route::get('seed/{table}', [CommonController::class, 'seed']);

Route::get('razorpay', [RazorpayController::class, 'index'])->name('razorpay');
Route::post('razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay/payment');


Route::controller(PurchaseController::class)->group(function () {
     //PurchaseController Admin Routes
     Route::get('admin/payment-history', 'paymentHistory')->middleware('admin')->name('admin/payment-history');
     Route::get('admin/transaction-history', 'transactionHistory')->middleware('admin')->name('admin/transaction-history');
});

Route::controller(ClaimController::class)->group(function () {
    Route::get('admin/view-claim-request', 'viewClaimRequest')->middleware('admin')->name('claim.view');
    Route::post('take-claim-action', 'climeAction')->middleware('auth')->name('clime.action');

});