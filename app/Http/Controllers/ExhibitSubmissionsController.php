<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExhibitSubmission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\ExhibitSubmissionNotification;

class ExhibitSubmissionsController extends Controller
{
    /**
     * Display a listing of the resource (Admin).
     */
    public function getAllExhibitSubmissions()
    {
        try {
            $submissions = ExhibitSubmission::all()->sortBy('created_at')->reverse();
            return view('admin.exhibitsubmissions.index', compact('submissions'));
        } catch (\Exception $e) {
            return view('admin.exhibitsubmissions.index', ['submissions' => collect()]); 
        }   
    }

    /**
     * Display a listing of the resource (User).
     */
    public function userIndex()
    {
        try {
            $submissions = ExhibitSubmission::all()->sortBy('created_at')->reverse();
            return view('user.exhibitsubmissions.index', compact('submissions'));
        } catch (\Exception $e) {
            return view('user.exhibitsubmissions.index', ['submissions' => collect()]); 
        }   
    }

    /**
     * Display the specified resource (Admin).
     */
    public function show($id)
    {
        try {
            $submission = ExhibitSubmission::findOrFail($id);
            return view('admin.exhibitsubmissions.show', compact('submission'));
        } catch (\Exception $e) {
            return redirect(route('exhibit-submissions.index'))->with('error', 'Submission not found.');
        }
    }

    /**
     * Display the specified resource (User).
     */
    public function userShow($id)
    {
        try {
            $submission = ExhibitSubmission::findOrFail($id);
            return view('user.exhibitsubmissions.show', compact('submission'));
        } catch (\Exception $e) {
            return redirect(route('user.exhibit-submissions.index'))->with('error', 'Submission not found.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $validated = request()->validate([
            'contact_person' => 'required|string|min:2|max:100',
            'job_title' => 'required|string|min:2|max:100',
            'organization_name' => 'required|string|min:2|max:150',
            'email_address' => 'required|email|max:255',
            'phone_number' => 'required|string|regex:/^(\+\d{1,3})?\s?[\d\s\-]{8,15}$/|max:20',
            'country' => 'required|string|min:2|max:100',
            'website' => 'required|url|max:255',
            'additional_comments' => 'nullable|string|min:10|max:2000',
        ], [
            'contact_person.required' => 'Contact Person is required.',
            'contact_person.min' => 'Contact Person must be at least 2 characters.',
            'contact_person.max' => 'Contact Person cannot exceed 100 characters.',
            'job_title.required' => 'Job Title is required.',
            'job_title.min' => 'Job Title must be at least 2 characters.',
            'job_title.max' => 'Job Title cannot exceed 100 characters.',
            'organization_name.required' => 'Organization Name is required.',
            'organization_name.min' => 'Organization Name must be at least 2 characters.',
            'organization_name.max' => 'Organization Name cannot exceed 150 characters.',
            'email_address.required' => 'Email is required.',
            'email_address.email' => 'Please enter a valid email address.',
            'email_address.max' => 'Email cannot exceed 255 characters.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.regex' => 'Phone number must be 8-15 digits with optional country code (e.g., +968 95123456 or 95123456).',
            'country.required' => 'Country is required.',
            'country.min' => 'Country must be at least 2 characters.',
            'country.max' => 'Country cannot exceed 100 characters.',
            'website.required' => 'Website is required.',
            'website.url' => 'Please enter a valid website URL.',
            'website.max' => 'Website cannot exceed 255 characters.',
            'additional_comments' => 'Additional Comments.',
            'additional_comments.min' => 'Additional Comments must be at least 10 characters.',
            'additional_comments.max' => 'Additional Comments cannot exceed 2000 characters.',
        ]);

        try {
            Log::info('Exhibit submission validation passed', $validated);
            $submission = ExhibitSubmission::create($validated);
            
            // Send notifications to all admin users
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                $admin->notify(new ExhibitSubmissionNotification($submission, true));
            }
            
            // Send notifications to all regular users as well
            $users = User::where('role', '!=', 'admin')->get();
            foreach ($users as $user) {
                $user->notify(new ExhibitSubmissionNotification($submission, false));
            }
            
            Log::info('Exhibit submission created with notifications', ['submission_id' => $submission->id]);
            
            return redirect()->back()->with('success', 'Your exhibit submission has been received successfully.');
        } catch (\Exception $e) {
            Log::error('Exhibit submission error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'An error occurred while submitting your information. Please try again.');
        }
    }

