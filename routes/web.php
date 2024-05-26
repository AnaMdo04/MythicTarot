<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\CartaController;

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
    Route::get('/comentarios', 'allComments')->name('comentarios');
    Route::get('/todos-los-comentarios', 'comentarios')->name('todos-los-comentarios');
    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil/foto', [ProfileController::class, 'deleteProfileImage'])->name('perfil.deleteProfileImage');
    Route::get('/ajustes', [ProfileController::class, 'edit'])->name('ajustes');

    Route::get('/lecturas', [LecturaController::class, 'index'])->name('lecturas');
    Route::get('/lectura/{id}', [LecturaController::class, 'show'])->name('lectura.show');
    Route::put('/lectura/{id}', [LecturaController::class, 'update'])->name('lectura.update');
    Route::delete('/lectura/{id}', [LecturaController::class, 'destroy'])->name('lectura.destroy');

    Route::get('/cartas', [CartaController::class, 'index'])->name('cartas');
    Route::get('/carta/{id}/edit', [CartaController::class, 'edit'])->name('carta.edit');
    Route::put('/carta/{id}', [CartaController::class, 'update'])->name('carta.update');
    Route::delete('/carta/{id}', [CartaController::class, 'destroy'])->name('carta.destroy');
});
