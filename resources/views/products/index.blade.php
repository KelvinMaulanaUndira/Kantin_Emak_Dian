@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action">Categories</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action active">Products</a>
        </div>
    </div>
    <div class="col-md-9">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td><img src="{{ asset('storage/' . $product->photo_path) }}" width="50"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection