<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SteelCars - @yield('title', 'Repuestos para Autos')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .loading {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-orange-600">SteelCars</a>
                    <div class="ml-10 flex space-x-4">
                        <a href="{{ url('/') }}" class="text-gray-700 hover:text-orange-600">Inicio</a>
                        <a href="{{ url('/products') }}" class="text-gray-700 hover:text-orange-600">Productos</a>
                        <a href="{{ url('/categories') }}" class="text-gray-700 hover:text-orange-600">Categorías</a>
                        <a href="{{ url('/brands') }}" class="text-gray-700 hover:text-orange-600">Marcas</a>
                    </div>
                </div>
                <div>
                    @auth
                        <a href="{{ url('/admin') }}" class="text-gray-700 hover:text-orange-600">Admin</a>
                        <a href="{{ url('/logout') }}" class="ml-4 text-gray-700 hover:text-orange-600">Salir</a>
                    @else
                        <a href="{{ url('/admin/login') }}"
                            class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
                            Panel Admin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} SteelCars - Tu tienda de repuestos para autos</p>
        </div>
    </footer>
</body>

</html>