<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
}) ->name('home');

Route::get('/home', function () {
    return view('home');
});

//Route::middleware(['auth'])->group(function () {
    Route::get('/product', [CustomAuthController::class, 'profileNproduct']) ->name('product');

    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}', [ProductController::class, 'index'])->name('product.show');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/edit-profile', [CustomAuthController::class, 'edit'])->name('edit-profile');
    Route::post('/edit-profile', [CustomAuthController::class, 'updateEdit'])->name('updateEdit');


    Route::post('/delete-profile', [CustomAuthController::class, 'destroy'])->name('deleteProfile');
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
//});
Route::get('/login', [CustomAuthController::class, 'login'])->name('login'); //when accessed from browser -->get
Route::post('/login', [CustomAuthController::class, 'authenticate']) ->name('loginUser'); //when actually tried to login with input  -->post

Route::get('/signup', [CustomAuthController::class, 'signup'])->name('signup');
Route::post('/signup', [CustomAuthController::class, 'registerUser'])->name('registerUser');


