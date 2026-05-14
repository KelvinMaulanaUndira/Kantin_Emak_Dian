@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" class="w-full px-3 py-2 border rounded" id="email" name="email" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" class="w-full px-3 py-2 border rounded" id="password" name="password" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
    </form>
    <p class="mt-4 text-center">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
</div>
@endsection