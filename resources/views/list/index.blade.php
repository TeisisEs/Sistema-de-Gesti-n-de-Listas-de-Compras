@extends('layouts.app')
@section('content')
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl">Listas de Compras</h2>
    <div class="space-x-2">
      <a href="{{ route('products.index') }}" class="px-3 py-1 bg-purple-500 text-white rounded">Ver Productos</a>
      <a href="{{ route('lists.create') }}" class="px-3 py-1 bg-blue-500 text-white rounded">Nueva lista</a>
    </div>
  </div>

  @if($lists->isEmpty())
    <div class="text-center py-8 text-gray-500">
      <p>No hay listas de compras aún.</p>
      <a href="{{ route('lists.create') }}" class="text-blue-600 underline">Crear la primera lista</a>
    </div>
  @else
    <table class="w-full table-auto border-collapse">
      <thead class="bg-gray-200">
        <tr>
          <th class="border p-2 text-left">Título</th>
          <th class="border p-2 text-left">Notas</th>
          <th class="border p-2 text-left">Fecha</th>
          <th class="border p-2 text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($lists as $list)
        <tr class="border-t hover:bg-gray-50">
          <td class="border p-2">{{ $list->title }}</td>
          <td class="border p-2">{{ $list->notes ?? 'Sin notas' }}</td>
          <td class="border p-2">{{ $list->due_date ? \Carbon\Carbon::parse($list->due_date)->format('d/m/Y') : 'Sin fecha' }}</td>
          <td class="border p-2 text-center">
            <a href="{{ route('lists.show', $list) }}" class="text-blue-600 hover:underline">Ver detalles</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif
@endsection