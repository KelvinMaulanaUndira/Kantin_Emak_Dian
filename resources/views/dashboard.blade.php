@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action">Categories</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Products</a>
        </div>
    </div>
    <div class="col-md-9">
        <h1>Welcome to Dashboard, {{ Auth::user()->name }}!</h1>
        <p>Manage your categories and products here.</p>
    </div>
</div>
@endsection