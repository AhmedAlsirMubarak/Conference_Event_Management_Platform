<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\Sponsor;
use App\Models\StrategicCommittee;
use App\Models\TechnicalCommittee;
use App\Models\StrategicSpeaker;
use App\Models\TechnicalSpeaker;
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

    /**
     * Display all strategic committee members for user (read-only)
     */
    public function listStrategicCommittees()
    {
        try {
            $search = request('search');
            $query = StrategicCommittee::query();
            
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('title', 'like', '%' . $search . '%')
                      ->orWhere('company', 'like', '%' . $search . '%');
            }
            
            $members = $query->get();
            return view('user.strategic_committees.index', compact('members', 'search'));
        } catch (\Exception $e) {
            return view('user.strategic_committees.index', ['members' => collect(), 'search' => null]);
        }
    }

    /**
     * Display specific strategic committee member for user (read-only)
     */
    public function showStrategicCommittee($id)
    {
        try {
            $member = StrategicCommittee::findOrFail($id);
            return view('user.strategic_committees.show', compact('member'));
        } catch (\Exception $e) {
            return redirect(route('user.strategic_committees.index'))->with('error', 'Member not found.');
        }
    }

    /**
     * Display all technical committee members for user (read-only)
     */
    public function listTechnicalCommittees()
    {
        try {
            $search = request('search');
            $query = TechnicalCommittee::query();
            
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('title', 'like', '%' . $search . '%')
                      ->orWhere('company', 'like', '%' . $search . '%');
            }
            
            $members = $query->get();
            return view('user.technical_committees.index', compact('members', 'search'));
        } catch (\Exception $e) {
            return view('user.technical_committees.index', ['members' => collect(), 'search' => null]);
        }
    }

    /**
     * Display specific technical committee member for user (read-only)
     */
    public function showTechnicalCommittee($id)
    {
        try {
            $member = TechnicalCommittee::findOrFail($id);
            return view('user.technical_committees.show', compact('member'));
        } catch (\Exception $e) {
            return redirect(route('user.technical_committees.index'))->with('error', 'Member not found.');
        }
    }

    /**
     * Display all strategic speakers for user (read-only)
     */
    public function listStrategicSpeakers()
    {
        try {
            $search = request('search');
            $query = StrategicSpeaker::query();
            
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('title', 'like', '%' . $search . '%')
                      ->orWhere('company', 'like', '%' . $search . '%');
            }
            
            $speakers = $query->get();
            return view('user.strategic_speakers.index', compact('speakers', 'search'));
        } catch (\Exception $e) {
            return view('user.strategic_speakers.index', ['speakers' => collect(), 'search' => null]);
        }
    }

    /**
     * Display specific strategic speaker for user (read-only)
     */
    public function showStrategicSpeaker($id)
    {
        try {
            $speaker = StrategicSpeaker::findOrFail($id);
            return view('user.strategic_speakers.show', compact('speaker'));
        } catch (\Exception $e) {
            return redirect(route('user.strategic_speakers.index'))->with('error', 'Speaker not found.');
        }
    }

    /**
     * Display all technical speakers for user (read-only)
     */
    public function listTechnicalSpeakers()
    {
        try {
            $search = request('search');
            $query = TechnicalSpeaker::query();
            
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('title', 'like', '%' . $search . '%')
                      ->orWhere('company', 'like', '%' . $search . '%');
            }
            
            $speakers = $query->get();
            return view('user.technical_speakers.index', compact('speakers', 'search'));
        } catch (\Exception $e) {
            return view('user.technical_speakers.index', ['speakers' => collect(), 'search' => null]);
        }
    }

    /**
     * Display specific technical speaker for user (read-only)
     */
    public function showTechnicalSpeaker($id)
    {
        try {
            $speaker = TechnicalSpeaker::findOrFail($id);
            return view('user.technical_speakers.show', compact('speaker'));
        } catch (\Exception $e) {
            return redirect(route('user.technical_speakers.index'))->with('error', 'Speaker not found.');
        }
    }

    /**
     * Export strategic speakers as CSV (user)
     */
    public function exportStrategicSpeakers()
    {
        try {
            $speakers = StrategicSpeaker::all();
            
            $filename = 'strategic_speakers_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => "attachment; filename=\"$filename\""
            ];

            $callback = function () use ($speakers) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Title', 'Company', 'Biography', 'Created At', 'Updated At']);
                
                foreach ($speakers as $speaker) {
                    fputcsv($file, [
                        $speaker->name,
                        $speaker->title,
                        $speaker->company,
                        $speaker->bio,
                        $speaker->created_at->format('Y-m-d H:i:s'),
                        $speaker->updated_at->format('Y-m-d H:i:s'),
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to export speakers.');
        }
    }

    /**
     * Export technical speakers as CSV (user)
     */
    public function exportTechnicalSpeakers()
    {
        try {
            $speakers = TechnicalSpeaker::all();
            
            $filename = 'technical_speakers_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => "attachment; filename=\"$filename\""
            ];

            $callback = function () use ($speakers) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Title', 'Company', 'Biography', 'Created At', 'Updated At']);
                
                foreach ($speakers as $speaker) {
                    fputcsv($file, [
                        $speaker->name,
                        $speaker->title,
                        $speaker->company,
                        $speaker->bio,
                        $speaker->created_at->format('Y-m-d H:i:s'),
                        $speaker->updated_at->format('Y-m-d H:i:s'),
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to export speakers.');
        }
    }

    /**
     * Export strategic committees as CSV (user)
     */
    public function exportStrategicCommittees()
    {
        try {
            $members = StrategicCommittee::all();
            
            $filename = 'strategic_committees_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => "attachment; filename=\"$filename\""
            ];

            $callback = function () use ($members) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Title', 'Company', 'Biography', 'Created At', 'Updated At']);
                
                foreach ($members as $member) {
                    fputcsv($file, [
                        $member->name,
                        $member->title,
                        $member->company,
                        $member->bio,
                        $member->created_at->format('Y-m-d H:i:s'),
                        $member->updated_at->format('Y-m-d H:i:s'),
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to export committees.');
        }
    }

    /**
     * Export technical committees as CSV (user)
     */
    public function exportTechnicalCommittees()
    {
        try {
            $members = TechnicalCommittee::all();
            
            $filename = 'technical_committees_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => "attachment; filename=\"$filename\""
            ];

            $callback = function () use ($members) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Title', 'Company', 'Biography', 'Created At', 'Updated At']);
                
                foreach ($members as $member) {
                    fputcsv($file, [
                        $member->name,
                        $member->title,
                        $member->company,
                        $member->bio,
                        $member->created_at->format('Y-m-d H:i:s'),
                        $member->updated_at->format('Y-m-d H:i:s'),
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to export committees.');
        }
    }
}
