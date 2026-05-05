<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ $websiteName ?? 'ToolHub' }}</title>
    
        <script src="https://cdn.tailwindcss.com"></script>
    
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
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .sidebar-link {
            transition: all 0.2s ease;
        }
        
        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.15);
            border-left: 4px solid white;
            padding-left: 1.25rem;
        }
        
        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid white;
            padding-left: 1.25rem;
            font-weight: 600;
        }
        
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        
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

        #toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            min-width: 300px;
            max-width: 400px;
            padding: 16px 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
            backdrop-filter: blur(10px);
        }

        .toast.success {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
        }

        .toast.error {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .toast.info {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }

        .toast.warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .toast-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 2px;
        }

        .toast-message {
            font-size: 13px;
            opacity: 0.95;
        }

        .toast-close {
            cursor: pointer;
            font-size: 20px;
            opacity: 0.8;
            transition: opacity 0.2s;
            flex-shrink: 0;
        }

        .toast-close:hover {
            opacity: 1;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        .toast.removing {
            animation: slideOut 0.3s ease-in forwards;
        }

        .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 0 0 12px 12px;
            animation: progressBar 5s linear forwards;
        }

        @keyframes progressBar {
            from {
                width: 100%;
            }
            to {
                width: 0%;
            }
        }

        #confirmDialog {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10000;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            animation: fadeIn 0.2s ease-out;
        }

        #confirmDialog.show {
            display: flex;
        }

        .dialog-content {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 450px;
            width: 90%;
            animation: slideUp 0.3s ease-out;
            overflow: hidden;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .dialog-header {
            padding: 24px 24px 16px 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .dialog-body {
            padding: 24px;
        }

        .dialog-footer {
            padding: 16px 24px;
            background: #f9fafb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .dialog-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 24px;
        }

        .dialog-icon.warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
        }

        .dialog-icon.danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        .dialog-icon.info {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #2563eb;
        }

        .custom-select {
            position: relative;
        }

        .custom-select-trigger {
            width: 100%;
            padding: 0.5rem 2.5rem 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s;
        }

        .custom-select-trigger:hover {
            border-color: #22c55e;
        }

        .custom-select-trigger.active {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .custom-select-arrow {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.2s;
            pointer-events: none;
        }

        .custom-select-trigger.active .custom-select-arrow {
            transform: translateY(-50%) rotate(180deg);
        }

        .custom-select-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            margin-top: 0.25rem;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .custom-select-dropdown.show {
            display: block;
            animation: slideDown 0.2s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .custom-select-search {
            padding: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            background: white;
            z-index: 1;
        }

        .custom-select-search input {
            width: 100%;
            padding: 0.5rem 0.75rem 0.5rem 2.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .custom-select-search input:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .custom-select-search i {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .custom-select-options {
            padding: 0.25rem;
        }

        .custom-select-option {
            padding: 0.625rem 0.75rem;
            cursor: pointer;
            border-radius: 0.375rem;
            transition: all 0.15s;
            font-size: 0.875rem;
        }

        .custom-select-option:hover {
            background: #f3f4f6;
        }

        .custom-select-option.selected {
            background: #dcfce7;
            color: #15803d;
            font-weight: 500;
        }

        .custom-select-option.hidden {
            display: none;
        }

        .custom-select-empty {
            padding: 2rem;
            text-align: center;
            color: #9ca3af;
            font-size: 0.875rem;
        }
        
        .custom-multi-select {
            position: relative;
        }
        
        .custom-multi-select select {
            display: none !important;
        }
        
        .custom-multi-select .custom-select-trigger {
            position: relative;
            min-height: 42px;
            padding-right: 2.5rem;
        }
        
        .selected-tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            min-height: 38px;
            align-items: center;
            width: 100%;
        }
        
        .selected-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #22c55e;
            color: white;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .selected-tag i {
            cursor: pointer;
            font-size: 10px;
        }
        
        .selected-tag i:hover {
            opacity: 0.8;
        }
    </style>
    
    @yield('styles')
</head>
<body class="bg-gray-50">
    
    <div id="toast-container"></div>
    
    <div id="confirmDialog">
        <div class="dialog-content">
            <div class="dialog-header">
                <div class="dialog-icon danger" id="dialogIcon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 text-center" id="dialogTitle">Confirm Action</h3>
            </div>
            <div class="dialog-body">
                <p class="text-gray-600 text-center" id="dialogMessage">Are you sure you want to proceed?</p>
            </div>
            <div class="dialog-footer">
                <button type="button" id="dialogCancel" class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition-colors">
                    Cancel
                </button>
                <button type="button" id="dialogConfirm" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                    Delete
                </button>
            </div>
        </div>
    </div>
    
    <div class="flex h-screen overflow-hidden">
        
        <aside id="sidebar" class="sidebar bg-gradient-to-b from-primary-600 to-primary-800 w-64 flex-shrink-0 overflow-y-auto fixed md:static h-full z-40 mobile-menu-closed md:translate-x-0 shadow-xl">
            
            <div class="p-6 border-b border-primary-500 border-opacity-30">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-tools text-primary-600 text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white truncate max-w-[150px]">{{ $websiteName ?? 'ToolHub' }}</h1>
                        <p class="text-xs text-primary-100">Admin Portal</p>
                    </div>
                </div>
            </div>
            
            <nav class="p-4 space-y-1">
                
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <div class="pt-4 mt-4 border-t border-primary-500 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-primary-200 uppercase tracking-wider mb-2">Blog Management</p>
                    
                    <a href="{{ route('admin.blogs.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                        <i class="fas fa-blog w-5"></i>
                        <span>All Blogs</span>
                    </a>
                    
                    <a href="{{ route('admin.blog-categories.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}">
                        <i class="fas fa-folder w-5"></i>
                        <span>Categories</span>
                    </a>
                    
                    <a href="{{ route('admin.blog-tags.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.blog-tags.*') ? 'active' : '' }}">
                        <i class="fas fa-tags w-5"></i>
                        <span>Tags</span>
                    </a>
                </div>
                
                <div class="pt-4 mt-4 border-t border-primary-500 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-primary-200 uppercase tracking-wider mb-2">Tools Management</p>
                    
                    <a href="{{ route('admin.tools.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.tools.*') ? 'active' : '' }}">
                        <i class="fas fa-tools w-5"></i>
                        <span>All Tools</span>
                    </a>
                    
                    <a href="{{ route('admin.tool-categories.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.tool-categories.*') ? 'active' : '' }}">
                        <i class="fas fa-folder-open w-5"></i>
                        <span>Tool Categories</span>
                    </a>
                    
                    <a href="{{ route('admin.tool-tags.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.tool-tags.*') ? 'active' : '' }}">
                        <i class="fas fa-tags w-5"></i>
                        <span>Tool Tags</span>
                    </a>
                </div>
                
                <div class="pt-4 mt-4 border-t border-primary-500 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-primary-200 uppercase tracking-wider mb-2">Content</p>
                    
                    <a href="{{ route('admin.pages.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt w-5"></i>
                        <span>Pages</span>
                    </a>
                    
                    <a href="{{ route('admin.faqs.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                        <i class="fas fa-question-circle w-5"></i>
                        <span>FAQs</span>
                    </a>
                </div>
                
                <div class="pt-4 mt-4 border-t border-primary-500 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-primary-200 uppercase tracking-wider mb-2">Communication</p>
                    
                    <a href="{{ route('admin.contacts.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <i class="fas fa-envelope w-5"></i>
                        <span class="flex-1">Contact Messages</span>
                        @if(isset($unreadContactsCount) && $unreadContactsCount > 0)
                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full min-w-[20px] text-center">
                            {{ $unreadContactsCount > 99 ? '99+' : $unreadContactsCount }}
                        </span>
                        @endif
                    </a>
                </div>
                
                <div class="pt-4 mt-4 border-t border-primary-500 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-primary-200 uppercase tracking-wider mb-2">Settings</p>
                    
                    <div class="space-y-1">
                        <a href="{{ route('admin.settings.general') }}" class="sidebar-link flex items-center space-x-3 px-4 py-2.5 text-white rounded-lg ml-4 {{ request()->routeIs('admin.settings.general') ? 'active' : '' }}">
                            <i class="fas fa-sliders-h w-5 text-sm"></i>
                            <span class="text-sm">General</span>
                        </a>
                        
                        <a href="{{ route('admin.settings.homepage') }}" class="sidebar-link flex items-center space-x-3 px-4 py-2.5 text-white rounded-lg ml-4 {{ request()->routeIs('admin.settings.homepage') ? 'active' : '' }}">
                            <i class="fas fa-home w-5 text-sm"></i>
                            <span class="text-sm">Homepage</span>
                        </a>
                        
                        <a href="{{ route('admin.settings.advertisements') }}" class="sidebar-link flex items-center space-x-3 px-4 py-2.5 text-white rounded-lg ml-4 {{ request()->routeIs('admin.settings.advertisements') ? 'active' : '' }}">
                            <i class="fas fa-ad w-5 text-sm"></i>
                            <span class="text-sm">Advertisements</span>
                        </a>
                        
                        <a href="{{ route('admin.settings.seo') }}" class="sidebar-link flex items-center space-x-3 px-4 py-2.5 text-white rounded-lg ml-4 {{ request()->routeIs('admin.settings.seo') ? 'active' : '' }}">
                            <i class="fas fa-chart-line w-5 text-sm"></i>
                            <span class="text-sm">SEO</span>
                        </a>
                        
                        <a href="{{ route('admin.settings.security') }}" class="sidebar-link flex items-center space-x-3 px-4 py-2.5 text-white rounded-lg ml-4 {{ request()->routeIs('admin.settings.security') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt w-5 text-sm"></i>
                            <span class="text-sm">Security</span>
                        </a>
                        
                        <a href="{{ route('admin.settings.social-media') }}" class="sidebar-link flex items-center space-x-3 px-4 py-2.5 text-white rounded-lg ml-4 {{ request()->routeIs('admin.settings.social-media') ? 'active' : '' }}">
                            <i class="fas fa-share-alt w-5 text-sm"></i>
                            <span class="text-sm">Social Media</span>
                        </a>
                    </div>
                </div>
                
            </nav>
            
        </aside>
        
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        
                        <div class="flex items-center space-x-4">
                            <button id="mobile-menu-btn" class="md:hidden text-gray-600 hover:text-primary-600 focus:outline-none">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                                <p class="text-sm text-gray-500">@yield('page-subtitle', 'Welcome back!')</p>
                            </div>
                        </div>
                        
                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button id="profileDropdownBtn" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors focus:outline-none">
                                <div class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold shadow-md">
                                    {{ substr(session('admin_name', 'SA'), 0, 2) }}
                                </div>
                                <div class="hidden md:block text-left">
                                    <p class="text-sm font-semibold text-gray-800">{{ session('admin_name', 'Super Admin') }}</p>
                                    <p class="text-xs text-gray-500">{{ session('admin_email', 'admin@toolhub.com') }}</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50">
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 hover:bg-red-50 transition-colors text-left">
                                        <i class="fas fa-sign-out-alt text-red-500 w-5"></i>
                                        <span class="text-sm text-red-600 font-medium">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </header>
            
            <main class="flex-1 overflow-y-auto p-6">
                
                <div class="fade-in">
                    @yield('content')
                </div>
                
            </main>
            
        </div>
        
    </div>
    
        <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>
    
        <script>

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

        // Profile Dropdown Toggle
        const profileDropdownBtn = document.getElementById('profileDropdownBtn');
        const profileDropdown = document.getElementById('profileDropdown');
        
        profileDropdownBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (profileDropdown && !profileDropdown.contains(e.target) && !profileDropdownBtn.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        function showToast(message, type = 'success', title = null) {
            const container = document.getElementById('toast-container');
            
            const icons = {
                success: 'fa-check-circle',
                error: 'fa-times-circle',
                warning: 'fa-exclamation-triangle',
                info: 'fa-info-circle'
            };

            const titles = {
                success: title || 'Success!',
                error: title || 'Error!',
                warning: title || 'Warning!',
                info: title || 'Info'
            };

            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.style.position = 'relative';
            toast.innerHTML = `
                <div class="toast-icon">
                    <i class="fas ${icons[type]}"></i>
                </div>
                <div class="toast-content">
                    <div class="toast-title">${titles[type]}</div>
                    <div class="toast-message">${message}</div>
                </div>
                <div class="toast-close">
                    <i class="fas fa-times"></i>
                </div>
                <div class="toast-progress"></div>
            `;

            const closeBtn = toast.querySelector('.toast-close');
            closeBtn.addEventListener('click', () => {
                removeToast(toast);
            });

            container.appendChild(toast);

            setTimeout(() => {
                removeToast(toast);
            }, 5000);
        }

        function removeToast(toast) {
            toast.classList.add('removing');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }

        window.showToast = showToast;

        function showConfirmDialog(options = {}) {
            return new Promise((resolve) => {
                const dialog = document.getElementById('confirmDialog');
                const title = document.getElementById('dialogTitle');
                const message = document.getElementById('dialogMessage');
                const icon = document.getElementById('dialogIcon');
                const confirmBtn = document.getElementById('dialogConfirm');
                const cancelBtn = document.getElementById('dialogCancel');

                title.textContent = options.title || 'Confirm Action';
                message.textContent = options.message || 'Are you sure you want to proceed?';
                confirmBtn.textContent = options.confirmText || 'Delete';
                cancelBtn.textContent = options.cancelText || 'Cancel';

                icon.className = 'dialog-icon ' + (options.type || 'danger');
                
                const icons = {
                    danger: 'fa-exclamation-triangle',
                    warning: 'fa-exclamation-circle',
                    info: 'fa-info-circle'
                };
                icon.querySelector('i').className = 'fas ' + (icons[options.type] || icons.danger);

                const confirmColors = {
                    danger: 'bg-red-600 hover:bg-red-700',
                    warning: 'bg-yellow-600 hover:bg-yellow-700',
                    info: 'bg-blue-600 hover:bg-blue-700'
                };
                confirmBtn.className = 'px-5 py-2.5 text-white font-semibold rounded-lg transition-colors ' + (confirmColors[options.type] || confirmColors.danger);

                dialog.classList.add('show');

                function handleConfirm() {
                    dialog.classList.remove('show');
                    cleanup();
                    resolve(true);
                }

                function handleCancel() {
                    dialog.classList.remove('show');
                    cleanup();
                    resolve(false);
                }

                function cleanup() {
                    confirmBtn.removeEventListener('click', handleConfirm);
                    cancelBtn.removeEventListener('click', handleCancel);
                    dialog.removeEventListener('click', handleBackdropClick);
                }

                function handleBackdropClick(e) {
                    if (e.target === dialog) {
                        handleCancel();
                    }
                }

                confirmBtn.addEventListener('click', handleConfirm);
                cancelBtn.addEventListener('click', handleCancel);
                dialog.addEventListener('click', handleBackdropClick);
            });
        }

        window.showConfirmDialog = showConfirmDialog;

        function initCustomSelect(selectElement) {
            const wrapper = document.createElement('div');
            wrapper.className = 'custom-select';
            selectElement.parentNode.insertBefore(wrapper, selectElement);
            wrapper.appendChild(selectElement);
            selectElement.style.display = 'none';

            const trigger = document.createElement('div');
            trigger.className = 'custom-select-trigger';
            trigger.innerHTML = `
                <span class="custom-select-value">${selectElement.options[selectElement.selectedIndex]?.text || 'Select an option'}</span>
                <i class="fas fa-chevron-down custom-select-arrow text-gray-400"></i>
            `;
            wrapper.appendChild(trigger);

            const dropdown = document.createElement('div');
            dropdown.className = 'custom-select-dropdown';
            
            const searchBox = document.createElement('div');
            searchBox.className = 'custom-select-search';
            searchBox.innerHTML = `
                <div style="position: relative;">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search..." class="custom-select-search-input">
                </div>
            `;
            dropdown.appendChild(searchBox);

            const optionsContainer = document.createElement('div');
            optionsContainer.className = 'custom-select-options';
            
            Array.from(selectElement.options).forEach((option, index) => {
                if (option.value === '') return;
                
                const optionDiv = document.createElement('div');
                optionDiv.className = 'custom-select-option';
                optionDiv.textContent = option.text;
                optionDiv.dataset.value = option.value;
                optionDiv.dataset.index = index;
                
                if (option.selected) {
                    optionDiv.classList.add('selected');
                }
                
                optionDiv.addEventListener('click', () => {
                    selectElement.selectedIndex = index;
                    trigger.querySelector('.custom-select-value').textContent = option.text;
                    
                    optionsContainer.querySelectorAll('.custom-select-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    optionDiv.classList.add('selected');
                    
                    dropdown.classList.remove('show');
                    trigger.classList.remove('active');
                    
                    const event = new Event('change', { bubbles: true });
                    selectElement.dispatchEvent(event);
                });
                
                optionsContainer.appendChild(optionDiv);
            });
            
            dropdown.appendChild(optionsContainer);
            wrapper.appendChild(dropdown);

            const searchInput = searchBox.querySelector('.custom-select-search-input');
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const options = optionsContainer.querySelectorAll('.custom-select-option');
                let hasVisible = false;
                
                options.forEach(option => {
                    const text = option.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        option.classList.remove('hidden');
                        hasVisible = true;
                    } else {
                        option.classList.add('hidden');
                    }
                });
                
                let emptyState = optionsContainer.querySelector('.custom-select-empty');
                if (!hasVisible) {
                    if (!emptyState) {
                        emptyState = document.createElement('div');
                        emptyState.className = 'custom-select-empty';
                        emptyState.innerHTML = '<i class="fas fa-search text-2xl mb-2"></i><br>No results found';
                        optionsContainer.appendChild(emptyState);
                    }
                } else if (emptyState) {
                    emptyState.remove();
                }
            });

            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                const isActive = trigger.classList.contains('active');
                
                document.querySelectorAll('.custom-select-trigger.active').forEach(t => {
                    t.classList.remove('active');
                });
                document.querySelectorAll('.custom-select-dropdown.show').forEach(d => {
                    d.classList.remove('show');
                });
                
                if (!isActive) {
                    trigger.classList.add('active');
                    dropdown.classList.add('show');
                    searchInput.value = '';
                    searchInput.focus();
                    
                    optionsContainer.querySelectorAll('.custom-select-option').forEach(opt => {
                        opt.classList.remove('hidden');
                    });
                    const emptyState = optionsContainer.querySelector('.custom-select-empty');
                    if (emptyState) emptyState.remove();
                }
            });

            document.addEventListener('click', (e) => {
                if (!wrapper.contains(e.target)) {
                    trigger.classList.remove('active');
                    dropdown.classList.remove('show');
                }
            });
        }

        window.initCustomSelect = initCustomSelect;
        
        function initCustomMultiSelect(selectElement) {
            const wrapper = document.createElement('div');
            wrapper.className = 'custom-multi-select';
            selectElement.parentNode.insertBefore(wrapper, selectElement);
            wrapper.appendChild(selectElement);
            selectElement.style.display = 'none';

            const trigger = document.createElement('div');
            trigger.className = 'custom-select-trigger';
            
            const selectedContainer = document.createElement('div');
            selectedContainer.className = 'selected-tags-container';
            selectedContainer.style.cssText = 'display: flex; flex-wrap: wrap; gap: 6px; min-height: 38px; align-items: center;';
            
            const placeholder = document.createElement('span');
            placeholder.className = 'custom-select-placeholder';
            placeholder.textContent = 'Select tags...';
            placeholder.style.color = '#9ca3af';
            selectedContainer.appendChild(placeholder);
            
            trigger.appendChild(selectedContainer);
            
            const arrow = document.createElement('i');
            arrow.className = 'fas fa-chevron-down custom-select-arrow text-gray-400';
            arrow.style.cssText = 'position: absolute; right: 12px; top: 50%; transform: translateY(-50%);';
            trigger.appendChild(arrow);
            
            wrapper.appendChild(trigger);

            const dropdown = document.createElement('div');
            dropdown.className = 'custom-select-dropdown';
            
            const searchBox = document.createElement('div');
            searchBox.className = 'custom-select-search';
            searchBox.innerHTML = `
                <div style="position: relative;">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search tags..." class="custom-select-search-input">
                </div>
            `;
            dropdown.appendChild(searchBox);

            const optionsContainer = document.createElement('div');
            optionsContainer.className = 'custom-select-options';
            optionsContainer.style.maxHeight = '200px';
            
            const selectedValues = new Set();
            
            function updateSelectedDisplay() {
                selectedContainer.innerHTML = '';
                
                if (selectedValues.size === 0) {
                    placeholder.textContent = 'Select tags...';
                    placeholder.style.color = '#9ca3af';
                    selectedContainer.appendChild(placeholder);
                } else {
                    selectedValues.forEach(value => {
                        const tag = document.createElement('span');
                        tag.className = 'selected-tag';
                        tag.style.cssText = 'display: inline-flex; align-items: center; gap: 4px; background: #22c55e; color: white; padding: 4px 8px; border-radius: 6px; font-size: 12px; font-weight: 500;';
                        tag.innerHTML = `
                            ${value}
                            <i class="fas fa-times" style="cursor: pointer; font-size: 10px;"></i>
                        `;
                        
                        tag.querySelector('i').addEventListener('click', (e) => {
                            e.stopPropagation();
                            selectedValues.delete(value);
                            updateSelectedDisplay();
                            updateOptions();
                        });
                        
                        selectedContainer.appendChild(tag);
                    });
                }
                
                const arrow = document.createElement('i');
                arrow.className = 'fas fa-chevron-down custom-select-arrow text-gray-400';
                arrow.style.cssText = 'position: absolute; right: 12px; top: 50%; transform: translateY(-50%);';
                trigger.appendChild(arrow);
            }
            
            function updateOptions() {
                optionsContainer.innerHTML = '';
                
                Array.from(selectElement.options).forEach((option) => {
                    if (option.value === '') return;
                    
                    const optionDiv = document.createElement('div');
                    optionDiv.className = 'custom-select-option';
                    optionDiv.style.cssText = 'display: flex; align-items: center; gap: 8px;';
                    
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.checked = selectedValues.has(option.value);
                    checkbox.style.cssText = 'width: 16px; height: 16px; cursor: pointer;';
                    
                    const label = document.createElement('span');
                    label.textContent = option.text;
                    label.style.flex = '1';
                    
                    optionDiv.appendChild(checkbox);
                    optionDiv.appendChild(label);
                    
                    if (selectedValues.has(option.value)) {
                        optionDiv.classList.add('selected');
                    }
                    
                    optionDiv.addEventListener('click', (e) => {
                        e.stopPropagation();
                        
                        if (selectedValues.has(option.value)) {
                            selectedValues.delete(option.value);
                        } else {
                            selectedValues.add(option.value);
                        }
                        
                        updateSelectedDisplay();
                        updateOptions();
                    });
                    
                    optionsContainer.appendChild(optionDiv);
                });
            }
            
            updateOptions();
            dropdown.appendChild(optionsContainer);
            wrapper.appendChild(dropdown);

            const searchInput = searchBox.querySelector('.custom-select-search-input');
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const options = optionsContainer.querySelectorAll('.custom-select-option');
                let hasVisible = false;
                
                options.forEach(option => {
                    const text = option.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        option.classList.remove('hidden');
                        hasVisible = true;
                    } else {
                        option.classList.add('hidden');
                    }
                });
                
                let emptyState = optionsContainer.querySelector('.custom-select-empty');
                if (!hasVisible) {
                    if (!emptyState) {
                        emptyState = document.createElement('div');
                        emptyState.className = 'custom-select-empty';
                        emptyState.innerHTML = '<i class="fas fa-search text-2xl mb-2"></i><br>No results found';
                        optionsContainer.appendChild(emptyState);
                    }
                } else if (emptyState) {
                    emptyState.remove();
                }
            });

            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                const isActive = trigger.classList.contains('active');
                
                document.querySelectorAll('.custom-select-trigger.active').forEach(t => {
                    t.classList.remove('active');
                });
                document.querySelectorAll('.custom-select-dropdown.show').forEach(d => {
                    d.classList.remove('show');
                });
                
                if (!isActive) {
                    trigger.classList.add('active');
                    dropdown.classList.add('show');
                    searchInput.value = '';
                    searchInput.focus();
                    
                    optionsContainer.querySelectorAll('.custom-select-option').forEach(opt => {
                        opt.classList.remove('hidden');
                    });
                    const emptyState = optionsContainer.querySelector('.custom-select-empty');
                    if (emptyState) emptyState.remove();
                }
            });

            document.addEventListener('click', (e) => {
                if (!wrapper.contains(e.target)) {
                    trigger.classList.remove('active');
                    dropdown.classList.remove('show');
                }
            });
            
            selectElement.form?.addEventListener('submit', () => {
                Array.from(selectElement.options).forEach(option => {
                    option.selected = selectedValues.has(option.value);
                });
            });
        }

        window.initCustomMultiSelect = initCustomMultiSelect;
    </script>
    
    @yield('scripts')
    
</body>
</html>



