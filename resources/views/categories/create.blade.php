@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-gray-900 mb-2 flex items-center">
            <i class="fas fa-plus-circle text-orange-500 mr-3"></i>Create New Category
        </h1>
        <p class="text-gray-600">Add a new product category to organize your inventory</p>
    </div>

    <!-- Form Card -->
    <div class="card-premium p-8">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <!-- Category Name -->
            <div class="mb-8">
                <label for="name" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                    <i class="fas fa-tag text-orange-500 mr-2"></i>Category Name
                </label>
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white @error('name') border-red-500 @enderror" id="name" name="name" placeholder="e.g., Traditional Foods" value="{{ old('name') }}" required>
                @error('name') 
                    <p class="text-red-500 text-sm mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p> 
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-8">
                <label for="description" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                    <i class="fas fa-align-left text-orange-500 mr-2"></i>Description
                </label>
                <textarea class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white resize-none" id="description" name="description" placeholder="Describe this category..." rows="5">{{ old('description') }}</textarea>
                <p class="text-gray-500 text-xs mt-2"><i class="fas fa-info-circle mr-1"></i>Help customers understand what products are in this category</p>
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <button type="submit" class="btn-premium px-8 py-3 rounded-xl text-white font-bold inline-flex items-center flex-1 justify-center">
                    <i class="fas fa-save mr-2"></i>Create Category
                </button>
                <a href="{{ route('categories.index') }}" class="px-8 py-3 rounded-xl text-gray-700 font-bold border border-gray-300 hover:bg-gray-50 transition inline-flex items-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>

    <!-- Help Info -->
    <div class="mt-8 grid grid-cols-2 gap-4">
        <div class="card-premium p-4">
            <p class="text-sm text-gray-700"><i class="fas fa-lightbulb text-yellow-500 mr-2"></i><span class="font-semibold">Tip:</span> Use clear, descriptive names for categories</p>
        </div>
        <div class="card-premium p-4">
            <p class="text-sm text-gray-700"><i class="fas fa-check text-green-500 mr-2"></i><span class="font-semibold">Info:</span> You can edit categories anytime</p>
        </div>
    </div>
</div>
@endsection