@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Categorías</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($categories as $category)
                <a href="{{ url('/category/' . $category->slug) }}"
                    class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4">🔧</div>
                    <h3 class="font-bold text-xl mb-2">{{ $category->name }}</h3>
                    <p class="text-gray-600">{{ $category->products_count }} productos</p>
                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">No hay categorías disponibles.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection