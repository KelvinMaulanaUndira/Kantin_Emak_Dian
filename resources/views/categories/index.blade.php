@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="mb-12">
    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-5xl font-bold text-gray-900 mb-2 flex items-center">
                <i class="fas fa-layer-group text-orange-500 mr-3"></i>Categories Management
            </h1>
            <p class="text-gray-600">Organize your products into categories</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn-premium px-8 py-3 rounded-xl text-white font-bold inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Add Category
        </a>
    </div>
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

@if($categories->isEmpty())
    <!-- Empty State -->
    <div class="card-premium text-center py-16">
        <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">No categories yet</h3>
        <p class="text-gray-600 mb-8">Start by creating your first product category</p>
        <a href="{{ route('categories.create') }}" class="btn-premium px-8 py-3 rounded-xl text-white inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Create First Category
        </a>
    </div>
@else
    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <div class="card-premium group overflow-hidden border-t-4 border-orange-500">
            <div class="p-8">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-100 to-amber-50 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <i class="fas fa-folder text-orange-600 text-lg"></i>
                    </div>
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $category->products->count() }} products
                    </span>
                </div>

                <!-- Content -->
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $category->name }}</h3>
                <p class="text-gray-600 text-sm mb-6 line-clamp-2">{{ $category->description ?? 'No description' }}</p>

                <!-- Footer -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <p class="text-xs text-gray-500">
                        <i class="fas fa-calendar-alt mr-1"></i>{{ $category->created_at->format('M d, Y') }}
                    </p>
                    <a href="{{ route('categories.edit', $category) }}" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-semibold text-sm">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection