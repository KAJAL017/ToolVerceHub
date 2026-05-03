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
            'password' => 'required|min:4',
        ]);

        // Check credentials
        if ($request->email === 'super@gmail.com' && $request->password === '2580') {
            // Store admin session
            session([
                'admin_logged_in' => true,
                'admin_email' => $request->email,
                'admin_name' => 'Super Admin'
            ]);
            
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    /**
     * Show admin dashboard.
     */
    public function dashboard()
    {
        // Check if admin is logged in
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login first']);
        }
        
        return view('admin.dashboard');
    }
    
    /**
     * Handle admin logout.
     */
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_email', 'admin_name']);
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}
