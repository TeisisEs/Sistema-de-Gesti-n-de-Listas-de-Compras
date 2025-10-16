<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>CRUD Listas de Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">CRUD - Listas de Compras</h1>
    @if(session('success'))
      <div class="bg-green-100 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    @yield('content')
  </div>
</body>
</html>