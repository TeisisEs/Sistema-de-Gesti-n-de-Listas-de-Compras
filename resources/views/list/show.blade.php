@extends('layouts.app')
@section('content')
  <div class="mb-4">
    <h2 class="text-xl font-bold">{{ $list->title }}</h2>
    <p class="text-gray-600">Fecha: {{ $list->due_date ? \Carbon\Carbon::parse($list->due_date)->format('d/m/Y') : 'Sin fecha' }}</p>
    @if($list->notes)
      <p class="text-sm mt-2"><strong>Notas:</strong> {{ $list->notes }}</p>
    @endif
  </div>

  <div class="mb-6">
    <h3 class="font-semibold text-lg mb-3">Productos en la lista</h3>
    
    @if($list->products->isEmpty())
      <div class="bg-yellow-100 p-3 rounded text-center">
        No hay productos en esta lista. Agrega algunos abajo.
      </div>
    @else
      <table class="w-full border-collapse">
        <thead class="bg-gray-200">
          <tr>
            <th class="border p-2 text-left">Producto</th>
            <th class="border p-2 text-right">Precio</th>
            <th class="border p-2 text-center">Cantidad</th>
            <th class="border p-2 text-right">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @php $total = 0; @endphp
          @foreach($list->products as $p)
            @php $sub = $p->price * $p->pivot->quantity; $total += $sub; @endphp
            <tr class="border-t hover:bg-gray-50">
              <td class="border p-2">{{ $p->name }}</td>
              <td class="border p-2 text-right">${{ number_format($p->price, 2) }}</td>
              <td class="border p-2 text-center">{{ $p->pivot->quantity }}</td>
              <td class="border p-2 text-right">${{ number_format($sub, 2) }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot class="bg-gray-100">
          <tr>
            <td colspan="3" class="border p-2 text-right font-bold">TOTAL:</td>
            <td class="border p-2 text-right font-bold">${{ number_format($total, 2) }}</td>
          </tr>
        </tfoot>
      </table>
    @endif
  </div>

  <div class="bg-blue-50 p-4 rounded mb-4">
    <h3 class="font-semibold mb-3">Agregar producto a la lista</h3>
    
    @if($allProducts->isEmpty())
      <div class="bg-red-100 p-3 rounded">
        No hay productos disponibles. 
        <a href="{{ route('products.index') }}" class="text-blue-600 underline">Crear productos primero</a>
      </div>
    @else
      <form action="{{ route('lists.addProduct', $list) }}" method="POST" class="flex flex-wrap gap-3 items-end">
        @csrf
        <div class="flex-1 min-w-[200px]">
          <label class="block text-sm mb-1">Producto</label>
          <select name="product_id" class="border p-2 w-full rounded" required>
            <option value="">Selecciona un producto</option>
            @foreach($allProducts as $prod)
              <option value="{{ $prod->id }}">{{ $prod->name }} - ${{ number_format($prod->price, 2) }}</option>
            @endforeach
          </select>
          @error('product_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label class="block text-sm mb-1">Cantidad</label>
          <input type="number" name="quantity" min="1" value="1" class="border p-2 w-24 rounded" required>
          @error('quantity')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Agregar</button>
        </div>
      </form>
    @endif
  </div>

  <div class="flex gap-2">
    <a href="{{ route('lists.index') }}" class="text-blue-600 hover:underline">← Volver a listas</a>
    <a href="{{ route('products.index') }}" class="text-purple-600 hover:underline">Ver todos los productos</a>
  </div>
@endsection