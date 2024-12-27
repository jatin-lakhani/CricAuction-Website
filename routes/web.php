<?php

use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [Homecontroller::class, 'index'])->name('welcome');
