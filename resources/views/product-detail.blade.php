@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/2">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-96 object-cover">
                    @else
                        <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Sin imagen</span>
                        </div>
                    @endif
                </div>
                <div class="md:w-1/2 p-6">
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-600 mb-4">SKU: {{ $product->sku }}</p>
                    <div class="mb-4">
                        @if($product->sale_price)
                            <span
                                class="text-3xl font-bold text-orange-600">${{ number_format($product->sale_price, 2) }}</span>
                            <span
                                class="text-lg text-gray-400 line-through ml-2">${{ number_format($product->price, 2) }}</span>
                        @else
                            <span class="text-3xl font-bold text-orange-600">${{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Stock:</span>
                        <span class="{{ $product->stock <= 5 ? 'text-red-600' : 'text-green-600' }}">
                            {{ $product->stock > 0 ? $product->stock . ' unidades' : 'Agotado' }}
                        </span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Categoría:</span>
                        <span class="text-gray-600">{{ $product->category->name }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Descripción:</span>
                        <p class="text-gray-600 mt-2">{!! nl2br(e($product->description)) !!}</p>
                    </div>
                    @if($product->cars->count() > 0)
                        <div class="mb-4">
                            <span class="font-bold">Autos compatibles:</span>
                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach($product->cars as $car)
                                    <span class="bg-gray-200 px-2 py-1 rounded text-sm">{{ $car->brand->name }}
                                        {{ $car->model }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <a href="{{ url('/products') }}"
                        class="inline-block bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">
                        ← Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection