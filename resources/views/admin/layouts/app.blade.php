<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard') - ToolHub</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Sidebar Styles */
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .sidebar-link {
            transition: all 0.2s ease;
        }
        
        .sidebar-link:hover {
            background: rgba(34, 197, 94, 0.1);
            border-left: 4px solid #22c55e;
            padding-left: 1.25rem;
        }
        
        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(34, 197, 94, 0.15) 0%, rgba(34, 197, 94, 0.05) 100%);
            border-left: 4px solid #22c55e;
            padding-left: 1.25rem;
            color: #15803d;
            font-weight: 600;
        }
        
        /* Smooth Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Card Hover Effect */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #22c55e;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #16a34a;
        }
        
        /* Mobile Menu Toggle */
        @media (max-width: 768px) {
            .mobile-menu-closed {
                transform: translateX(-100%);
            }
            .mobile-menu-open {
                transform: translateX(0);
            }
        }
        
        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body class="bg-gray-50">
    
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar bg-white w-64 flex-shrink-0 border-r border-gray-200 overflow-y-auto fixed md:static h-full z-40 mobile-menu-closed md:translate-x-0">
            
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-tools text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">ToolHub</h1>
                        <p class="text-xs text-gray-500">Admin Portal</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="p-4 space-y-1">
                
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <!-- Blog Management -->
                <div class="pt-4 mt-4 border-t border-gray-200">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Blog Management</p>
                    
                    <a href="{{ route('admin.blogs.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                        <i class="fas fa-blog w-5"></i>
                        <span>All Blogs</span>
                    </a>
                    
                    <a href="{{ route('admin.blogs.create') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-plus-circle w-5"></i>
                        <span>Create New Blog</span>
                    </a>
                    
                    <a href="{{ route('admin.blog-categories.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}">
                        <i class="fas fa-folder w-5"></i>
                        <span>Categories</span>
                    </a>
                </div>
                
                <!-- Settings Section -->
                <div class="pt-4 mt-4 border-t border-gray-200">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Settings</p>
                    
                    <a href="#" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-cog w-5"></i>
                        <span>General Settings</span>
                    </a>
                </div>
                
            </nav>
            
            <!-- User Profile Section -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-white">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-semibold">
                        {{ substr(session('admin_name', 'SA'), 0, 2) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ session('admin_name', 'Super Admin') }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ session('admin_email', 'admin@toolhub.com') }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-colors">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
            
        </aside>
        
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Top Header -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        
                        <!-- Mobile Menu Button & Page Title -->
                        <div class="flex items-center space-x-4">
                            <button id="mobile-menu-btn" class="md:hidden text-gray-600 hover:text-primary-600 focus:outline-none">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                                <p class="text-sm text-gray-500">@yield('page-subtitle', 'Welcome back!')</p>
                            </div>
                        </div>
                        
                        <!-- Header Actions -->
                        <div class="flex items-center space-x-4">
                            
                            <!-- Search -->
                            <div class="hidden md:block relative">
                                <input 
                                    type="text" 
                                    placeholder="Search..." 
                                    class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            
                            <!-- Notifications -->
                            <button class="relative p-2 text-gray-600 hover:text-primary-600 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                            
                            <!-- Messages -->
                            <button class="relative p-2 text-gray-600 hover:text-primary-600 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                            
                        </div>
                        
                    </div>
                </div>
            </header>
            
            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-6">
                
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg fade-in">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                            <p class="text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg fade-in">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3"></i>
                            <p class="text-red-700 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif
                
                <!-- Page Content -->
                <div class="fade-in">
                    @yield('content')
                </div>
                
            </main>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <p>&copy; 2026 ToolHub. All rights reserved.</p>
                    <div class="flex items-center space-x-4">
                        <a href="#" class="hover:text-primary-600 transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-primary-600 transition-colors">Terms of Service</a>
                        <a href="#" class="hover:text-primary-600 transition-colors">Support</a>
                    </div>
                </div>
            </footer>
            
        </div>
        
    </div>
    
    <!-- Mobile Menu Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>
    
    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobile-overlay');
        
        mobileMenuBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('mobile-menu-closed');
            sidebar.classList.toggle('mobile-menu-open');
            mobileOverlay.classList.toggle('hidden');
        });
        
        mobileOverlay?.addEventListener('click', () => {
            sidebar.classList.add('mobile-menu-closed');
            sidebar.classList.remove('mobile-menu-open');
            mobileOverlay.classList.add('hidden');
        });
    </script>
    
    @yield('scripts')
    
</body>
</html>
