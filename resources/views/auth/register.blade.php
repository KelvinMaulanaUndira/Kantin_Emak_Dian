@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-40 h-40 bg-cyan-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-20 left-10 w-40 h-40 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>

        <!-- Register Card -->
        <div class="relative card-premium overflow-hidden">
            <!-- Header Gradient -->
            <div class="gradient-sunset p-8 text-white">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur">
                        <i class="fas fa-user-plus text-3xl"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-center">Create Account</h2>
                <p class="text-center text-orange-100 mt-2">Join Kantin Emak Dian today</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form action="{{ route('register') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                            <i class="fas fa-user text-orange-500 mr-2"></i>Full Name
                        </label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white" id="name" name="name" placeholder="Your name" required value="{{ old('name') }}">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
                            <i class="fas fa-envelope text-orange-500 mr-2"></i>Email Address
                        </label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white" id="email" name="email" placeholder="you@example.com" required value="{{ old('email') }}">
                        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">
                            <i class="fas fa-lock text-orange-500 mr-2"></i>Password
                        </label>
                        <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white" id="password" name="password" placeholder="••••••••" required>
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Confirm Password Input -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-900 mb-2">
                            <i class="fas fa-check-circle text-orange-500 mr-2"></i>Confirm Password
                        </label>
                        <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" class="w-4 h-4 text-orange-600 rounded focus:ring-orange-500 mt-1" required>
                        <label for="terms" class="ml-2 text-sm text-gray-700">
                            I agree to the <a href="#" class="text-orange-600 hover:text-orange-700">Terms of Service</a> and <a href="#" class="text-orange-600 hover:text-orange-700">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="btn-premium w-full text-white font-bold py-3 px-4 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-check mr-2"></i>Create Account
                    </button>
                </form>

                <!-- Login Link -->
                <p class="text-center text-gray-600 mt-6">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-orange-600 font-bold hover:text-orange-700">Sign in here</a>
                </p>
            </div>
        </div>

        <!-- Info Message -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <i class="fas fa-info-circle text-blue-500 mr-2"></i>You'll be registered as a Merchant by default
        </div>
    </div>
</div>
@endsection