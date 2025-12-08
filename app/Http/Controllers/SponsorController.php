<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;

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
            $path = $request->file('logo')->store('sponsor_logos', 'public');
            $validated['logo'] = $path;
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
            $path = $request->file('logo')->store('sponsor_logos', 'public');
            $validated['logo'] = $path;
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
}