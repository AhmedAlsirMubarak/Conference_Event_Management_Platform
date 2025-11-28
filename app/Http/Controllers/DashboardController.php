<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacts;
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
            $recentContacts = contacts::orderBy('created_at', 'desc')->take(5)->get();

            return view('admin.dashboard', compact(
                'totalContacts',
                'thisWeekContacts',
                'todayContacts',
                'recentContacts'
            ));
        } catch (\Exception $e) {
            return view('admin.dashboard', [
                'totalContacts' => 0,
                'thisWeekContacts' => 0,
                'todayContacts' => 0,
                'recentContacts' => collect()
            ]);
        }
    }
}
