<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - ToolHub</title>
    
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
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #14532d 0%, #166534 50%, #15803d 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .input-focus:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        }
        
        .floating-animation {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-animation"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-animation" style="animation-delay: 1s;"></div>
        <div class="absolute -bottom-20 left-1/2 w-72 h-72 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-animation" style="animation-delay: 2s;"></div>
    </div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-6xl mx-auto fade-in">
        <div class="grid md:grid-cols-2 gap-0 rounded-2xl overflow-hidden shadow-2xl">
            
            <!-- Left Side - Branding & Info -->
            <div class="bg-gradient-to-br from-primary-800 to-primary-900 p-12 flex flex-col justify-between text-white relative overflow-hidden">
                
                <!-- Decorative Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 left-0 w-full h-full" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                </div>
                
                <div class="relative z-10">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-tools text-primary-600 text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">ToolHub</h1>
                            <p class="text-primary-200 text-sm">Admin Portal</p>
                        </div>
                    </div>
                    
                    <!-- Welcome Message -->
                    <div class="space-y-4">
                        <h2 class="text-4xl font-bold leading-tight">Welcome Back to Your Dashboard</h2>
                        <p class="text-primary-100 text-lg">Manage your enterprise tools and resources efficiently with our comprehensive admin platform.</p>
                    </div>
                </div>
                
                <!-- Features List -->
                <div class="relative z-10 space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-700 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shield-alt text-primary-200"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Secure Authentication</h3>
                            <p class="text-primary-200 text-sm">Enterprise-grade security protocols</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-700 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-line text-primary-200"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Real-time Analytics</h3>
                            <p class="text-primary-200 text-sm">Monitor your business metrics</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-700 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users-cog text-primary-200"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Team Management</h3>
                            <p class="text-primary-200 text-sm">Collaborate with your team seamlessly</p>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="relative z-10 pt-8 border-t border-primary-700">
                    <p class="text-primary-200 text-sm">&copy; 2026 ToolHub. All rights reserved.</p>
                </div>
            </div>
            
            <!-- Right Side - Login Form -->
            <div class="glass-effect p-12 flex items-center">
                <div class="w-full">
                    
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Admin Login</h2>
                        <p class="text-gray-600">Enter your credentials to access the dashboard</p>
                    </div>
                    
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-red-700 text-sm">{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Login Form -->
                    <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-primary-600 mr-2"></i>Email Address
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300"
                                placeholder="admin@toolhub.com"
                            >
                        </div>
                        
                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock text-primary-600 mr-2"></i>Password
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300"
                                    placeholder="Enter your password"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword()"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-primary-600 transition-colors"
                                >
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full btn-primary text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-primary-300"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>Sign In to Dashboard
                        </button>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- JavaScript for Password Toggle -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
    
</body>
</html>
