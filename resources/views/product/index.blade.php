@extends('layouts.app')
@section('content')
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl">Gestión de Productos</h2>
    <a href="{{ route('lists.index') }}" class="px-3 py-1 bg-gray-500 text-white rounded">Ver Listas</a>
  </div>

  <div class="bg-green-50 p-4 rounded mb-6">
    <h3 class="font-semibold mb-3">Crear Nuevo Producto</h3>
    <form action="{{ route('products.store') }}" method="POST" class="space-y-3">
      @csrf
      <div>
        <label class="block text-sm mb-1">Nombre del Producto</label>
        <input name="name" class="border p-2 w-full rounded" value="{{ old('name') }}" required>
        @error('name')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label class="block text-sm mb-1">Descripción (opcional)</label>
        <textarea name="description" class="border p-2 w-full rounded" rows="2">{{ old('description') }}</textarea>
        @error('description')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label class="block text-sm mb-1">Precio</label>
        <input type="number" step="0.01" name="price" class="border p-2 w-full rounded" value="{{ old('price') }}" required>
        @error('price')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Crear Producto</button>
    </form>
  </div>

  <div>
    <h3 class="font-semibold mb-3">Lista de Productos</h3>
    @if($products->isEmpty())
      <div class="text-center py-8 text-gray-500">
        <p>No hay productos registrados.</p>
      </div>
    @else
      <table class="w-full border-collapse">
        <thead class="bg-gray-200">
          <tr>
            <th class="border p-2 text-left">Nombre</th>
            <th class="border p-2 text-left">Descripción</th>
            <th class="border p-2 text-right">Precio</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $p)
            <tr class="border-t hover:bg-gray-50">
              <td class="border p-2 font-medium">{{ $p->name }}</td>
              <td class="border p-2 text-gray-600">{{ $p->description ?? 'Sin descripción' }}</td>
              <td class="border p-2 text-right">${{ number_format($p->price, 2) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection