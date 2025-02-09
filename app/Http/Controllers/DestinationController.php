<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::with('translations')->paginate(12);
        return view('destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:destinations,name',
            'photo' => 'required|string',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.description' => 'nullable|string',
        ]);

        $slug = Str::slug($validated['name']);

        $destination = Destination::create([
            'slug' => $slug,
            'name' => $validated['name'],
            'photo' => $validated['photo'],
        ]);

        foreach ($validated['translations'] as $translation) {
            $destination->translateOrNew($translation['locale'])->description = $translation['description'] ?? null;
        }
        $destination->save();

        return redirect()->route('destinations.index')->with('success', 'Destination created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|unique:destinations,name,' . $destination->id,
            'photo' => 'sometimes|string',
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.description' => 'nullable|string',
        ]);

        if (isset($validated['name'])) {
            $destination->slug = Str::slug($validated['name']);
            $destination->name = $validated['name'];
        }

        if (isset($validated['photo'])) {
            $destination->photo = $validated['photo'];
        }

        $destination->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $destination->translateOrNew($translation['locale'])->description = $translation['description'] ?? null;
            }
            $destination->save();
        }

        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully');
    }
}
