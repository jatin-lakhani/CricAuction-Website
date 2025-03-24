<?php

use App\Http\Controllers\Api\AuctionController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\PricingController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('log.api.requests')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::POST('logout', [AuthController::class, 'logout']);
        Route::POST('deleteAccount', [AuthController::class, 'deleteAccount']);
        Route::GET('profile', [UserController::class, 'get_profile']);
        Route::POST('profile', [UserController::class, 'update_profile']);
    });
    
    // Auction APIs 
    Route::GET('getAuctions', [AuctionController::class, 'getAuctions']);
    Route::resource('auction', AuctionController::class);
    Route::resource('team', TeamController::class);
    Route::resource('player', PlayerController::class);
    Route::post('playerBulkStore', [PlayerController::class, 'playerBulkStore']);
    Route::resource('pricing', PricingController::class);

    Route::get('migrateUserDate', [UserController::class, 'migrateUserDate']);
});

require base_path('routes/api_v2.php');
require base_path('routes/api_v3.php');
require base_path('routes/api_v4.php');