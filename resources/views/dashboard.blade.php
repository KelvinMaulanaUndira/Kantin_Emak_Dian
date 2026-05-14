@extends('layouts.app')

@section('content')
<div>
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h1>
        <p class="text-gray-600">Manage your UMKM catalog with ease and efficiency</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card-hover bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-semibold">Total Categories</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ App\Models\Category::count() }}</p>
                </div>
                <i class="fas fa-list text-4xl text-orange-500 opacity-20"></i>
            </div>
        </div>

        <div class="card-hover bg-white rounded-xl shadow-lg p-6 border-l-4 border-cyan-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-semibold">Total Products</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ App\Models\Product::count() }}</p>
                </div>
                <i class="fas fa-box text-4xl text-cyan-500 opacity-20"></i>
            </div>
        </div>

        <div class="card-hover bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-semibold">Total Value</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">Rp {{ number_format(App\Models\Product::sum('price'), 0, ',', '.') }}</p>
                </div>
                <i class="fas fa-chart-bar text-4xl text-green-500 opacity-20"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="card-hover bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4"><i class="fas fa-list text-orange-500 mr-2"></i>Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ route('categories.create') }}" class="btn-primary block py-3 px-4 text-white font-semibold rounded-lg text-center">
                    <i class="fas fa-plus mr-2"></i>Add New Category
                </a>
                <a href="{{ route('products.create') }}" class="btn-primary block py-3 px-4 text-white font-semibold rounded-lg text-center">
                    <i class="fas fa-plus mr-2"></i>Add New Product
                </a>
            </div>
        </div>

        <div class="card-hover bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4"><i class="fas fa-info-circle text-cyan-500 mr-2"></i>Overview</h2>
            <div class="space-y-2 text-gray-700">
                <p><span class="font-semibold">Status:</span> Active</p>
                <p><span class="font-semibold">Role:</span> {{ Auth::user()->role }}</p>
                <p><span class="font-semibold">Member Since:</span> {{ Auth::user()->created_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection