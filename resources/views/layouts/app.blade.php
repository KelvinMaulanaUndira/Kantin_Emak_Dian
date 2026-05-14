<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Emak Dian - UMKM Platform</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #1f2937;
            --accent: #06b6d4;
        }
        body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
        .gradient-primary { background: linear-gradient(135deg, var(--primary) 0%, #fb923c 100%); }
        .gradient-secondary { background: linear-gradient(135deg, var(--secondary) 0%, #374151 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        .btn-primary { background: linear-gradient(135deg, var(--primary) 0%, #fb923c 100%); transition: all 0.3s ease; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.4); }
        .sidebar-item { transition: all 0.3s ease; }
        .sidebar-item:hover { transform: translateX(4px); }
        .sidebar-item.active { background: linear-gradient(135deg, var(--primary) 0%, #fb923c 100%); }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-white to-gray-100 font-sans">
    <nav class="gradient-primary shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-utensils text-2xl text-white"></i>
                    <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-white hover:text-orange-100 transition">Kantin Emak Dian</a>
                </div>
                <div class="flex items-center space-x-6">
                    @if(Auth::check())
                        <div class="flex items-center space-x-2 text-white">
                            <i class="fas fa-user-circle text-xl"></i>
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-white text-orange-600 hover:bg-orange-50 font-bold py-2 px-4 rounded-lg transition shadow-md"><i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-orange-100 transition font-semibold">Login</a>
                        <a href="{{ route('register') }}" class="bg-white text-orange-600 hover:bg-orange-50 font-bold py-2 px-4 rounded-lg transition shadow-md">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="@if(Auth::check()) flex @endif">
        @if(Auth::check())
        <aside class="w-64 bg-white shadow-xl">
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6"><i class="fas fa-bars mr-2 text-orange-500"></i>Menu</h3>
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="sidebar-item block py-3 px-4 rounded-lg {{ request()->routeIs('dashboard') ? 'active text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    <a href="{{ route('categories.index') }}" class="sidebar-item block py-3 px-4 rounded-lg {{ request()->routeIs('categories.*') ? 'active text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                        <i class="fas fa-list mr-2"></i>Categories
                    </a>
                    <a href="{{ route('products.index') }}" class="sidebar-item block py-3 px-4 rounded-lg {{ request()->routeIs('products.*') ? 'active text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                        <i class="fas fa-box mr-2"></i>Products
                    </a>
                </nav>
            </div>
        </aside>
        @endif
        <div class="@if(Auth::check()) flex-1 @else w-full @endif max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </div>
    </div>

    <footer class="bg-gray-900 text-white text-center py-6 mt-12">
        <p>&copy; 2026 Kantin Emak Dian - UMKM Management Platform</p>
    </footer>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>