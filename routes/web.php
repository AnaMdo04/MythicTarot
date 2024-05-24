<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;

Route::get('/', [LoginRegisterController::class, 'index'])->name('welcome');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/tienda', 'tienda')->name('tienda');
    Route::get('/tarot', 'tarot')->name('tarot');
    Route::get('/terms', 'terms')->name('terms');    
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/cookies', 'cookies')->name('cookies');
    Route::get('/aboutUs', 'aboutUs')->name('aboutUs');
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/comentarios', [LoginRegisterController::class, 'allComments'])->name('comentarios');
    Route::get('/todos-los-comentarios', 'comentarios')->name('todos-los-comentarios');

});
