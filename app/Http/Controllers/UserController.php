<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display user dashboard
     */
    public function dashboard()
    {
        try {
            $totalContacts = contacts::count();
            $thisWeekContacts = contacts::where('created_at', '>=', Carbon::now()->startOfWeek())->count();
            $todayContacts = contacts::whereDate('created_at', Carbon::today())->count();
            $totalSponsors = Sponsor::count();
            $recentContacts = contacts::orderBy('created_at', 'desc')->limit(5)->get();
            $recentSponsors = Sponsor::orderBy('created_at', 'desc')->limit(3)->get();

            return view('user.dashboard', compact('totalContacts', 'thisWeekContacts', 'todayContacts', 'totalSponsors', 'recentContacts', 'recentSponsors'));
        } catch (\Exception $e) {
            return view('user.dashboard', [
                'totalContacts' => 0,
                'thisWeekContacts' => 0,
                'todayContacts' => 0,
                'totalSponsors' => 0,
                'recentContacts' => collect(),
                'recentSponsors' => collect()
            ]);
        }
    }

    /**
     * Display all contacts
     */
    public function indexContacts()
    {
        try {
            $contacts = contacts::all()->sortBy('created_at')->reverse();
            return view('user.contacts.index', compact('contacts'));
        } catch (\Exception $e) {
            return view('user.contacts.index', ['contacts' => collect()]);
        }
    }

    /**
     * Display specific contact
     */
    public function showContact($id)
    {
        try {
            $contact = contacts::findOrFail($id);
            return view('user.contacts.show', compact('contact'));
        } catch (\Exception $e) {
            return redirect(route('user.contacts.index'))->with('error', 'Contact not found.');
        }
    }

    /**
     * Export contacts to CSV
     */
    public function exportContacts()
    {
        try {
            $contacts = contacts::all();

            // Create CSV content
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
            return redirect()->back()->with('error', 'Failed to export contacts.');
        }
    }

    /**
     * Search contacts
     */
    public function searchContacts($q = null)
    {
        try {
            $query = request()->input('q', $q ?? '');
            
            if (empty($query)) {
                return redirect(route('user.contacts.index'));
            }
            
            $contacts = contacts::where('Name', 'like', "%{$query}%")
                ->orWhere('Email', 'like', "%{$query}%")
                ->orWhere('Phone', 'like', "%{$query}%")
                ->orWhere('Company', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
            
            return view('user.contacts.index', compact('contacts'))->with('searchQuery', $query);
        } catch (\Exception $e) {
            return redirect(route('user.contacts.index'))->with('error', 'Search error: ' . $e->getMessage());
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
     * Update contact notes
     */
    public function updateNotes(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'notes' => 'nullable|string|max:1000',
            ]);

            $contact = contacts::findOrFail($id);
            $contact->notes = $validated['notes'];
            $contact->last_communicated_at = now();
            $contact->save();

            return redirect(route('user.contacts.show', $id))->with('success', 'Notes updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update notes.');
        }
    }

    /**
     * Display all sponsors for user (read-only)
     */
    public function indexSponsors()
    {
        try {
            $sponsors = Sponsor::all();
            return view('user.sponsors.index', compact('sponsors'));
        } catch (\Exception $e) {
            return view('user.sponsors.index', ['sponsors' => collect()]);
        }
    }

    /**
     * Display specific sponsor for user (read-only)
     */
    public function showSponsor($id)
    {
        try {
            $sponsor = Sponsor::findOrFail($id);
            return view('user.sponsors.show', compact('sponsor'));
        } catch (\Exception $e) {
            return redirect(route('user.sponsors.index'))->with('error', 'Sponsor not found.');
        }
    }

    /**
     * Search sponsors for user
     */
    public function searchSponsors(Request $request)
    {
        try {
            $query = $request->input('q', '');
            
            $sponsors = Sponsor::query()
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('category', 'like', '%' . $query . '%')
                ->orWhere('website', 'like', '%' . $query . '%')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('user.sponsors.index', compact('sponsors'));
        } catch (\Exception $e) {
            return redirect(route('user.sponsors.index'))->with('error', 'Search error: ' . $e->getMessage());
        }
    }
}
