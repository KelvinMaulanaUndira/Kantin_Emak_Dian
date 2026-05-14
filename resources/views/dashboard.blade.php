@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="w-1/4 bg-white shadow-md p-4">
        <ul class="space-y-2">
            <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 bg-blue-500 text-white rounded">Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Categories</a></li>
            <li><a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Products</a></li>
        </ul>
    </div>
    <div class="w-3/4 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Dashboard, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600">Manage your categories and products here.</p>
    </div>
</div>
@endsection