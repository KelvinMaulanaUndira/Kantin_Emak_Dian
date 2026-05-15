@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-40 h-40 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-20 left-10 w-40 h-40 bg-cyan-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>

        <!-- Login Card -->
        <div class="relative card-premium overflow-hidden">
            <!-- Header Gradient -->
            <div class="gradient-sunset p-8 text-white">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur">
                        <i class="fas fa-lock text-3xl"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-center">Welcome Back</h2>
                <p class="text-center text-orange-100 mt-2">Sign in to your UMKM account</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <p class="text-red-700 font-semibold text-sm"><i class="fas fa-exclamation-circle mr-2"></i>Login Failed</p>
                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('email') }}</p>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
                            <i class="fas fa-envelope text-orange-500 mr-2"></i>Email Address
                        </label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white" id="email" name="email" placeholder="you@example.com" required>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">
                            <i class="fas fa-lock text-orange-500 mr-2"></i>Password
                        </label>
                        <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition bg-gray-50 hover:bg-white" id="password" name="password" placeholder="••••••••" required>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="w-4 h-4 text-orange-600 rounded focus:ring-orange-500">
                        <label for="remember" class="ml-2 text-sm text-gray-700">Remember me</label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn-premium w-full text-white font-bold py-3 px-4 rounded-xl flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <!-- Register Link -->
                <p class="text-center text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-orange-600 font-bold hover:text-orange-700">Create one now</a>
                </p>
            </div>
        </div>

        <!-- Security Info -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <i class="fas fa-shield-alt text-green-500 mr-2"></i>Your data is secure and encrypted
        </div>
    </div>
</div>
@endsection