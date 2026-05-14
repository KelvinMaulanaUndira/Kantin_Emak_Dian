@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-900"><i class="fas fa-box text-orange-500 mr-3"></i>Products</h1>
            <p class="text-gray-600 mt-2">Manage your product catalog</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold"><i class="fas fa-plus mr-2"></i>Add Product</a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg">
            <p class="text-green-700 font-semibold"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
        </div>
    @endif

    @if($products->isEmpty())
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No products yet</h3>
            <p class="text-gray-500 mb-6">Upload your first product to get started</p>
            <a href="{{ route('products.create') }}" class="btn-primary px-6 py-3 rounded-lg text-white inline-block"><i class="fas fa-plus mr-2"></i>Add First Product</a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
            <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-cyan-500">
                <div class="h-40 bg-gray-200 overflow-hidden">
                    @if($product->photo_path)
                        <img src="{{ asset('storage/' . $product->photo_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-300">
                            <i class="fas fa-image text-gray-400 text-4xl"></i>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($product->description, 50) }}</p>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-orange-600 font-bold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <p class="text-gray-500 text-xs mt-1">{{ $product->category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection