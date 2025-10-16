@extends('layouts.app')
@section('content')
  <h2 class="text-lg mb-2">Crear Lista</h2>
  <form action="{{ route('lists.store') }}" method="POST" class="space-y-2">
    @csrf
    <div>
      <label>Título</label>
      <input name="title" class="border p-1 w-full" value="{{ old('title') }}" required>
      @error('title')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>
    <div>
      <label>Notas</label>
      <textarea name="notes" class="border p-1 w-full">{{ old('notes') }}</textarea>
    </div>
    <div>
      <label>Fecha</label>
      <input type="date" name="due_date" class="border p-1" value="{{ old('due_date', date('Y-m-d')) }}">
    </div>
    <div>
      <button class="px-3 py-1 bg-green-600 text-white rounded">Crear</button>
      <a href="{{ route('lists.index') }}" class="ml-2">Cancelar</a>
    </div>
  </form>
@endsection