@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" class="w-full px-3 py-2 border rounded" id="name" name="name" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" class="w-full px-3 py-2 border rounded" id="email" name="email" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" class="w-full px-3 py-2 border rounded" id="password" name="password" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
            <input type="password" class="w-full px-3 py-2 border rounded" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
    </form>
    <p class="mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
</div>
@endsection