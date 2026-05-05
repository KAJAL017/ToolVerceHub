<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of contact messages.
     */
    public function index(Request $request)
    {
        // Check if admin is logged in
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login first']);
        }
        
        $query = ContactSubmission::query();
        
        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }
        
        // Search functionality
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('subject', 'like', '%' . $search . '%')
                  ->orWhere('message', 'like', '%' . $search . '%');
            });
        }
        
        // Get contacts with pagination
        $contacts = $query->latest()->paginate(15);
        
        // Get statistics
        $stats = [
            'total' => ContactSubmission::count(),
            'unread' => ContactSubmission::where('is_read', false)->count(),
            'read' => ContactSubmission::where('is_read', true)->count(),
            'today' => ContactSubmission::whereDate('created_at', today())->count(),
            'this_week' => ContactSubmission::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => ContactSubmission::whereMonth('created_at', now()->month)->count(),
        ];
        
        return view('admin.contacts.index', compact('contacts', 'stats'));
    }
    
    /**
     * Display the specified contact message.
     */
    public function show($id)
    {
        // Check if admin is logged in
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login first']);
        }
        
        $contact = ContactSubmission::findOrFail($id);
        
        // Mark as read if not already read
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }
    
    /**
     * Mark contact as read/unread.
     */
    public function toggleRead($id)
    {
        // Check if admin is logged in
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $contact = ContactSubmission::findOrFail($id);
        $contact->update(['is_read' => !$contact->is_read]);
        
        return response()->json([
            'success' => true,
            'is_read' => $contact->is_read,
            'message' => $contact->is_read ? 'Marked as read' : 'Marked as unread'
        ]);
    }
    
    /**
     * Delete the specified contact message.
     */
    public function destroy($id)
    {
        // Check if admin is logged in
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $contact = ContactSubmission::findOrFail($id);
        $contact->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Contact message deleted successfully'
        ]);
    }
    
    /**
     * Bulk actions for contact messages.
     */
    public function bulkAction(Request $request)
    {
        // Check if admin is logged in
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $request->validate([
            'action' => 'required|in:mark_read,mark_unread,delete',
            'ids' => 'required|array',
            'ids.*' => 'exists:contact_submissions,id'
        ]);
        
        $contacts = ContactSubmission::whereIn('id', $request->ids);
        
        switch ($request->action) {
            case 'mark_read':
                $contacts->update(['is_read' => true]);
                $message = 'Selected messages marked as read';
                break;
            case 'mark_unread':
                $contacts->update(['is_read' => false]);
                $message = 'Selected messages marked as unread';
                break;
            case 'delete':
                $contacts->delete();
                $message = 'Selected messages deleted successfully';
                break;
        }
        
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}