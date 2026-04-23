<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SteelCars - Repuestos para Autos</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-orange-600">SteelCars</a>
                    <div class="ml-10 flex space-x-4">
                        <a href="/" class="text-gray-700 hover:text-orange-600">Inicio</a>
                        <a href="/products" class="text-gray-700 hover:text-orange-600">Productos</a>
                        <a href="/categories" class="text-gray-700 hover:text-orange-600">Categorías</a>
                        <a href="/brands" class="text-gray-700 hover:text-orange-600">Marcas</a>
                    </div>
                </div>
                <div>
                    @auth
                        <a href="/admin" class="text-gray-700 hover:text-orange-600">Admin</a>
                        <a href="/logout" class="ml-4 text-gray-700 hover:text-orange-600">Salir</a>
                    @else
                        <a href="/login" class="text-gray-700 hover:text-orange-600">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 SteelCars - Tu tienda de repuestos para autos</p>
        </div>
    </footer>

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>