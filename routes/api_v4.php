<?php

use App\Http\Controllers\Api\V4\AuctionController;
use App\Http\Controllers\Api\V4\AuthController;
use App\Http\Controllers\Api\V4\BankDetailController;
use App\Http\Controllers\Api\V4\PlayerController;
use App\Http\Controllers\Api\V4\PricingController;
use App\Http\Controllers\Api\V4\PricingMasterController;
use App\Http\Controllers\Api\V4\SponsorController;
use App\Http\Controllers\Api\V4\TeamController;
use App\Http\Controllers\Api\V4\TestmonialController;
use App\Http\Controllers\Api\V4\UserController;
use App\Http\Controllers\Api\V4\FaqController;
use App\Http\Controllers\Api\V4\BlogController;
use App\Http\Controllers\Api\V4\VideoGallery;
use App\Http\Controllers\Api\V4\Testmonial;

use App\Http\Controllers\Api\V4\VideoGalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v4')->name('V4.')->group(function () {
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
        Route::post('resetAuction', [AuctionController::class, 'resetAuction']);
        Route::post('resetAuctionUnsoldPlayers', [AuctionController::class, 'resetAuctionUnsoldPlayers']);
        Route::resource('team', TeamController::class);
        Route::resource('player', PlayerController::class);
        Route::post('playerBulkStore', [PlayerController::class, 'playerBulkStore']);
        Route::post('playerBulkDelete', [PlayerController::class, 'playerBulkDelete']);
        Route::post('soldPlayer', [PlayerController::class, 'soldPlayer']);
        Route::post('makePlayerAvailable', [PlayerController::class, 'makePlayerAvailable']);
        Route::resource('pricing', PricingController::class);

        Route::get('users', [UserController::class, 'getUserList']);
        Route::get('migrateUserDate', [UserController::class, 'migrateUserDate']);

        Route::resource('pricingMaster', PricingMasterController::class);
        Route::resource('bankDetail', BankDetailController::class);
        Route::resource('sponsor', SponsorController::class);

        Route::resource('faq', FaqController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('videogallery', VideoGalleryController::class);
        Route::resource('testimonial', TestmonialController::class);

    });
});