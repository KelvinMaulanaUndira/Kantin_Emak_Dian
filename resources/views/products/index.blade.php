@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="w-1/4 bg-white shadow-md p-4">
        <ul class="space-y-2">
            <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Categories</a></li>
            <li><a href="{{ route('products.index') }}" class="block py-2 px-4 bg-blue-500 text-white rounded">Products</a></li>
        </ul>
    </div>
    <div class="w-3/4 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Products</h1>
        <a href="{{ route('products.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Product</a>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Category</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $product->id }}</td>
                    <td class="py-2 px-4">{{ $product->name }}</td>
                    <td class="py-2 px-4">{{ $product->category->name }}</td>
                    <td class="py-2 px-4">{{ $product->price }}</td>
                    <td class="py-2 px-4"><img src="{{ asset('storage/' . $product->photo_path) }}" class="w-12 h-12 object-cover rounded"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection