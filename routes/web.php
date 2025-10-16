<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ProductController;

// Redirige la raíz al listado de listas
Route::get('/', function () {
    return redirect()->route('lists.index');
});

// Rutas para listas de compras
Route::resource('lists', ShoppingListController::class)->only([
    'index', 'create', 'store', 'show'
]);

// Ruta para agregar producto a una lista específica
Route::post('lists/{list}/add-product', [ShoppingListController::class, 'addProduct'])
    ->name('lists.addProduct');

// Rutas para productos
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::post('products', [ProductController::class, 'store'])->name('products.store');