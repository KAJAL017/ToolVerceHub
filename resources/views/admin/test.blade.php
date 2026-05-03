@extends('admin.layouts.app')

@section('title', 'Test Page')
@section('page-title', 'Test Page')
@section('page-subtitle', 'Testing sidebar visibility')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">
        <i class="fas fa-check-circle text-green-600 mr-3"></i>
        Sidebar Test Page
    </h1>
    <p class="text-gray-600 text-lg">
        Agar aap yeh page dekh rahe ho aur left side mein green sidebar dikh raha hai, 
        toh sab kuch sahi kaam kar raha hai!
    </p>
    
    <div class="mt-6 p-4 bg-green-50 border-l-4 border-green-500 rounded">
        <p class="text-green-700 font-semibold">
            ✅ Layout working properly!
        </p>
    </div>
</div>
@endsection
