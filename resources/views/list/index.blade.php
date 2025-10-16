@extends('layouts.app')
@section('content')
  
  <!-- Encabezado de Página -->
  <div class="mb-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
      <div>
        <h2 class="text-3xl font-bold text-gray-800">Mis Listas de Compras</h2>
        <p class="text-gray-600 mt-1">Organiza y gestiona tus compras de manera eficiente</p>
      </div>
      <a href="{{ route('lists.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-lg transition transform hover:scale-105">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Nueva Lista
      </a>
    </div>
  </div>

  @if($lists->isEmpty())
    <!-- Estado Vacío Mejorado -->
    <div class="bg-white rounded-xl shadow-md p-12 text-center">
      <div class="max-w-md mx-auto">
        <div class="bg-purple-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
          <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-3">No hay listas aún</h3>
        <p class="text-gray-600 mb-6">Comienza creando tu primera lista de compras para organizar mejor tus productos.</p>
        <a href="{{ route('lists.create') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow transition">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Crear Primera Lista
        </a>
      </div>
    </div>
  @else
    <!-- Grid de Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($lists as $list)
      <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100">
        <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-2"></div>
        <div class="p-6">
          <div class="flex items-start justify-between mb-4">
            <div class="flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $list->title }}</h3>
              <p class="text-sm text-gray-600 line-clamp-2">
                {{ $list->notes ?? 'Sin notas adicionales' }}
              </p>
            </div>
          </div>
          
          <div class="flex items-center text-sm text-gray-500 mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            {{ $list->due_date ? \Carbon\Carbon::parse($list->due_date)->format('d/m/Y') : 'Sin fecha definida' }}
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <div class="flex items-center text-sm text-gray-600">
              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
              </svg>
              {{ $list->products->count() }} productos
            </div>
            <a href="{{ route('lists.show', $list) }}" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition">
              Ver detalles
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @endif

@endsection