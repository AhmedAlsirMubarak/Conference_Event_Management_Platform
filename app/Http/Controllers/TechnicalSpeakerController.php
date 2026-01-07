<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TechnicalSpeaker;

class TechnicalSpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $query = TechnicalSpeaker::query();
        
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('title', 'like', '%' . $search . '%')
                  ->orWhere('company', 'like', '%' . $search . '%');
        }
        
        $speakers = $query->get();
        return view('admin.technical_speakers.index', compact('speakers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technical_speakers.create');
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
            $request->file('logo')->move(public_path('uploads/speakers'), $filename);
            $validated['logo'] = 'uploads/speakers/' . $filename;
        }

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('uploads/speakers'), $filename);
            $validated['photo'] = 'uploads/speakers/' . $filename;
        }

        TechnicalSpeaker::create($validated);

        return redirect()->route('technical_speakers.index')->with('success', 'Speaker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $speaker = TechnicalSpeaker::findOrFail($id);
        return view('admin.technical_speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $speaker = TechnicalSpeaker::findOrFail($id);
        return view('admin.technical_speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $speaker = TechnicalSpeaker::findOrFail($id);

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
            $request->file('logo')->move(public_path('uploads/speakers'), $filename);
            $validated['logo'] = 'uploads/speakers/' . $filename;
        }

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('uploads/speakers'), $filename);
            $validated['photo'] = 'uploads/speakers/' . $filename;
        }

        $speaker->update($validated);

        return redirect()->route('technical_speakers.index')->with('success', 'Speaker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speaker = TechnicalSpeaker::findOrFail($id);
        $speaker->delete();
        return redirect()->route('technical_speakers.index')->with('success', 'Speaker deleted successfully.');
    }

    /**
     * Export all speakers as CSV
     */
    public function export()
    {
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
    }
}
