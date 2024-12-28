<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Homecontroller::class, 'index'])->name('welcome');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');
