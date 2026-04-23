@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido a SteelCars</h1>
            <p class="text-xl text-gray-600">Los mejores repuestos para tu auto</p>
        </div>

        <!-- Productos Destacados -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6">Productos Destacados</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover">
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span
                                    class="text-2xl font-bold text-orange-600">${{ number_format($product->current_price, 2) }}</span>
                                <a href="/product/{{ $product->slug }}"
                                    class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Categorías -->
        <div>
            <h2 class="text-2xl font-bold mb-6">Categorías</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($categories as $category)
                    <a href="/category/{{ $category->slug }}"
                        class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
                        <div class="text-4xl mb-2">🔧</div>
                        <h3 class="font-bold">{{ $category->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $category->products_count }} productos</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection