@extends('layouts.app')

@section('title', 'Búsqueda: ' . $query)

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-2">Resultados de búsqueda</h1>
        <p class="text-gray-600 mb-8">Mostrando resultados para: "{{ $query }}"</p>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">Sin imagen</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-orange-600">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ url('/product/' . $product->slug) }}" class="text-orange-600 hover:text-orange-800">Ver
                                    más →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500">No se encontraron productos para "{{ $query }}"</p>
                <a href="{{ url('/products') }}" class="inline-block mt-4 text-orange-600 hover:text-orange-800">Ver todos los
                    productos →</a>
            </div>
        @endif
    </div>
@endsection