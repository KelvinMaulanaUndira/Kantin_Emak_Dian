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
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Add Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" class="w-full px-3 py-2 border rounded" id="name" name="name" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea class="w-full px-3 py-2 border rounded" id="description" name="description"></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="number" step="0.01" class="w-full px-3 py-2 border rounded" id="price" name="price" required>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category</label>
                <select class="w-full px-3 py-2 border rounded" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="photo" class="block text-gray-700">Photo</label>
                <input type="file" class="w-full px-3 py-2 border rounded" id="photo" name="photo" accept="image/*" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            <a href="{{ route('products.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
        </form>
    </div>
</div>
@endsection