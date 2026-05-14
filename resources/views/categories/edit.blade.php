@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="w-1/4 bg-white shadow-md p-4">
        <ul class="space-y-2">
            <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}" class="block py-2 px-4 bg-blue-500 text-white rounded">Categories</a></li>
            <li><a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Products</a></li>
        </ul>
    </div>
    <div class="w-3/4 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Category</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" class="w-full px-3 py-2 border rounded" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea class="w-full px-3 py-2 border rounded" id="description" name="description">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            <a href="{{ route('categories.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
        </form>
    </div>
</div>
@endsection