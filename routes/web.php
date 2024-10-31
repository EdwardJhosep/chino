<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VentaServicioController;
use App\Http\Controllers\VentaProductoController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    

//productos
    Route::get('/admin/productos', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/productos/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::get('/admin/productos/venta', [VentaController::class, 'ventaproduct'])->name('admin.products.venta');
    Route::post('/admin/productos', [ProductController::class,'store'])->name('admin.products.store');
    Route::delete('/{producto}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::put('/admin/productos/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    

//servicios
    Route::get('/admin/servicios', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/servicios/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::get('/admin/servicios/venta', [VentaController::class, 'ventaservice'])->name('admin.services.venta');
    Route::post('/admin/servicios', [ServiceController::class,'store'])->name('admin.services.store');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.products.destroy');
    Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy'); // Eliminar servicio

    Route::put('/admin/servicios/{id}', [ServiceController::class, 'update'])->name('admin.services.update');


Route::post('/admin/servicios/venta/store', [VentaServicioController::class, 'store'])->name('admin.ventas.servicios.store');
Route::post('/admin/servicios/venta', [VentaProductoController::class, 'store'])->name('admin.ventas.productos.store');


});



