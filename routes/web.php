<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoIngredienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::post('/carrito/agregar', [WelcomeController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::post('/carrito/actualizar', [WelcomeController::class, 'actualizarCantidad'])->name('carrito.actualizar');
Route::post('/carrito/eliminar', [WelcomeController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [WelcomeController::class, 'vaciarCarrito'])->name('carrito.vaciar');
Route::post('/carrito/checkout', [WelcomeController::class, 'procesarCompra'])->name('carrito.checkout');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Route::resource('categorias', CategoriaController::class);
Route::resource('ventas', VentaController::class);
Route::resource('detalle_ventas', DetalleVentaController::class);
Route::resource('productos', ProductoController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
