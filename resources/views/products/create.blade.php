@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900"><i class="fas fa-plus-circle text-orange-500 mr-3"></i>Add New Product</h1>
        <p class="text-gray-600 mt-2">Upload a new product to your catalog</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-box text-orange-500 mr-2"></i>Product Name</label>
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition @error('name') border-red-500 @enderror" id="name" name="name" placeholder="e.g., Lumpia Goreng" required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-align-left text-orange-500 mr-2"></i>Description</label>
                <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition" id="description" name="description" placeholder="Describe your product..." rows="4"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="price" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-tag text-orange-500 mr-2"></i>Price (Rp)</label>
                    <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition @error('price') border-red-500 @enderror" id="price" name="price" placeholder="0" required>
                    @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="category_id" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-list text-orange-500 mr-2"></i>Category</label>
                    <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition" id="category_id" name="category_id" required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-6">
                <label for="photo" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-image text-orange-500 mr-2"></i>Product Photo</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition">
                    <input type="file" class="hidden" id="photo" name="photo" accept="image/*" required onchange="updateFileName(this)">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                    <p class="text-gray-600 font-semibold mt-2">Click to upload product photo</p>
                    <p class="text-gray-500 text-sm">PNG, JPG, GIF up to 2MB</p>
                    <p id="fileName" class="text-orange-600 text-sm mt-2"></p>
                </div>
                @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold"><i class="fas fa-save mr-2"></i>Add Product</button>
                <a href="{{ route('products.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg transition"><i class="fas fa-times mr-2"></i>Cancel</a>
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

document.getElementById('photo').addEventListener('click', function() {
    this.click();
});

document.querySelector('.border-dashed').addEventListener('click', function() {
    document.getElementById('photo').click();
});
</script>
@endsection