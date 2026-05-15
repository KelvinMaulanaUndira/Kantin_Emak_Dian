@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <h1 class="text-5xl font-bold text-gray-900 mb-2 flex items-center">
            <i class="fas fa-plus-circle text-orange-500 mr-3"></i>Add New Product
        </h1>
        <p class="text-gray-600">Upload a product with premium detail and image preview</p>
    </div>

    <div class="card-premium p-8">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid gap-6 mb-8">
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        <i class="fas fa-box text-orange-500 mr-2"></i>Product Name
                    </label>
                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white @error('name') border-red-500 @enderror" id="name" name="name" placeholder="e.g., Lumpia Goreng" required value="{{ old('name') }}">
                    @error('name') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        <i class="fas fa-align-left text-orange-500 mr-2"></i>Description
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white resize-none" id="description" name="description" placeholder="Describe your product..." rows="5">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                            <i class="fas fa-tag text-orange-500 mr-2"></i>Price (Rp)
                        </label>
                        <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white @error('price') border-red-500 @enderror" id="price" name="price" placeholder="0" required value="{{ old('price') }}">
                        @error('price') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                            <i class="fas fa-list text-orange-500 mr-2"></i>Category
                        </label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white" id="category_id" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <label for="photo" class="block text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                    <i class="fas fa-image text-orange-500 mr-2"></i>Product Photo
                </label>
                <label for="photo" class="border-2 border-dashed border-gray-300 rounded-3xl p-10 text-center cursor-pointer hover:bg-gray-50 transition bg-white/70 shadow-sm flex flex-col items-center justify-center gap-4">
                    <i class="fas fa-cloud-upload-alt text-5xl text-gray-400"></i>
                    <div>
                        <p class="text-gray-700 font-semibold">Drag & drop or click to upload</p>
                        <p class="text-gray-500 text-sm">PNG, JPG, GIF up to 2MB</p>
                    </div>
                    <p id="fileName" class="text-orange-600 text-sm"></p>
                    <input type="file" class="hidden" id="photo" name="photo" accept="image/*" required onchange="updateFileName(this)">
                </label>
                @error('photo') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col md:flex-row gap-4">
                <button type="submit" class="btn-premium px-8 py-3 rounded-xl text-white font-bold inline-flex items-center justify-center flex-1">
                    <i class="fas fa-save mr-2"></i>Add Product
                </button>
                <a href="{{ route('products.index') }}" class="px-8 py-3 rounded-xl text-gray-700 font-bold border border-gray-300 hover:bg-gray-50 transition inline-flex items-center justify-center flex-1">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function updateFileName(input) {
    const fileName = document.getElementById('fileName');
    if (input.files && input.files[0]) {
        fileName.textContent = '✓ ' + input.files[0].name;
    }
}
</script>
@endsection