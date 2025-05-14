<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [Homecontroller::class, 'index'])->name('welcome');
Route::get('/', [AuctionController::class, 'showAuctions'])->name('welcome');

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/test', [Homecontroller::class, 'test'])->name('test');

Route::get('/privacy', [Homecontroller::class, 'privacy'])->name('privacy');
Route::get('/terms', [Homecontroller::class, 'terms'])->name('terms');
Route::get('/cancel', [Homecontroller::class, 'cancel'])->name('cancel');
Route::get('/shipping', [Homecontroller::class, 'shipping'])->name('shipping');


Route::get('/today-auction', [Homecontroller::class,'auctionlist_today'])->name('auctionlist.today');
Route::get('/upcoming-auction', [Homecontroller::class,'auctionlist_upcoming'])->name('auctionlist.upcoming');

Route::get('/video-gallery', [Homecontroller::class,'video_gallery'])->name('video_gallery');
Route::get('/blogs', [Homecontroller::class,'blogs'])->name('blogs');
Route::get('/blog-read/{id}', [Homecontroller::class,'blog_read'])->name('blog_read');

Route::get('/faq', [Homecontroller::class,'faqPage'])->name('faq');
