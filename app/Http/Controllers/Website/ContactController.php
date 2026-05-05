<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|regex:/^[\+]?[(]?[0-9]{1,4}[)]?[-\s\.]?[(]?[0-9]{1,4}[)]?[-\s\.]?[0-9]{4,10}$/|min:10|max:20',
            'subject' => 'required|string|in:general,support,feedback,bug,feature,partnership,other',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'name.required' => 'Please enter your name',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name cannot exceed 100 characters',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'subject.required' => 'Please select a subject',
            'subject.in' => 'Please select a valid subject',
            'message.required' => 'Please enter your message',
            'message.min' => 'Message must be at least 10 characters',
            'message.max' => 'Message cannot exceed 2000 characters',
            'phone.regex' => 'Please enter a valid phone number',
            'phone.min' => 'Phone number must be at least 10 digits',
            'phone.max' => 'Phone number cannot exceed 20 characters',
        ]);

        // Check validation
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store submission
            ContactSubmission::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'status' => 'new'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We\'ll get back to you within 24 hours.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your message. Please try again.'
            ], 500);
        }
    }
}
