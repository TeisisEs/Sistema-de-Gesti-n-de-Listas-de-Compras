@extends('layouts.app')
@section('content')

  <!-- Breadcrumb -->
  <nav class="flex mb-6 text-sm">
    <a href="{{ route('lists.index') }}" class="text-purple-600 hover:text-purple-800">← Volver a Listas</a>
  </nav>

  <!-- Contenedor del Formulario -->
  <div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      
      <!-- Header del Card -->
      <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-6">
        <h2 class="text-2xl font-bold text-white">Crear Nueva Lista</h2>
        <p class="text-purple-100 mt-1">Completa la información para crear tu lista de compras</p>
      </div>

      <!-- Formulario -->
      <form action="{{ route('lists.store') }}" method="POST" class="p-8 space-y-6">
        @csrf
        
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Título de la Lista <span class="text-red-500">*</span>
          </label>
          <input 
            name="title" 
            type="text"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
            placeholder="Ej: Compras del mes, Lista semanal..."
            value="{{ old('title') }}" 
            required>
          @error('title')
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
            Notas Adicionales
          </label>
          <textarea 
            name="notes" 
            rows="4"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none" 
            placeholder="Agrega notas, recordatorios o detalles importantes...">{{ old('notes') }}</textarea>
          @error('notes')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Fecha
          </label>
          <input 
            type="date" 
            name="due_date" 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
            value="{{ old('due_date', date('Y-m-d')) }}">
          @error('due_date')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
          <a href="{{ route('lists.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
            Cancelar
          </a>
          <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-lg transition transform hover:scale-105">
            Crear Lista
          </button>
        </div>
      </form>
    </div>
  </div>

@endsection