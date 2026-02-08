<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacts;
use App\Models\Sponsor;
use App\Models\SpeakersSubmissions;
use App\Models\ExhibitSubmission;
use App\Models\SponsorSubmission;
use App\Models\StrategicSpeaker;
use App\Models\TechnicalSpeaker;
use App\Models\StrategicCommittee;
use App\Models\TechnicalCommittee;
use Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        try {
            $totalContacts = contacts::count();
            $thisWeekContacts = contacts::whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();
            $todayContacts = contacts::whereDate('created_at', Carbon::today())->count();
            $totalSponsors = Sponsor::count();
            $totalSpeakersSubmissions = SpeakersSubmissions::count();
            $totalExhibitSubmissions = ExhibitSubmission::count();
            $totalSponsorSubmissions = SponsorSubmission::count();
            $totalStrategicSpeakers = StrategicSpeaker::count();
            $totalTechnicalSpeakers = TechnicalSpeaker::count();
            $totalStrategicCommittees = StrategicCommittee::count();
            $totalTechnicalCommittees = TechnicalCommittee::count();

            return view('admin.dashboard', compact(
                'totalContacts',
                'thisWeekContacts',
                'todayContacts',
                'totalSponsors',
                'totalSpeakersSubmissions',
                'totalExhibitSubmissions',
                'totalSponsorSubmissions',
                'totalStrategicSpeakers',
                'totalTechnicalSpeakers',
                'totalStrategicCommittees',
                'totalTechnicalCommittees'
            ));
        } catch (\Exception $e) {
            return view('admin.dashboard', [
                'totalContacts' => 0,
                'thisWeekContacts' => 0,
                'todayContacts' => 0,
                'totalSponsors' => 0,
                'totalSpeakersSubmissions' => 0,
                'totalExhibitSubmissions' => 0,
                'totalStrategicSpeakers' => 0,
                'totalTechnicalSpeakers' => 0,
                'totalStrategicCommittees' => 0,
                'totalTechnicalCommittees' => 0
            ]);
        }
    }

    /**
     * Global search across all resources
     */
    public function globalSearch(Request $request)
    {
        try {
            $query = $request->input('q', '');
            
            if (empty($query)) {
                return redirect(route('dashboard'));
            }

            $contactResults = contacts::where('Name', 'like', "%{$query}%")
                ->orWhere('Email', 'like', "%{$query}%")
                ->orWhere('Company', 'like', "%{$query}%")
                ->select('id', 'Name', 'Email', 'Company', 'created_at')
                ->limit(5)
                ->get()
                ->map(function ($item) {
                    $item->type = 'Contact';
                    $item->route = route('getcontactById', $item->id);
                    $item->detail = $item->Email;
                    return $item;
                });

            $sponsorResults = Sponsor::where('name', 'like', "%{$query}%")
                ->orWhere('category', 'like', "%{$query}%")
                ->select('id', 'name', 'category', 'created_at')
                ->limit(5)
                ->get()
                ->map(function ($item) {
                    $item->type = 'Sponsor';
                    $item->route = route('sponsors.show', $item->id);
                    $item->detail = $item->category;
                    $item->Name = $item->name;
                    return $item;
                });

            $speakerResults = StrategicSpeaker::where('name', 'like', "%{$query}%")
                ->orWhere('title', 'like', "%{$query}%")
                ->orWhere('company', 'like', "%{$query}%")
                ->select('id', 'name', 'title', 'company', 'created_at')
                ->limit(3)
                ->get()
                ->map(function ($item) {
                    $item->type = 'Strategic Speaker';
                    $item->route = route('strategic_speakers.show', $item->id);
                    $item->detail = $item->company ?? $item->title;
                    $item->Name = $item->name;
                    return $item;
                });

            $techSpeakerResults = TechnicalSpeaker::where('name', 'like', "%{$query}%")
                ->orWhere('title', 'like', "%{$query}%")
                ->orWhere('company', 'like', "%{$query}%")
                ->select('id', 'name', 'title', 'company', 'created_at')
                ->limit(3)
                ->get()
                ->map(function ($item) {
                    $item->type = 'Technical Speaker';
                    $item->route = route('technical_speakers.show', $item->id);
                    $item->detail = $item->company ?? $item->title;
                    $item->Name = $item->name;
                    return $item;
                });

            $committeeResults = StrategicCommittee::where('name', 'like', "%{$query}%")
                ->orWhere('title', 'like', "%{$query}%")
                ->orWhere('Company', 'like', "%{$query}%")
                ->select('id', 'name', 'title', 'Company', 'created_at')
                ->limit(3)
                ->get()
                ->map(function ($item) {
                    $item->type = 'Strategic Committee';
                    $item->route = route('strategic_committees.show', $item->id);
                    $item->detail = $item->Company ?? $item->title;
                    $item->Name = $item->name;
                    return $item;
                });

            $techCommitteeResults = TechnicalCommittee::where('name', 'like', "%{$query}%")
                ->orWhere('title', 'like', "%{$query}%")
                ->orWhere('Company', 'like', "%{$query}%")
                ->select('id', 'name', 'title', 'Company', 'created_at')
                ->limit(3)
                ->get()
                ->map(function ($item) {
                    $item->type = 'Technical Committee';
                    $item->route = route('technical_committees.show', $item->id);
                    $item->detail = $item->Company ?? $item->title;
                    $item->Name = $item->name;
                    return $item;
                });

            $searchResults = $contactResults->merge($sponsorResults)
                ->merge($speakerResults)
                ->merge($techSpeakerResults)
                ->merge($committeeResults)
                ->merge($techCommitteeResults)
                ->sortByDesc('created_at');

            return view('admin.search-results', compact('query', 'searchResults'));
        } catch (\Exception $e) {
            return redirect(route('dashboard'))->with('error', 'Search error: ' . $e->getMessage());
        }
    }
}
