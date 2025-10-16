@extends('layouts.app')
@section('content')

  <!-- Encabezado -->
  <div class="mb-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
      <div>
        <h2 class="text-3xl font-bold text-gray-800">Gestión de Productos</h2>
        <p class="text-gray-600 mt-1">Administra el catálogo de productos disponibles</p>
      </div>
      <a href="{{ route('lists.index') }}" class="inline-flex items-center px-5 py-2 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg shadow transition border border-gray-200">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Ver Listas
      </a>
    </div>
  </div>

  <!-- Formulario Crear Producto -->
  <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl shadow-lg p-8 mb-8 border border-green-100">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
      <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      Crear Nuevo Producto
    </h3>
    
    <form action="{{ route('products.store') }}" method="POST" class="bg-white rounded-lg p-6 shadow">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Nombre del Producto <span class="text-red-500">*</span>
          </label>
          <input 
            name="name" 
            type="text"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition" 
            placeholder="Ej: Arroz, Leche, Pan..."
            value="{{ old('name') }}" 
            required>
          @error('name')
            <p class="mt-2 text-sm text-red-600 flex items-center">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Precio <span class="text-red-500">*</span>
          </label>
          <div class="relative">
            <span class="absolute left-4 top-3 text-gray-500 font-medium">$</span>
            <input 
              type="number" 
              step="0.01" 
              name="price" 
              class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition" 
              placeholder="0.00"
              value="{{ old('price') }}" 
              required>
          </div>
          @error('price')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Descripción (opcional)
          </label>
          <textarea 
            name="description" 
            rows="3"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-none" 
            placeholder="Detalles adicionales del producto...">{{ old('description') }}</textarea>
          @error('description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="mt-6">
        <!-- Enhanced button for better contrast and accessibility -->
        <button
          type="submit"
          aria-label="Crear producto"
          class="px-8 py-3 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-lg shadow-lg transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900 inline-flex items-center"
        >
          <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          <span class="leading-none">Crear Producto</span>
        </button>
      </div>
    </form>
  </div>

  <!-- Lista de Productos -->
  <div class="bg-white rounded-xl shadow-lg p-8">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
      <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
      </svg>
      Catálogo de Productos
      <span class="ml-3 px-3 py-1 bg-purple-100 text-purple-700 text-sm font-semibold rounded-full">
        {{ $products->count() }} productos
      </span>
    </h3>
    
    @if($products->isEmpty())
      <div class="text-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
        </svg>
        <p class="text-gray-600 font-medium">No hay productos registrados todavía</p>
        <p class="text-sm text-gray-500 mt-1">Crea tu primer producto usando el formulario de arriba</p>
      </div>
    @else
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $p)
          <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg p-6 border border-gray-200 hover:shadow-lg transition card-hover">
            <div class="flex items-start justify-between mb-3">
              <div class="bg-purple-100 rounded-lg p-3">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
              </div>
              <div class="text-right">
                <div class="text-2xl font-bold text-green-600">${{ number_format($p->price, 2) }}</div>
                <div class="text-xs text-gray-500">Precio unitario</div>
              </div>
            </div>
            
            <h4 class="text-lg font-bold text-gray-800 mb-2">{{ $p->name }}</h4>
            
            <p class="text-sm text-gray-600 line-clamp-2 mb-4">
              {{ $p->description ?? 'Sin descripción adicional' }}
            </p>
            
            <div class="pt-4 border-t border-gray-300">
              <div class="flex items-center text-xs text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Creado: {{ $p->created_at->format('d/m/Y') }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>

@endsection