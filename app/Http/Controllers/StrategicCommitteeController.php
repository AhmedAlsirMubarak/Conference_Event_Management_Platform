<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrategicCommittee;

class StrategicCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $query = StrategicCommittee::query();
        
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('title', 'like', '%' . $search . '%')
                  ->orWhere('company', 'like', '%' . $search . '%');
        }
        
        $members = $query->get();
        return view('admin.strategic_committees.index', compact('members', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.strategic_committees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'company' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
        ]);

        // Handle logo upload if provided
        if ($request->hasFile('logo')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/committees'), $filename);
            $validated['logo'] = 'uploads/committees/' . $filename;
        }

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('uploads/committees'), $filename);
            $validated['photo'] = 'uploads/committees/' . $filename;
        }

        StrategicCommittee::create($validated);

        return redirect()->route('strategic_committees.index')->with('success', 'Committee member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = StrategicCommittee::findOrFail($id);
        return view('admin.strategic_committees.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = StrategicCommittee::findOrFail($id);
        return view('admin.strategic_committees.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'company' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
        ]);

        $member = StrategicCommittee::findOrFail($id);

        // Handle logo upload if provided
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($member->logo) {
                $oldPath = public_path($member->logo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $filename = time() . '_' . uniqid() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/committees'), $filename);
            $validated['logo'] = 'uploads/committees/' . $filename;
        }

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($member->photo) {
                $oldPath = public_path($member->photo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $filename = time() . '_' . uniqid() . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('uploads/committees'), $filename);
            $validated['photo'] = 'uploads/committees/' . $filename;
        }

        $member->update($validated);

        return redirect()->route('strategic_committees.index')->with('success', 'Committee member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = StrategicCommittee::findOrFail($id);
        
        // Delete logo if exists
        if ($member->logo) {
            $logoPath = public_path($member->logo);
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
        }

        // Delete photo if exists
        if ($member->photo) {
            $photoPath = public_path($member->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        
        $member->delete();

        return redirect()->route('strategic_committees.index')->with('success', 'Committee member deleted successfully.');
    }

    /**
     * Export all committee members as CSV
     */
    public function export()
    {
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
    }
}