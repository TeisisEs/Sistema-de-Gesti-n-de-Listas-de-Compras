<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;
use App\Models\Product;

class ShoppingListController extends Controller
{
    //Mostrar todas las listas
    public function index()
    {
        $lists = ShoppingList::orderBy('due_date', 'desc')->get();
    return view('list.index', compact('lists'));
    }

    // Mostrar formulario de creación
    public function create()
    {
    return view('list.create');
    }

    // Guardar nueva lista
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        ShoppingList::create($request->only('title', 'notes', 'due_date'));

        return redirect()->route('lists.index')->with('success', 'Lista creada correctamente.');
    }

    // Mostrar una lista específica
    public function show(ShoppingList $list)
    {
        // Cargar los productos asociados con sus cantidades
        $list->load('products');
        $allProducts = Product::orderBy('name')->get();

    return view('list.show', compact('list', 'allProducts'));
    }

    // Agregar un producto a una lista
    public function addProduct(Request $request, ShoppingList $list)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Si el producto ya está en la lista, sumamos cantidad
        if ($list->products()->where('product_id', $productId)->exists()) {
            $currentQuantity = $list->products()->where('product_id', $productId)->first()->pivot->quantity;
            $list->products()->updateExistingPivot($productId, [
                'quantity' => $currentQuantity + $quantity,
            ]);
        } else {
            // Si no, lo agregamos
            $list->products()->attach($productId, ['quantity' => $quantity]);
        }

        return redirect()->route('lists.show', $list)->with('success', 'Producto agregado a la lista.');
    }
}
