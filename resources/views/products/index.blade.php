@extends('layouts.app')

@section('content')
<div>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-5xl font-bold text-gray-900 mb-2 flex items-center">
                <i class="fas fa-box-open text-orange-500 mr-3"></i>Product Showcase
            </h1>
            <p class="text-gray-600">A premium view of your product catalog</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn-premium px-8 py-3 rounded-xl text-white font-bold inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="mb-8 bg-green-50 border border-green-200 rounded-xl p-4 flex items-start">
            <i class="fas fa-check-circle text-green-600 mr-4 mt-1 text-lg"></i>
            <div>
                <p class="text-green-900 font-semibold">Success!</p>
                <p class="text-green-700 text-sm">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if($products->isEmpty())
        <div class="card-premium text-center py-16">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">No products added yet</h3>
            <p class="text-gray-600 mb-8">Create your first product and make your catalog shine</p>
            <a href="{{ route('products.create') }}" class="btn-premium px-8 py-3 rounded-xl text-white inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>Add First Product
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($products as $product)
            <div class="card-premium overflow-hidden border-t-4 border-cyan-500 transition transform hover:-translate-y-1">
                <div class="relative h-56 overflow-hidden bg-gray-100">
                    @if($product->photo_path)
                        <img src="{{ asset('storage/' . $product->photo_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <i class="fas fa-image text-gray-400 text-5xl"></i>
                        </div>
                    @endif
                    <span class="absolute top-4 left-4 bg-white/90 text-sm text-gray-800 px-3 py-1 rounded-full shadow-sm">
                        {{ $product->category->name }}
                    </span>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $product->name }}</h3>
                        <span class="text-orange-600 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-3">{{ Str::limit($product->description, 80, '...') }}</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <p><i class="fas fa-calendar-day mr-2"></i>{{ $product->created_at->format('d M Y') }}</p>
                        <div class="flex items-center gap-3">
                            <a href="#" class="text-orange-600 font-semibold hover:text-orange-700"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:text-red-700 inline-flex items-center">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection