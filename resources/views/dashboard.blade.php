@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="mb-12">
    <h1 class="text-5xl font-bold text-gray-900 mb-3">Welcome Back, {{ Auth::user()->name }}! 👋</h1>
    <p class="text-gray-600 text-lg">Here's your UMKM performance summary</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <!-- Total Categories Card -->
    <div class="card-premium stat-card border-t-4 border-orange-500">
        <div class="p-8">
            <div class="flex items-center justify-between mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-100 to-orange-50 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-layer-group text-2xl text-orange-600"></i>
                </div>
                <span class="text-4xl text-orange-500 font-bold">{{ App\Models\Category::count() }}</span>
            </div>
            <h3 class="text-gray-900 font-bold text-lg mb-1">Total Categories</h3>
            <p class="text-gray-500 text-sm">Product categories available</p>
        </div>
    </div>

    <!-- Total Products Card -->
    <div class="card-premium stat-card border-t-4 border-cyan-500">
        <div class="p-8">
            <div class="flex items-center justify-between mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-100 to-cyan-50 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-shopping-bag text-2xl text-cyan-600"></i>
                </div>
                <span class="text-4xl text-cyan-500 font-bold">{{ App\Models\Product::count() }}</span>
            </div>
            <h3 class="text-gray-900 font-bold text-lg mb-1">Total Products</h3>
            <p class="text-gray-500 text-sm">Items in your catalog</p>
        </div>
    </div>

    <!-- Total Value Card -->
    <div class="card-premium stat-card border-t-4 border-green-500">
        <div class="p-8">
            <div class="flex items-center justify-between mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-50 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-2xl text-green-600"></i>
                </div>
                <span class="text-2xl text-green-500 font-bold">Rp {{ number_format(App\Models\Product::sum('price'), 0, ',', '.') }}</span>
            </div>
            <h3 class="text-gray-900 font-bold text-lg mb-1">Inventory Value</h3>
            <p class="text-gray-500 text-sm">Total product value</p>
        </div>
    </div>
</div>

<!-- Quick Actions & Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Quick Actions -->
    <div class="card-premium">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-bolt text-orange-500 mr-3"></i>Quick Actions
            </h2>
            <div class="space-y-4">
                <a href="{{ route('categories.create') }}" class="group flex items-center p-4 bg-gradient-to-r from-orange-50 to-amber-50 rounded-xl hover:from-orange-100 hover:to-amber-100 transition border border-orange-100">
                    <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center text-white mr-4 group-hover:scale-110 transition">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">Add New Category</p>
                        <p class="text-sm text-gray-600">Create product category</p>
                    </div>
                    <i class="fas fa-arrow-right text-orange-500 opacity-0 group-hover:opacity-100 transition"></i>
                </a>

                <a href="{{ route('products.create') }}" class="group flex items-center p-4 bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl hover:from-cyan-100 hover:to-blue-100 transition border border-cyan-100">
                    <div class="w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center text-white mr-4 group-hover:scale-110 transition">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">Add New Product</p>
                        <p class="text-sm text-gray-600">Upload product photo & details</p>
                    </div>
                    <i class="fas fa-arrow-right text-cyan-500 opacity-0 group-hover:opacity-100 transition"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Account Overview -->
    <div class="card-premium">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-user-check text-cyan-500 mr-3"></i>Account Overview
            </h2>
            <div class="space-y-5">
                <div class="pb-5 border-b border-gray-100">
                    <p class="text-gray-600 text-sm font-medium">Account Status</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <span class="font-semibold text-gray-900">Active</span>
                    </div>
                </div>
                <div class="pb-5 border-b border-gray-100">
                    <p class="text-gray-600 text-sm font-medium">User Role</p>
                    <p class="font-semibold text-gray-900 mt-2 uppercase text-sm bg-orange-50 inline-block px-3 py-1 rounded-lg">{{ Auth::user()->role }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Member Since</p>
                    <p class="font-semibold text-gray-900 mt-2">{{ Auth::user()->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection