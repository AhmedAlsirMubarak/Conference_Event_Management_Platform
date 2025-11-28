<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use Illuminate\Support\Facades\Auth;
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
            $recentContacts = contacts::orderBy('created_at', 'desc')->limit(5)->get();

            return view('user.dashboard', compact('totalContacts', 'thisWeekContacts', 'todayContacts', 'recentContacts'));
        } catch (\Exception $e) {
            return view('user.dashboard', [
                'totalContacts' => 0,
                'thisWeekContacts' => 0,
                'todayContacts' => 0,
                'recentContacts' => collect()
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
}
