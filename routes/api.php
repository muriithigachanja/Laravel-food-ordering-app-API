<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'users', 'middleware' => 'CORS'], function ($router) {
    Route::post('/register', [APIController::class, 'register'])->name('register.user');
    Route::post('/login', [APIController::class, 'login'])->name('login.user');
    Route::get('/view-profile', [APIController::class, 'viewProfile'])->name('profile.user');
    Route::get('/logout', [APIController::class, 'logout'])->name('logout.user');
    Route::post('/addtocart', [APIController::class, 'addtocart']);
    Route::get('/restaurants', [APIController::class, 'restaurants']); 
    Route::get('/restaurant/{id}', [APIController::class, 'restaurantsbyid']); 
    Route::get('/categories', [APIController::class, 'categories']); 
    Route::get('/category/{id}', [APIController::class, 'categorybyid']); 
    Route::get('/locations', [APIController::class, 'locations']); 
    Route::get('/sizes/{id}', [APIController::class, 'sizes']); 
    Route::get('/flavours/{id}', [APIController::class, 'flavours']); 
    Route::post('/cart', [APIController::class, 'cart']);
    Route::post('/deletecart', [APIController::class, 'deletecart']);
    Route::post('/updatecart', [APIController::class, 'updatecart']);
    Route::post('/confirmorder', [APIController::class, 'confirmorder']);
    Route::post('/partner', [APIController::class, 'partner']);
});
