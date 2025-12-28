<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contacts;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getallContacts()
    {
        try {
            $contacts = contacts::all()->sortBy('created_at')->reverse();
            return view('admin.contacts.index', compact('contacts'));
        } catch (\Exception $e) {
            return view('admin.contacts.index', ['contacts' => collect()]); 
        }
    }

    /**
     * Display a specific contact.
     */
    public function getcontactById($id)
    {
        try {
            $contact = contacts::findOrFail($id);
            return view('admin.contacts.show', compact('contact'));
        } catch (\Exception $e) {
            return redirect(route('getAllContacts'))->with('error', 'Contact not found.');
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
                'phone' => 'required|string|regex:/^(\+\d{1,3})?\s?[\d\s\-]{8,15}$/|max:20',
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
                'phone.regex' => 'Phone number must be 8-15 digits with optional country code (e.g., +968 95123456 or 95123456).',
                'phone.max' => 'Phone number cannot exceed 20 characters.',
                'designation.max' => 'Designation cannot exceed 100 characters.',
                'company.max' => 'Company name cannot exceed 100 characters.',
                'website.url' => 'Please enter a valid website URL.',
                'website.max' => 'Website URL cannot exceed 255 characters.',
            ]);

            Log::info('Form validation passed', $validated);

            // Map lowercase field names to uppercase for model
            $contact = contacts::create([
                'Name' => $validated['name'],
                'Email' => $validated['email'],
                'Phone' => $validated['phone'],
                'Designation' => $validated['designation'] ?? null,
                'Company' => $validated['company'] ?? null,
                'Website' => $validated['website'] ?? null,
            ]);

            Log::info('Contact created successfully', ['contact_id' => $contact->id]);

            // The model event will automatically dispatch ContactSubmitted event
            // which triggers SendContactNotifications listener to create notifications
        
            return redirect('/')->with('success', 'Thank you! We will contact you soon!');
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage(), ['exception' => $e]);
            // Handle case where table doesn't exist yet
            return redirect('/')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Export contacts to Excel
     */
    public function exportExcel()
    {
        try {
            $contacts = contacts::all();
            
            // Create CSV content for simple export
            $csvContent = "Name,Email,Phone,Designation,Company,Website,Submitted Date\n";
            
            foreach ($contacts as $contact) {
                $row = [
                    $contact->Name,
                    $contact->Email,
                    $contact->Phone,
                    $contact->Designation ?? '',
                    $contact->Company ?? '',
                    $contact->Website ?? '',
                    $contact->created_at->format('Y-m-d H:i:s')
                ];
                
                $csvContent .= implode(',', array_map(function($field) {
                    return $this->escapeCsv($field);
                }, $row)) . "\n";
            }
            
            $filename = 'contacts_' . date('Y-m-d_H-i-s') . '.csv';
            
            return response($csvContent)
                ->header('Content-Type', 'text/csv; charset=UTF-8')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        } catch (\Exception $e) {
            Log::error('Excel export error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to export contacts.');
        }
    }
    
    /**
     * Escape CSV fields
     */
    private function escapeCsv($value)
    {
        if (empty($value)) {
            return '';
        }
        
        if (strpos($value, ',') !== false || strpos($value, '"') !== false || strpos($value, "\n") !== false) {
            return '"' . str_replace('"', '""', $value) . '"';
        }
        
        return $value;
    }

    /**
     * Search contacts
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('q', '');
            
            if (empty($query)) {
                return redirect(route('getAllContacts'));
            }
            
            $contacts = contacts::where('Name', 'like', "%{$query}%")
                ->orWhere('Email', 'like', "%{$query}%")
                ->orWhere('Phone', 'like', "%{$query}%")
                ->orWhere('Company', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
            
            return view('admin.contacts.index', compact('contacts'))->with('searchQuery', $query);
        } catch (\Exception $e) {
            return redirect(route('getAllContacts'))->with('error', 'Search error: ' . $e->getMessage());
        }
    }

    /**
     * Delete a contact
     */
    public function delete($id)
    {
        try {
            $user = Auth::user();
            
            // Check if user is authenticated
            if (!$user) {
                if (request()->expectsJson()) {
                    return response()->json(['error' => 'You must be logged in to delete contacts.'], 401);
                }
                return redirect('/login');
            }
            
            // Check if user has admin role
            if ($user->role !== 'admin') {
                Log::warning('Delete attempt by non-admin user', ['user_id' => $user->id, 'user_role' => $user->role]);
                if (request()->expectsJson()) {
                    return response()->json(['error' => 'You do not have permission to delete contacts.'], 403);
                }
                return redirect()->back()->with('error', 'You do not have permission to delete contacts.');
            }

            $contact = contacts::findOrFail($id);
            $contact->delete();
            Log::info('Contact deleted', ['contact_id' => $id, 'deleted_by' => $user->id]);

            if (request()->expectsJson()) {
                return response()->json(['success' => 'Contact deleted successfully!'], 200);
            }

            return redirect(route('getAllContacts'))->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting contact: ' . $e->getMessage());
            if (request()->expectsJson()) {
                return response()->json(['error' => 'Unable to delete contact or database unavailable.'], 500);
            }
            return redirect()->back()->with('error', 'Unable to delete contact: ' . $e->getMessage());
        }
    }

    /**
     * Update contact notes (admin)
     */
    public function updateAdminNotes(Request $request, $id)
    {
        try {
            if (Auth::user()->role !== 'admin') {
                return redirect('/contacts')->with('error', 'You do not have permission to update notes.');
            }

            $validated = $request->validate([
                'notes' => 'nullable|string|max:1000',
            ]);

            $contact = contacts::findOrFail($id);
            $contact->notes = $validated['notes'];
            $contact->last_communicated_at = now();
            $contact->save();

            return redirect(route('getcontactById', $id))->with('success', 'Notes updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update notes: ' . $e->getMessage());
        }
    }
}