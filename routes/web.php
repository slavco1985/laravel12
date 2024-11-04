<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Business\ClaimController;


Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('/all-cities', 'view_all_cities')->name('all-cities');
    Route::get('/all-categories', 'view_all_categories')->name('all-categories');
    Route::get('/all-listings', 'view_all_listings')->name('all-listings');
    Route::get('/view/{url}', 'view_single_business')->name('view');
    Route::get('/cat/{url}', 'filter_by_category')->name('cat');
    Route::post('set-location', 'set_location')->name('set-location');
    Route::post('search_listings', 'search_listings')->name('search_listings');
    Route::post('search_with_cat_loc', 'search_with_cat_loc')->name('search_with_cat_loc');
    Route::get('filter-by-city/{url}', 'filter_by_city')->name('filter-by-city');
    Route::get('view-blogs', 'view_all_blogs')->name('view-blogs');
    Route::get('blog-by-cat/{url}', 'blog_by_cat')->name('blog-by-cat');
    Route::get('single-blogs/{url}', 'single_blog')->name('single-blogs');
    Route::post('submit-news-letter', 'submitNewsLetter')->name('submit-news-letter');
    Route::get('subscribe-success', 'subscribeSuccess')->name('subscribe-success');
    Route::get('page/{url}', 'view_page')->name('page');
});

// Load More from Detail Page
Route::get('getMoreServices/{bid}/{ofset}', [ServiceController::class, 'getMoreServices'])->name('getMoreServices');
Route::get('getMoreProducts/{bid}/{ofset}', [ProductController::class, 'getMoreProducts'])->name('getMoreProducts');
Route::get('getMoreReviews/{bid}/{ofset}', [RatingController::class, 'getMoreReviews'])->name('getMoreReviews');
Route::get('getMoreGallery/{bid}/{ofset}', [GalleryController::class, 'getMoreGallery'])->name('getMoreGallery');

Route::controller(ExportController::class)->group(function () {
    Route::get('business-excel-download', 'businessExcelDownload')->middleware('admin')->name('business-excel-download');
    Route::get('export-user-data', 'exportUserData')->middleware('auth')->name('export-user-data');
});

Route::get('razorpay', [RazorpayController::class, 'index'])->name('razorpay');
Route::post('razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay/payment');

Route::controller(ClaimController::class)->group(function () {
    Route::post('new-claim-request', 'newClaimRequest')->middleware('auth')->name('claim.request');
});



require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
