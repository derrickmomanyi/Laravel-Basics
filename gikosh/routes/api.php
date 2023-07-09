<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();    
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductsController::class, 'index']);
    Route::get('/products/{id}', [ProductsController::class, 'show']);
    Route::delete('/products/{id}', [ProductsController::class, 'destroy']);
    Route::get('/products/{id}', [ProductsController::class, 'show']);
    // Route::post('/logout', [UsersController::class, 'logout']);
  
});
// Route::resource('/products', ProductsController::class);
// Route::resource('/users', UsersController::class);
Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'register']);
Route::get('/products', [ProductsController::class, 'index']);
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth:sanctum');

