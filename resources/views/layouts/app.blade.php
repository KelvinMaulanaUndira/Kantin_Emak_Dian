<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Emak Dian - Premium UMKM Management Platform</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --primary-light: #fed7aa;
            --secondary: #1f2937;
            --accent: #06b6d4;
            --success: #10b981;
            --danger: #ef4444;
        }
        html { scroll-behavior: smooth; }
        body { 
            font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif;
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f4ff 100%);
            min-height: 100vh;
        }
        h1, h2, h3, h4, h5, h6 { font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .gradient-primary { background: linear-gradient(135deg, var(--primary) 0%, #fb923c 100%); }
        .gradient-premium { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .gradient-sunset { background: linear-gradient(135deg, #f97316 0%, #fbbf24 100%); }
        .glass-effect { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .card-premium {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .card-premium:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        }
        .btn-premium {
            background: linear-gradient(135deg, var(--primary) 0%, #fb923c 100%);
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }
        .btn-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
        }
        .btn-premium:hover::before { left: 100%; }
        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(249, 115, 22, 0.4);
        }
        .sidebar-premium {
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }
        .sidebar-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 0;
            background: var(--primary);
            transition: height 0.3s ease;
        }
        .sidebar-item:hover { 
            transform: translateX(6px);
            background: rgba(249, 115, 22, 0.08);
        }
        .sidebar-item.active {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.15) 0%, rgba(251, 146, 60, 0.1) 100%);
            color: var(--primary);
            font-weight: 600;
        }
        .sidebar-item.active::before { height: 100%; }
        .nav-premium {
            background: linear-gradient(135deg, var(--primary) 0%, #fb923c 100%);
            box-shadow: 0 10px 40px rgba(249, 115, 22, 0.2);
        }
        .stat-card {
            position: relative;
            overflow: hidden;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .stat-card:hover::before { opacity: 1; }
    </style>
</head>
<body>
    <!-- Premium Navigation -->
    <nav class="nav-premium sticky top-0 z-50 border-b border-orange-400 border-opacity-20">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-utensils text-2xl text-orange-600"></i>
                    </div>
                    <div>
                        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-white hover:text-orange-100 transition block">Kantin Emak Dian</a>
                        <p class="text-orange-100 text-xs font-medium">Premium UMKM Platform</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    @if(Auth::check())
                        <div class="flex items-center space-x-3 text-white">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-lg"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">{{ Auth::user()->name }}</p>
                                <p class="text-orange-100 text-xs">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-white hover:bg-orange-50 text-orange-600 font-bold py-2.5 px-5 rounded-lg transition shadow-md hover:shadow-lg"><i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-orange-100 transition font-semibold">Login</a>
                        <a href="{{ route('register') }}" class="bg-white hover:bg-orange-50 text-orange-600 font-bold py-2.5 px-5 rounded-lg transition shadow-md hover:shadow-lg">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="@if(Auth::check()) flex @endif min-h-screen">
        @if(Auth::check())
        <!-- Sidebar Premium -->
        <aside class="sidebar-premium w-72 border-r border-gray-200 overflow-y-auto">
            <div class="p-8">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-8 flex items-center">
                    <i class="fas fa-compass mr-3 text-orange-500"></i>Navigation
                </h3>
                <nav class="space-y-3">
                    <a href="{{ route('dashboard') }}" class="sidebar-item block py-3.5 px-4 rounded-xl {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home mr-3 text-lg"></i><span>Dashboard</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class="sidebar-item block py-3.5 px-4 rounded-xl {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="fas fa-layer-group mr-3 text-lg"></i><span>Categories</span>
                    </a>
                    <a href="{{ route('products.index') }}" class="sidebar-item block py-3.5 px-4 rounded-xl {{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-bag mr-3 text-lg"></i><span>Products</span>
                    </a>
                </nav>

                <div class="mt-12 p-6 bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl border border-orange-200">
                    <i class="fas fa-lightbulb text-3xl text-orange-500 mb-3 block"></i>
                    <h4 class="font-bold text-gray-900 mb-2">Pro Tips</h4>
                    <p class="text-sm text-gray-700">Manage your catalog efficiently with categories and high-quality product photos.</p>
                </div>
            </div>
        </aside>
        @endif

        <!-- Main Content -->
        <div class="@if(Auth::check()) flex-1 @else w-full @endif">
            <main class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-12">
                @yield('content')
            </main>

            <!-- Premium Footer -->
            <footer class="gradient-sunset text-white mt-16">
                <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-12">
                    <div class="grid grid-cols-3 gap-8 mb-8">
                        <div>
                            <h4 class="font-bold mb-4">About Platform</h4>
                            <p class="text-orange-100 text-sm">Kantin Emak Dian - Platform manajemen UMKM profesional untuk bisnis Anda.</p>
                        </div>
                        <div>
                            <h4 class="font-bold mb-4">Features</h4>
                            <ul class="text-orange-100 text-sm space-y-2">
                                <li><i class="fas fa-check mr-2"></i>Category Management</li>
                                <li><i class="fas fa-check mr-2"></i>Product Upload</li>
                                <li><i class="fas fa-check mr-2"></i>Secure Storage</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold mb-4">Support</h4>
                            <p class="text-orange-100 text-sm">Email: support@kantindian.com</p>
                        </div>
                    </div>
                    <div class="border-t border-orange-400 border-opacity-30 pt-8 text-center">
                        <p class="text-orange-100">&copy; 2026 Kantin Emak Dian - Premium UMKM Management Platform. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>