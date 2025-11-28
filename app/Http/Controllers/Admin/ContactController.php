<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contacts;
use Illuminate\Auth\Events\Validated;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getallContacts()
    {
        try {
            $contacts = contacts::all()->sortBy('created_at');
            return view('admin.contacts.index', compact('contacts'));
        } catch (\Exception $e) {
            return view('admin.contacts .index', ['contacts' => collect()]); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try { 
            $validated = request()->validate([
                'name' => 'required|string|min:2|max:100',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|regex:/^[0-9]{8,9}$/|max:20',
                'designation' => 'nullable|string|max:100',
                'company' => 'nullable|string|max:100',
                'website' => 'nullable|url|max:255',
            ], [
                'name.required' => 'Full name is required.',
                'name.min' => 'Full name must be at least 2 characters.',
                'name.max' => 'Full name cannot exceed 100 characters.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => 'Email cannot exceed 255 characters.',
                'phone.required' => 'Phone number is required.',
                'phone.regex' => 'Phone number must be 8-9 digits (e.g., 95123456).',
                'phone.max' => 'Phone number cannot exceed 20 characters.',
                'designation.max' => 'Designation cannot exceed 100 characters.',
                'company.max' => 'Company name cannot exceed 100 characters.',
                'website.url' => 'Please enter a valid website URL.',
                'website.max' => 'Website URL cannot exceed 255 characters.',
            ]);

            // Map lowercase field names to uppercase for model
            contacts::create([
                'Name' => $validated['name'],
                'Email' => $validated['email'],
                'Phone' => $validated['phone'],
                'Designation' => $validated['designation'] ?? null,
                'Company' => $validated['company'] ?? null,
                'Website' => $validated['website'] ?? null,
            ]);
        
            return redirect('/')->with('success', 'Thank you! We will contact you soon!');
        } catch (\Exception $e) {
            // Handle case where table doesn't exist yet
            return redirect('/')->with('error', 'Contact form is temporarily unavailable. Please try again later.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
      public function delete($id)
    {
        try {
            $contact = contacts::findOrFail($id);
            $contact->delete();

            return redirect('/contacts')->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/contacts')->with('error', 'Unable to delete contact or database unavailable.');
        }
    }
}