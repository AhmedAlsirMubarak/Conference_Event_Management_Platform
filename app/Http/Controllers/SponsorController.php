<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\SponsorSubmission;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:sponsors,name',
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:100',
        ]);

        // Handle logo upload if provided
        if ($request->hasFile('logo')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/sponsor_logos'), $filename);
            $validated['logo'] = 'uploads/sponsor_logos/' . $filename;
        }

        Sponsor::create($validated);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsors.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:sponsors,name,' . $sponsor->id,
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:100',
        ]);

        // Handle logo upload if provided
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($sponsor->logo && file_exists(public_path($sponsor->logo))) {
                unlink(public_path($sponsor->logo));
            }
            $filename = time() . '_' . uniqid() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/sponsor_logos'), $filename);
            $validated['logo'] = 'uploads/sponsor_logos/' . $filename;
        }

        $sponsor->update($validated);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor deleted successfully.');
    }

    /**
     * Search for sponsors (admin only).
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');
        
        $sponsors = Sponsor::query()
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('category', 'like', '%' . $query . '%')
            ->orWhere('website', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Handle sponsorship inquiry form submission from public website
     */
    public function submitInquiry(Request $request)
    {
        $validated = $request->validate([
            'contact_person' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'website' => 'required|url|max:255',
            'additional_comments' => 'nullable|string|max:1000',
        ]);

        // Add language and status
        $validated['language'] = app()->getLocale();
        $validated['status'] = 'pending';

        try {
            SponsorSubmission::create($validated);
            
            // Redirect back with success message on the same language
            return redirect()->back()->with('success', __('sponsor.thank_you'));
        } catch (\Exception $e) {
            \Log::error('Sponsor submission error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }
}