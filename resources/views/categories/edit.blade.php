@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-gray-900 mb-2 flex items-center">
            <i class="fas fa-edit text-orange-500 mr-3"></i>Edit Category
        </h1>
        <p class="text-gray-600">Update the category information for better product organization</p>
    </div>

    <!-- Form Card -->
    <div class="card-premium p-8">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Category Name -->
            <div class="mb-8">
                <label for="name" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                    <i class="fas fa-tag text-orange-500 mr-2"></i>Category Name
                </label>
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white @error('name') border-red-500 @enderror" id="name" name="name" placeholder="Category name" value="{{ old('name', $category->name) }}" required>
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
                <textarea class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white resize-none" id="description" name="description" placeholder="Describe this category..." rows="5">{{ old('description', $category->description) }}</textarea>
                <p class="text-gray-500 text-xs mt-2"><i class="fas fa-info-circle mr-1"></i>Use a clear description for product grouping.</p>
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <button type="submit" class="btn-premium px-8 py-3 rounded-xl text-white font-bold inline-flex items-center flex-1 justify-center">
                    <i class="fas fa-save mr-2"></i>Save Changes
                </button>
                <a href="{{ route('categories.index') }}" class="px-8 py-3 rounded-xl text-gray-700 font-bold border border-gray-300 hover:bg-gray-50 transition inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
            </div>
        </form>
    </div>
</div>
@endsection