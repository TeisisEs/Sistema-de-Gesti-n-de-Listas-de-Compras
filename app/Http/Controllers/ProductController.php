<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;  
use App\Models\Product;  

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $products = Product::orderBy('name')->get();
    return view('product.index', compact('products'));
    }

    // Guardar un nuevo producto
    public function store(Request $request)
    {
        // Validamos los datos que vienen del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Creamos el producto
        Product::create($request->only('name', 'description', 'price'));

        // Redirigimos con mensaje de éxito
        return redirect()->back()->with('success', 'Producto creado correctamente.');
    }
}
