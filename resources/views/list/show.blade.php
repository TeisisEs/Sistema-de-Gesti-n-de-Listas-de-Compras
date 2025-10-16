@extends('layouts.app')
@section('content')

  <!-- Breadcrumb -->
  <nav class="flex mb-6 text-sm">
    <a href="{{ route('lists.index') }}" class="text-purple-600 hover:text-purple-800">← Volver a Listas</a>
  </nav>

  <!-- Información de la Lista -->
  <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
      <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $list->title }}</h2>
        <div class="flex flex-wrap gap-4 text-sm text-gray-600">
          <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>{{ $list->due_date ? \Carbon\Carbon::parse($list->due_date)->format('d/m/Y') : 'Sin fecha' }}</span>
          </div>
          <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span>{{ $list->products->count() }} productos</span>
          </div>
        </div>
        @if($list->notes)
          <p class="text-gray-600 mt-3 bg-gray-50 p-3 rounded-lg">
            <strong class="text-gray-800">Notas:</strong> {{ $list->notes }}
          </p>
        @endif
      </div>
    </div>
  </div>

  <!-- Productos en la Lista -->
  <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
      <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
      </svg>
      Productos en la Lista
    </h3>
    
    @if($list->products->isEmpty())
      <div class="text-center py-12 bg-yellow-50 rounded-lg border-2 border-dashed border-yellow-300">
        <svg class="w-16 h-16 mx-auto text-yellow-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
        </svg>
        <p class="text-gray-600 font-medium">No hay productos en esta lista todavía</p>
        <p class="text-sm text-gray-500 mt-1">Agrega productos usando el formulario de abajo</p>
      </div>
    @else
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="border-b-2 border-gray-200">
              <th class="text-left py-4 px-4 font-semibold text-gray-700">Producto</th>
              <th class="text-right py-4 px-4 font-semibold text-gray-700">Precio Unit.</th>
              <th class="text-center py-4 px-4 font-semibold text-gray-700">Cantidad</th>
              <th class="text-right py-4 px-4 font-semibold text-gray-700">Subtotal</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @php $total = 0; @endphp
            @foreach($list->products as $p)
              @php $sub = $p->price * $p->pivot->quantity; $total += $sub; @endphp
              <tr class="hover:bg-gray-50 transition">
                <td class="py-4 px-4">
                  <div class="font-medium text-gray-800">{{ $p->name }}</div>
                  @if($p->description)
                    <div class="text-sm text-gray-500">{{ $p->description }}</div>
                  @endif
                </td>
                <td class="py-4 px-4 text-right text-gray-700">${{ number_format($p->price, 2) }}</td>
                <td class="py-4 px-4 text-center">
                  <span class="inline-flex items-center justify-center px-3 py-1 bg-purple-100 text-purple-800 rounded-full font-medium">
                    {{ $p->pivot->quantity }}
                  </span>
                </td>
                <td class="py-4 px-4 text-right font-semibold text-gray-800">${{ number_format($sub, 2) }}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr class="bg-gradient-to-r from-purple-50 to-indigo-50 border-t-2 border-purple-200">
              <td colspan="3" class="py-5 px-4 text-right text-lg font-bold text-gray-800">TOTAL:</td>
              <td class="py-5 px-4 text-right text-2xl font-bold text-purple-700">${{ number_format($total, 2) }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
    @endif
  </div>

  <!-- Agregar Productos -->
  <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-xl shadow-lg p-8 border border-purple-100">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
      <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      Agregar Productos
    </h3>
    
    @if($allProducts->isEmpty())
      <div class="bg-red-50 border border-red-200 rounded-lg p-6 text-center">
        <svg class="w-12 h-12 mx-auto text-red-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <p class="text-gray-700 font-medium mb-2">No hay productos disponibles</p>
        <a href="{{ route('products.index') }}" class="inline-flex items-center text-purple-600 hover:text-purple-800 font-medium">
          Crear productos primero
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    @else
      <form action="{{ route('lists.addProduct', $list) }}" method="POST" class="bg-white rounded-lg p-6 shadow">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Seleccionar Producto</label>
            <select name="product_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" required>
              <option value="">-- Elige un producto --</option>
              @foreach($allProducts as $prod)
                <option value="{{ $prod->id }}">{{ $prod->name }} - ${{ number_format($prod->price, 2) }}</option>
              @endforeach
            </select>
            @error('product_id')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Cantidad</label>
            <input type="number" name="quantity" min="1" value="1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" required>
            @error('quantity')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="mt-6">
          <button type="submit" class="w-full md:w-auto px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-lg transition transform hover:scale-105">
            Agregar a la Lista
          </button>
        </div>
      </form>
    @endif
  </div>

  <!-- Enlaces de Navegación -->
  <div class="mt-8 flex flex-wrap gap-3">
    <a href="{{ route('lists.index') }}" class="inline-flex items-center px-5 py-2 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg shadow transition border border-gray-200">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
      </svg>
      Volver a Listas
    </a>
    <a href="{{ route('products.index') }}" class="inline-flex items-center px-5 py-2 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg shadow transition border border-gray-200">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
      </svg>
      Gestionar Productos
    </a>
  </div>

@endsection