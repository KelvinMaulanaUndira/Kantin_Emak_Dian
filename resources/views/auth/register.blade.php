@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="gradient-primary p-8 text-white">
                <h2 class="text-3xl font-bold text-center"><i class="fas fa-user-plus mr-2"></i>Register</h2>
                <p class="text-center text-orange-100 mt-2">Join Kantin Emak Dian today</p>
            </div>
            <div class="p-8">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-user mr-2 text-orange-500"></i>Name</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition" id="name" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-envelope mr-2 text-orange-500"></i>Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition" id="email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-lock mr-2 text-orange-500"></i>Password</label>
                        <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition" id="password" name="password" required>
                    </div>
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-lock mr-2 text-orange-500"></i>Confirm Password</label>
                        <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn-primary w-full text-white font-bold py-3 rounded-lg"><i class="fas fa-check mr-2"></i>Register</button>
                </form>
                <p class="mt-6 text-center text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-orange-600 font-bold hover:text-orange-700">Login Here</a></p>
            </div>
        </div>
    </div>
</div>
@endsection