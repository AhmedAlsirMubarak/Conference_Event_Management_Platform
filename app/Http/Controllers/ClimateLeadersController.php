<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClimateLeaders;
use App\Notifications\ClimateLeaderSubmissionNotification;
use App\Notifications\ClimateLeaderTeamNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClimateLeadersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $climateLeaders = ClimateLeaders::all()->sortBy('created_at')->reverse();
            return view('admin.climate_leaders.index', compact('climateLeaders'));
        } catch (\Exception $e) {
            return view('admin.climate_leaders.index', ['climateLeaders' => collect()]); 
        }
    }

    /**
     * Get all Climate Leaders
     */
    public function getAllClimateLeaders()
    {
        try {
            $climateLeaders = ClimateLeaders::all()->sortBy('created_at')->reverse();
            return view('admin.climate_leaders.index', compact('climateLeaders'));
        } catch (\Exception $e) {
            return view('admin.climate_leaders.index', ['climateLeaders' => collect()]); 
        }
    }

    /**
     * Display a specific climate leader.
     */
    public function getClimateLeaderById($id)
    {
        try {
            $climateLeader = ClimateLeaders::findOrFail($id);
            return view('admin.climate_leaders.show', compact('climateLeader'));
        } catch (\Exception $e) {
            return redirect(route('getAllClimateLeaders'))->with('error', 'Climate Leader not found.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.climate_leaders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'country_code' => 'required|string|max:5',
                'phone' => 'required|string|max:20',
                'Country_of_Nationality' => 'required|string|max:100',
                'Country_of_Residence' => 'required|string|max:100',    
                'organization' => 'required|string|max:255',
                'bio' => 'required|string|max:1000',
                'linkedin_profile' => 'nullable|url|max:255',
            ], [
                'fullname.required' => 'Full name is required.',
                'fullname.max' => 'Full name cannot exceed 255 characters.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => 'Email cannot exceed 255 characters.',
                'country_code.required' => 'Country code is required.',
                'country_code.max' => 'Country code cannot exceed 5 characters.',
                'phone.required' => 'Phone number is required.',
                'phone.max' => 'Phone number cannot exceed 20 characters.',
                'Country_of_Nationality.required' => 'Country of nationality is required.',
                'Country_of_Nationality.max' => 'Country of nationality cannot exceed 100 characters.',
                'Country_of_Residence.required' => 'Country of residence is required.',
                'Country_of_Residence.max' => 'Country of residence cannot exceed 100 characters.',
                'organization.required' => 'Organization is required.',
                'organization.max' => 'Organization cannot exceed 255 characters.',
                'bio.required' => 'Bio is required.',
                'bio.max' => 'Bio cannot exceed 1000 characters.',
                'linkedin_profile.url' => 'Please enter a valid LinkedIn profile URL.',
                'linkedin_profile.max' => 'LinkedIn profile URL cannot exceed 255 characters.',
            ]);

            Log::info('Climate Leader form validation passed', $validated);

            $climateLeader = ClimateLeaders::create([
                'fullname' => $validated['fullname'],
                'email' => $validated['email'],
                'country_code' => $validated['country_code'],
                'phone' => $validated['phone'],
                'Country_of_Nationality' => $validated['Country_of_Nationality'],
                'Country_of_Residence' => $validated['Country_of_Residence'],
                'organization' => $validated['organization'],
                'bio' => $validated['bio'],
                'linkedin_profile' => $validated['linkedin_profile'] ?? null,
            ]);

            Log::info('Climate Leader created successfully', ['climate_leader_id' => $climateLeader->id]);

            // Send confirmation email to the user
            try {
                Mail::to($climateLeader->email)->send(new ClimateLeaderSubmissionNotification($climateLeader));
                Log::info('Confirmation email sent to user successfully', ['climate_leader_id' => $climateLeader->id]);
            } catch (\Exception $e) {
                Log::error('Failed to send confirmation email to user: ' . $e->getMessage(), ['climate_leader_id' => $climateLeader->id]);
            }

            // Send notification email to team
            try {
                $teamEmail = config('app.team_email') ?? env('TEAM_EMAIL', 'climate-leaders@saudiclimateweek.com');
                Mail::to($teamEmail)->send(new ClimateLeaderTeamNotification($climateLeader));
                Log::info('Notification email sent to team successfully', ['climate_leader_id' => $climateLeader->id, 'team_email' => $teamEmail]);
            } catch (\Exception $e) {
                Log::error('Failed to send notification email to team: ' . $e->getMessage(), ['climate_leader_id' => $climateLeader->id]);
            }

            // Return JSON for AJAX requests, redirect for form submissions
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Thank you for your nomination! Your submission has been received successfully.'], 201);
            }

            return redirect(route('100climateleaders'))->with('success', 'Thank you for your nomination! Your submission has been received successfully.');
        } catch (\Exception $e) {
            Log::error('Climate Leader form error: ' . $e->getMessage(), ['exception' => $e]);
            
            // Return JSON for AJAX requests, redirect for form submissions
            if ($request->expectsJson()) {
                return response()->json(['errors' => ['form' => [$e->getMessage()]]], 422);
            }

            return redirect(route('100climateleaders'))->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $climateLeader = ClimateLeaders::findOrFail($id);
            return view('admin.climate_leaders.show', compact('climateLeader'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Climate Leader not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            if (Auth::user()->role !== 'admin') {
                return redirect('/dashboard')->with('error', 'You do not have permission to edit.');
            }

            $climateLeader = ClimateLeaders::findOrFail($id);
            return view('admin.climate_leaders.edit', compact('climateLeader'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load edit form.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if (Auth::user()->role !== 'admin') {
                return redirect('/dashboard')->with('error', 'You do not have permission to update.');
            }

            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'Country_of_Nationality' => 'required|string|max:100',
                'Country_of_Residence' => 'required|string|max:100',    
                'organization' => 'required|string|max:255',
                'bio' => 'required|string|max:1000',
                'linkedin_profile' => 'nullable|url|max:255',
            ]);

            $climateLeader = ClimateLeaders::findOrFail($id);
            $climateLeader->update($validated);

            Log::info('Climate Leader updated', ['climate_leader_id' => $id, 'updated_by' => Auth::user()->id]);

            return redirect(route('climate-leaders.show', $id))->with('success', 'Climate Leader updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating climate leader: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to update climate leader: ' . $e->getMessage());
        }
    }

    /**
     * Export climate leaders to Excel
     */
    public function exportExcel()
    {
        try {
            $climateLeaders = ClimateLeaders::all();
            
            // Create CSV content for simple export
            $csvContent = "Full Name,Email,Phone,Country of Nationality,Country of Residence,Organization,Bio,LinkedIn Profile,Submitted Date\n";
            
            foreach ($climateLeaders as $leader) {
                $row = [
                    $leader->fullname,
                    $leader->email,
                    $leader->phone,
                    $leader->Country_of_Nationality,
                    $leader->Country_of_Residence,
                    $leader->organization,
                    $leader->bio,
                    $leader->linkedin_profile ?? '',
                    $leader->created_at->format('Y-m-d H:i:s')
                ];
                
                $csvContent .= implode(',', array_map(function($field) {
                    return $this->escapeCsv($field);
                }, $row)) . "\n";
            }
            
            $filename = 'climate_leaders_' . date('Y-m-d_H-i-s') . '.csv';
            
            return response($csvContent)
                ->header('Content-Type', 'text/csv; charset=UTF-8')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        } catch (\Exception $e) {
            Log::error('Excel export error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to export climate leaders.');
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
     * Search climate leaders
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('q', '');
            
            if (empty($query)) {
                return redirect(route('getAllClimateLeaders'));
            }
            
            $climateLeaders = ClimateLeaders::where('fullname', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%")
                ->orWhere('organization', 'like', "%{$query}%")
                ->orWhere('Country_of_Nationality', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
            
            return view('admin.climate_leaders.index', compact('climateLeaders'))->with('searchQuery', $query);
        } catch (\Exception $e) {
            return redirect(route('getAllClimateLeaders'))->with('error', 'Search error: ' . $e->getMessage());
        }
    }

    /**
     * Delete a climate leader
     */
    public function delete($id)
    {
        try {
            $user = Auth::user();
            
            // Check if user is authenticated
            if (!$user) {
                return response()->json(['error' => 'You must be logged in to delete climate leaders.'], 401);
            }
            
            // Check if user has admin role
            if ($user->role !== 'admin') {
                Log::warning('Delete attempt by non-admin user', ['user_id' => $user->id, 'user_role' => $user->role]);
                return response()->json(['error' => 'You do not have permission to delete climate leaders.'], 403);
            }

            $climateLeader = ClimateLeaders::findOrFail($id);
            $climateLeader->delete();
            Log::info('Climate Leader deleted', ['climate_leader_id' => $id, 'deleted_by' => $user->id]);

            return redirect(route('climate-leaders.index'))->with('success', 'Climate Leader deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting climate leader: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to delete climate leader: ' . $e->getMessage());
        }
    }

    /**
     * Destroy a climate leader (RESTful)
     */
    public function destroy($id)
    {
        try {
            $user = Auth::user();
            
            // Check if user is authenticated
            if (!$user) {
                return response()->json(['error' => 'You must be logged in to delete climate leaders.'], 401);
            }
            
            // Check if user has admin role
            if ($user->role !== 'admin') {
                Log::warning('Delete attempt by non-admin user', ['user_id' => $user->id, 'user_role' => $user->role]);
                return redirect()->back()->with('error', 'You do not have permission to delete climate leaders.');
            }

            $climateLeader = ClimateLeaders::findOrFail($id);
            $climateLeader->delete();
            Log::info('Climate Leader deleted', ['climate_leader_id' => $id, 'deleted_by' => $user->id]);

            return redirect(route('climate-leaders.index'))->with('success', 'Climate Leader deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting climate leader: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to delete climate leader: ' . $e->getMessage());
        }
    }

    /**
     * Update climate leader notes (admin)
     */
    public function updateAdminNotes(Request $request, $id)
    {
        try {
            if (Auth::user()->role !== 'admin') {
                return redirect('/dashboard')->with('error', 'You do not have permission to update notes.');
            }

            $validated = $request->validate([
                'notes' => 'nullable|string|max:1000',
            ]);

            $climateLeader = ClimateLeaders::findOrFail($id);
            $climateLeader->notes = $validated['notes'];
            $climateLeader->last_reviewed_at = now();
            $climateLeader->save();

            return redirect(route('climate-leaders.show', $id))->with('success', 'Notes updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update notes: ' . $e->getMessage());
        }
    }

    /**
     * Display climate leaders for user (read-only)
     */
    public function userIndex()
    {
        try {
            $climateLeaders = ClimateLeaders::all()->sortBy('created_at')->reverse();
            return view('user.climate_leaders.index', compact('climateLeaders'));
        } catch (\Exception $e) {
            return view('user.climate_leaders.index', ['climateLeaders' => collect()]); 
        }
    }

    /**
     * Display a specific climate leader for user (read-only)
     */
    public function userShow(string $id)
    {
        try {
            $climateLeader = ClimateLeaders::findOrFail($id);
            return view('user.climate_leaders.show', compact('climateLeader'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Climate Leader not found.');
        }
    }
}
