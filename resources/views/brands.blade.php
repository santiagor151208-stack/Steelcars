@extends('layouts.app')

@section('title', 'Marcas')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Marcas</h1>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($brands as $brand)
                <a href="{{ url('/brand/' . $brand->slug) }}"
                    class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                            class="w-24 h-24 object-contain mx-auto mb-4">
                    @else
                        <div class="text-4xl mb-4">🚗</div>
                    @endif
                    <h3 class="font-bold text-lg">{{ $brand->name }}</h3>
                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">No hay marcas disponibles.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection