<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\TarotController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginRegisterController::class, 'index'])->name('welcome');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
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
    Route::get('/tarot', [TarotController::class, 'index'])->name('tarot');
    Route::match(['get', 'post'], '/tarot/preguntar', [TarotController::class, 'preguntar'])->name('tarot.preguntar');
    Route::post('/tarot/realizar-tirada', [TarotController::class, 'realizarTirada'])->name('tarot.realizar_tirada');
    Route::post('/tarot/guardar-comentario/{lectura_id}', [TarotController::class, 'guardarComentario'])->name('tarot.guardarComentario');
    Route::put('/lectura/updateComentario/{comentario_id}', [TarotController::class, 'updateComentario'])->name('tarot.updateComentario');
    Route::get('/tarot/resultado/{id}', [TarotController::class, 'resultado'])->name('tarot.resultado');
    Route::get('/tarot/cartas', [TarotController::class, 'cartas'])->name('tarot.cartas');

    Route::post('/compra/entregar/{id}', [CompraController::class, 'entregar'])->name('compra.entregar');
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil', [LoginRegisterController::class, 'updateProfile'])->name('perfil.update');
    Route::delete('/perfil/foto', [LoginRegisterController::class, 'deleteProfileImage'])->name('perfil.deleteProfileImage');
    Route::get('/ajustes', [ProfileController::class, 'edit'])->name('ajustes');

    Route::get('/lecturas', [LecturaController::class, 'index'])->name('lecturas');
    Route::get('/lectura/{id}', [LecturaController::class, 'show'])->name('lectura.show');
    Route::put('/lectura/{id}', [LecturaController::class, 'update'])->name('lectura.update');
    Route::delete('/lectura/{id}', [LecturaController::class, 'destroy'])->name('lectura.destroy');

    Route::get('/cartas', [CartaController::class, 'index'])->name('cartas');
    Route::get('/carta/{id}/edit', [CartaController::class, 'edit'])->name('carta.edit');
    Route::put('/carta/{id}', [CartaController::class, 'update'])->name('carta.update');
    Route::delete('/carta/{id}', [CartaController::class, 'destroy'])->name('carta.destroy');

    Route::post('/cart/add/{id}', [CartController::class, 'addItem'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::get('/checkout', [CompraController::class, 'checkout'])->name('checkout');
    Route::post('/process-payment', [CompraController::class, 'processPayment'])->name('processPayment');
    Route::get('/payment-callback', [CompraController::class, 'paymentCallback'])->name('payment.callback');
    Route::get('/mis-disenios', [UserController::class, 'misDisenios'])->name('mis-disenios');
    Route::post('/comentario/store/{id}', [CompraController::class, 'storeComentario'])->name('comentario.store');
});

Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/tienda/{id}', [TiendaController::class, 'show'])->name('tienda.show');

Route::get('/payment-success', function () {
    return view('success');
})->name('payment.success');
