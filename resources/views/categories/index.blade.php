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
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Categories</h1>
        <a href="{{ route('categories.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Category</a>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Description</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $category->id }}</td>
                    <td class="py-2 px-4">{{ $category->name }}</td>
                    <td class="py-2 px-4">{{ $category->description }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection