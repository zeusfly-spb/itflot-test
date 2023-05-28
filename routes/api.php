<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/details', [UserController::class, 'details']);
    Route::prefix('advert')->group( function() {
        Route::post('/', [AdvertisementController::class, 'index']);
        Route::post('/add', [AdvertisementController::class, 'create']);
        Route::get('/show/{slug}', [AdvertisementController::class, 'show']);
    });
    Route::prefix('images')->group( function() {
        Route::post('/add', [ImageController::class, 'store']);
    });
});