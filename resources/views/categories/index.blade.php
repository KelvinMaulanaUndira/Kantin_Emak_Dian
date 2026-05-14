@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-900"><i class="fas fa-list text-orange-500 mr-3"></i>Categories</h1>
            <p class="text-gray-600 mt-2">Manage your product categories</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold"><i class="fas fa-plus mr-2"></i>Add Category</a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg">
            <p class="text-green-700 font-semibold"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
        </div>
    @endif

    @if($categories->isEmpty())
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No categories yet</h3>
            <p class="text-gray-500 mb-6">Create your first category to get started</p>
            <a href="{{ route('categories.create') }}" class="btn-primary px-6 py-3 rounded-lg text-white inline-block"><i class="fas fa-plus mr-2"></i>Create First Category</a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
            <div class="card-hover bg-white rounded-xl shadow-lg p-6 border-t-4 border-orange-500">
                <div class="flex justify-between items-start mb-3">
                    <h3 class="text-lg font-bold text-gray-900">{{ $category->name }}</h3>
                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">{{ $category->products->count() }} items</span>
                </div>
                <p class="text-gray-600 text-sm mb-4">{{ $category->description ?? 'No description' }}</p>
                <a href="{{ route('categories.edit', $category) }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg transition"><i class="fas fa-edit mr-2"></i>Edit</a>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection