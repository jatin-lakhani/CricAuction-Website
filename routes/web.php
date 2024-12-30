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
