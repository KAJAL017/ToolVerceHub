<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Add your authentication logic here
        
        return redirect()->route('admin.dashboard');
    }

    /**
     * Show admin dashboard.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
