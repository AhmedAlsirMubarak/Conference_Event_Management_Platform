<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exhibitor;

class ExhibitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exhibitors = Exhibitor::all();
        return view('admin.exhibitors.index', compact('exhibitors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exhibitors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:exhibitor,name',
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url|max:255',
        ]);

        // Handle logo upload if provided
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('exhibitor_logos', 'public');
            $validated['logo'] = $path;
        }

        Exhibitor::create($validated);

        return redirect()->route('exhibitors.index')->with('success', 'Exhibitor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exhibitor = Exhibitor::findOrFail($id);
        return view('admin.exhibitors.show', compact('exhibitor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exhibitor = Exhibitor::findOrFail($id);
        return view('admin.exhibitors.edit', compact('exhibitor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $exhibitor = Exhibitor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:exhibitor,name,' . $exhibitor->id,
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url|max:255',
        ]);

        // Handle logo upload if provided
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('exhibitor_logos', 'public');
            $validated['logo'] = $path;
        }

        $exhibitor->update($validated);

        return redirect()->route('exhibitors.index')->with('success', 'Exhibitor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exhibitor = Exhibitor::findOrFail($id);
        $exhibitor->delete();

        return redirect()->route('exhibitors.index')->with('success', 'Exhibitor deleted successfully.');
    }

    /**
     * Search exhibitors
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');
        
        $exhibitors = Exhibitor::query()
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('website', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.exhibitors.index', compact('exhibitors'));
    }
}
