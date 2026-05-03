@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview of your business metrics')

@section('content')

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    
    <!-- Total Users Card -->
    <div class="card-hover bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Users</p>
                <h3 class="text-3xl font-bold text-gray-800">1,234</h3>
                <p class="text-sm text-green-600 mt-2">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span class="font-semibold">12.5%</span> from last month
                </p>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-users text-white text-2xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Active Tools Card -->
    <div class="card-hover bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Active Tools</p>
                <h3 class="text-3xl font-bold text-gray-800">56</h3>
                <p class="text-sm text-green-600 mt-2">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span class="font-semibold">8.2%</span> from last month
                </p>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-toolbox text-white text-2xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Revenue Card -->
    <div class="card-hover bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Revenue</p>
                <h3 class="text-3xl font-bold text-gray-800">$45.2K</h3>
                <p class="text-sm text-green-600 mt-2">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span class="font-semibold">23.1%</span> from last month
                </p>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-dollar-sign text-white text-2xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Orders Card -->
    <div class="card-hover bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Orders</p>
                <h3 class="text-3xl font-bold text-gray-800">892</h3>
                <p class="text-sm text-red-600 mt-2">
                    <i class="fas fa-arrow-down mr-1"></i>
                    <span class="font-semibold">3.4%</span> from last month
                </p>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-shopping-cart text-white text-2xl"></i>
            </div>
        </div>
    </div>
    
</div>

<!-- Charts & Tables Row -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    
    <!-- Revenue Chart -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Revenue Overview</h3>
                <p class="text-sm text-gray-500">Monthly revenue statistics</p>
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                <option>Last 6 Months</option>
                <option>Last Year</option>
                <option>All Time</option>
            </select>
        </div>
        
        <!-- Simple Bar Chart Representation -->
        <div class="space-y-4">
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-gray-600 w-16">Jan</span>
                <div class="flex-1 bg-gray-100 rounded-full h-8 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-500 to-primary-600 h-full rounded-full flex items-center justify-end pr-3" style="width: 75%;">
                        <span class="text-xs font-semibold text-white">$32.5K</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-gray-600 w-16">Feb</span>
                <div class="flex-1 bg-gray-100 rounded-full h-8 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-500 to-primary-600 h-full rounded-full flex items-center justify-end pr-3" style="width: 85%;">
                        <span class="text-xs font-semibold text-white">$38.2K</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-gray-600 w-16">Mar</span>
                <div class="flex-1 bg-gray-100 rounded-full h-8 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-500 to-primary-600 h-full rounded-full flex items-center justify-end pr-3" style="width: 65%;">
                        <span class="text-xs font-semibold text-white">$28.9K</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-gray-600 w-16">Apr</span>
                <div class="flex-1 bg-gray-100 rounded-full h-8 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-500 to-primary-600 h-full rounded-full flex items-center justify-end pr-3" style="width: 95%;">
                        <span class="text-xs font-semibold text-white">$42.8K</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-gray-600 w-16">May</span>
                <div class="flex-1 bg-gray-100 rounded-full h-8 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-500 to-primary-600 h-full rounded-full flex items-center justify-end pr-3" style="width: 100%;">
                        <span class="text-xs font-semibold text-white">$45.2K</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Top Categories -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="mb-6">
            <h3 class="text-lg font-bold text-gray-800">Top Categories</h3>
            <p class="text-sm text-gray-500">Best performing categories</p>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-wrench text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Hand Tools</p>
                        <p class="text-xs text-gray-500">234 sales</p>
                    </div>
                </div>
                <span class="text-sm font-bold text-gray-800">$12.5K</span>
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hammer text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Power Tools</p>
                        <p class="text-xs text-gray-500">189 sales</p>
                    </div>
                </div>
                <span class="text-sm font-bold text-gray-800">$10.2K</span>
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-screwdriver text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Accessories</p>
                        <p class="text-xs text-gray-500">156 sales</p>
                    </div>
                </div>
                <span class="text-sm font-bold text-gray-800">$8.9K</span>
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-toolbox text-orange-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Tool Sets</p>
                        <p class="text-xs text-gray-500">142 sales</p>
                    </div>
                </div>
                <span class="text-sm font-bold text-gray-800">$7.8K</span>
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cogs text-red-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Equipment</p>
                        <p class="text-xs text-gray-500">98 sales</p>
                    </div>
                </div>
                <span class="text-sm font-bold text-gray-800">$5.8K</span>
            </div>
        </div>
    </div>
    
</div>

<!-- Recent Orders & Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <!-- Recent Orders -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Recent Orders</h3>
                <p class="text-sm text-gray-500">Latest customer orders</p>
            </div>
            <a href="#" class="text-sm font-semibold text-primary-600 hover:text-primary-700">View All</a>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold text-blue-600">JD</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">John Doe</p>
                        <p class="text-xs text-gray-500">Order #12345</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">$245.00</p>
                    <span class="inline-block px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Completed</span>
                </div>
            </div>
            
            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold text-purple-600">SM</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Sarah Miller</p>
                        <p class="text-xs text-gray-500">Order #12344</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">$189.50</p>
                    <span class="inline-block px-2 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                </div>
            </div>
            
            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold text-green-600">RJ</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Robert Johnson</p>
                        <p class="text-xs text-gray-500">Order #12343</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">$567.00</p>
                    <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Processing</span>
                </div>
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold text-orange-600">EB</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Emily Brown</p>
                        <p class="text-xs text-gray-500">Order #12342</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">$324.75</p>
                    <span class="inline-block px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Completed</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Recent Activity</h3>
                <p class="text-sm text-gray-500">Latest system activities</p>
            </div>
            <a href="#" class="text-sm font-semibold text-primary-600 hover:text-primary-700">View All</a>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user-plus text-green-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800"><span class="font-semibold">New user registered</span></p>
                    <p class="text-xs text-gray-500">2 minutes ago</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-shopping-cart text-blue-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800"><span class="font-semibold">New order placed</span> - Order #12345</p>
                    <p class="text-xs text-gray-500">15 minutes ago</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-box text-purple-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800"><span class="font-semibold">Product updated</span> - Hammer Drill Pro</p>
                    <p class="text-xs text-gray-500">1 hour ago</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-star text-orange-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800"><span class="font-semibold">New review received</span> - 5 stars</p>
                    <p class="text-xs text-gray-500">2 hours ago</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800"><span class="font-semibold">Low stock alert</span> - Screwdriver Set</p>
                    <p class="text-xs text-gray-500">3 hours ago</p>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
