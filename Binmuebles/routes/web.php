<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealStateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Productscontroller;
use App\Http\Controllers\Products2controller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your appSSSlication. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//RUTAS ANDY
Route::resource('/products',Productscontroller::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});  


//Dani controller
Route::resource('/binmueble', RealStateController::class);


//RUTAS DANI Y BRIAN
Route::resource('vista_terre/ter',Products2controller::class); 
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/citas', function () {
    return view('citas');
})->name('citas');

Route::get('/acercanosotros', function () {
    return view('acercanosotros');
})->name('acercanosotros');


//RUTAS LOGIN
Route::get('/privada', function () {
    return view('privada');
})->middleware(['auth', 'verified'])->name('privada');
Route::get('/', function () {
    return redirect()->route('products.index');
});
Route::middleware(['auth'])->group(function () {
    Route::view('/privada', 'secret')->name('privada');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/products', [Productscontroller::class, 'index'])->name('products.index');

Route::view('/login', 'auth.login')->name('login');
Route::view('/registro', 'register')->name('registro');
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');

require __DIR__.'/auth.php';
