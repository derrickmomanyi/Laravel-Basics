<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [PagesController@index]);
// Route::get('/', [PagesController::class,'index']);
Route::resource('/', PagesController::class);
Route::get('/about', [PagesController::class,'about']);
Route::get('/services', [PagesController::class,'services']);
Route::resource('/posts', PostsController::class);


// Route::get('/about', function () {
//     return view('pages.about');
// });


// Route::get('/users/{$id}', function ($id) {
//     return 'This is user'.$id;
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
