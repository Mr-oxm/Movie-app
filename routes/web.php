<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Signout;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\MovieContoller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Authentication;
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
Route::middleware([Authentication::class])->group(function () {

    Route::name('login.')->group(function () {
        Route::post('/login', [LoginController::class,'authenticate'])->name('auth');
        Route::get('/', [LoginController::class,'view'])->name('view');
    });
    
    Route::name('signup.')->group(function () {
        Route::post('/signup', [SignupController::class,'register'])->name('register');
        Route::get('/signup', [SignupController::class,'view'])->name('view');
    });

    Route::get('/signout', [Signout::class,'signout'])->name('signout');
    
    Route::name('movies.')->group(function () {
        Route::get('/movies/create', [MovieContoller::class,'create'])->name('create');
        Route::post('/movies/create', [MovieContoller::class,'create_movie'])->name('create_movie');
        Route::get('/movies', [MovieContoller::class,'index'])->name('view');
        Route::get('/movies/edit/{id}', [MovieContoller::class,'retriveMovie'])->name('view_movie');
        Route::get('/movies/delete/{id}', [MovieContoller::class,'delete'])->name('delete');
        Route::post('/movies/edit/{id}', [MovieContoller::class,'edit_movie'])->name('edit_movie');
    });

});




