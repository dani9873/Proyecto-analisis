<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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

<<<<<<< HEAD
=======
//RUTAS ANDY
Route::resource('/products',Productscontroller::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






//RUTAS LOGIN

>>>>>>> 18247f2 (CAMBIOS ÚLTIMOS PARTE 1)
Route::get('/privada', function () {
    return view('privada');
})->middleware(['auth', 'verified'])->name('privada');

Route::get('/', function () {
    return redirect()->route('products.index');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('/client', ClientController::class);
    Route::view('/privada', 'secret')->name('privada');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/login', 'auth.login')->name('login');
Route::view('/registro', 'register')->name('registro');
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');

require __DIR__.'/auth.php';
