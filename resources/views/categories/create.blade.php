@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900"><i class="fas fa-plus-circle text-orange-500 mr-3"></i>Add New Category</h1>
        <p class="text-gray-600 mt-2">Create a new product category for your UMKM</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-tag text-orange-500 mr-2"></i>Category Name</label>
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition @error('name') border-red-500 @enderror" id="name" name="name" placeholder="e.g., Makanan Ringan" required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-align-left text-orange-500 mr-2"></i>Description</label>
                <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition" id="description" name="description" placeholder="Describe this category..." rows="4"></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold"><i class="fas fa-save mr-2"></i>Save Category</button>
                <a href="{{ route('categories.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg transition"><i class="fas fa-times mr-2"></i>Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection