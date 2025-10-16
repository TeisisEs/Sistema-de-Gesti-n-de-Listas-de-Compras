<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ShopList Pro - Sistema de Listas de Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .gradient-bg {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .card-hover {
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .card-hover:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen">
  
  <!-- Header Profesional -->
  <header class="gradient-bg shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-3">
          <div class="bg-white rounded-lg p-2">
            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
          </div>
          <div>
            <h1 class="text-2xl font-bold text-white">ShopList Pro</h1>
            <p class="text-purple-100 text-sm">Sistema de Gestión de Compras</p>
          </div>
        </div>
        
        <nav class="flex space-x-2">
          <a href="{{ route('lists.index') }}" class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white rounded-lg transition font-medium">
            📋 Listas
          </a>
          <a href="{{ route('products.index') }}" class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white rounded-lg transition font-medium">
            📦 Productos
          </a>
        </nav>
      </div>
    </div>
  </header>

  <!-- Contenido Principal -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if(session('success'))
      <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
          </div>
        </div>
      </div>
    @endif
    
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="mt-16 bg-gray-800 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
      <div class="text-center">
        <p class="text-sm">© 2025 ShopList Pro - Sistema de Gestión de Compras</p>
        <p class="text-xs mt-1 text-gray-400">Desarrollado con Laravel & Tailwind CSS</p>
      </div>
    </div>
  </footer>

</body>
</html>