    /**
     * Export submissions as CSV
     */
    public function exportExcel()
    {
        try {
            $submissions = ExhibitSubmission::all()->sortBy('created_at')->reverse();
            // Create CSV content for simple export
            $csvContent = "Contact Person,Job Title,Organization Name,Email Address,Phone Number,Country,Website,Additional Comments,Created At\n";
            foreach ($submissions as $submission) {
                $row = [
                    $this->escapeCsv($submission->contact_person),
                    $this->escapeCsv($submission->job_title),
                    $this->escapeCsv($submission->organization_name),
                    $this->escapeCsv($submission->email_address),
                    $this->escapeCsv($submission->phone_number),
                    $this->escapeCsv($submission->country),
                    $this->escapeCsv($submission->website),
                    $this->escapeCsv(str_replace(["\n", "\r"], ' ', $submission->additional_comments)),
                    $this->escapeCsv($submission->created_at),
                ];
                $csvContent .= implode(',', $row) . "\n";
            }
            // Return CSV content as a response or save to a file
            return response($csvContent)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', 'attachment; filename="exhibit_submissions.csv"');
        } catch (\Exception $e) {
            Log::error('Export Excel error ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while exporting the data. Please try again.');  
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
     * Search exhibit submissions  
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('q', '');
            $user = Auth::user();
            
            if (empty($query)) {
                // Redirect based on user role
                if ($user && $user->role === 'admin') {
                    return redirect(route('exhibit-submissions.index'));
                } else {
                    return redirect(route('user.exhibit-submissions.index'));
                }
            }
            
            $submissions = ExhibitSubmission::where('contact_person', 'like', "%{$query}%")
                ->orWhere('email_address', 'like', "%{$query}%")
                ->orWhere('phone_number', 'like', "%{$query}%")
                ->orWhere('organization_name', 'like', "%{$query}%")
                ->orWhere('country', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
            
            // Return appropriate view based on user role
            if ($user && $user->role === 'admin') {
                return view('admin.exhibitsubmissions.index', compact('submissions'))->with('searchQuery', $query);
            } else {
                return view('user.exhibitsubmissions.index', compact('submissions'))->with('searchQuery', $query);
            }
        } catch (\Exception $e) {
            $user = Auth::user();
            if ($user && $user->role === 'admin') {
                return redirect(route('exhibit-submissions.index'))->with('error', 'Search error: ' . $e->getMessage());
            } else {
                return redirect(route('user.exhibit-submissions.index'))->with('error', 'Search error: ' . $e->getMessage());
            }
        }   
    }

    /**
     * Delete an exhibit submission
     */
    public function destroy($id)
    {       
        try {
            $user = Auth::user();
            
            // Check if user is authenticated
            if (!$user) {
                return response()->json(['error' => 'You must be logged in to delete submissions.'], 401);
            }
            
            // Check if user has admin role
            if ($user->role !== 'admin') {
                Log::warning('Delete attempt by non-admin user', ['user_id' => $user->id, 'user_role' => $user->role]);
                return response()->json(['error' => 'You do not have permission to delete submissions.'], 403);
            }

            $submission = ExhibitSubmission::findOrFail($id);
            $submission->delete();
            Log::info('Exhibit submission deleted', ['submission_id' => $id, 'deleted_by' => $user->id]);

            return redirect(route('exhibit-submissions.index'))->with('success', 'Submission deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting exhibit submission: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to delete submission: ' . $e->getMessage());
        }
    }   

    /**
     * Update ExhibitSubmission notes (admin)
     */ 
    public function updateNotes(Request $request, $id)
    {   
        try {
            $user = Auth::user();
            
            // Check if user is authenticated
            if (!$user) {
                return response()->json(['error' => 'You must be logged in to update submissions.'], 401);
            }

            $submission = ExhibitSubmission::findOrFail($id);
            $submission->admin_notes = $request->input('admin_notes', '');
            $submission->save();
            Log::info('Exhibit submission notes updated', ['submission_id' => $id, 'updated_by' => $user->id]);

            return redirect()->back()->with('success', 'Submission notes updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating exhibit submission notes: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to update submission notes: ' . $e->getMessage());
        }
    }
}