<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:destinations,name',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'translations' => 'required|array',
            'translations.*.description' => 'nullable|string',
        ]);

        $slug = Str::slug($validated['name']);

        $destination = new Destination();
        $destination->name = $validated['name'];
        $destination->slug = $slug;

        if ($request->hasFile('photo')) {

            $fileName = time() . '.' . $request->photo->extension();
            $path = $request->photo->storeAs('destinations', $fileName, 'public');

            $destination->photo = $path;
        }

        foreach ($validated['translations'] as $locale => $translation) {
            $destination->translateOrNew($locale)->description = $translation['description'] ?? null;
        }
        $destination->save();

        return redirect()->route('admin.destination.index')->with('flash_message', 'Destination created successfully');
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
        return view('admin.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|unique:destinations,name,' . $destination->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'translations' => 'sometimes|array',
            'translations.*.description' => 'nullable|string',
        ]);

        if (isset($validated['name'])) {
            $destination->name = $validated['name'];
            $destination->slug = Str::slug($validated['name']);
        }

        if ($request->hasFile('photo')) {
            if (!empty($destination->photo)) {
                $photoPath = storage_path('app/public/' . str_replace('storage/', '', $destination->photo));

                if (Storage::exists(str_replace('storage/', 'public/', $destination->photo))) {
                    Storage::delete(str_replace('storage/', 'public/', $destination->photo));
                }
                elseif (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $fileName = time() . '.' . $request->photo->extension();
            $path = $request->photo->storeAs('destinations', $fileName, 'public');

            $destination->photo = $path;
        }

        $destination->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $destination->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $destination->save();
        }

        return redirect()->route('admin.destination.index')->with('flash_message', 'Destination updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return back()->with('flash_message', 'Destination deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $destinations = Destination::with('translations')->get();
        return view('admin.destinations.index', compact('destinations'));
    }
}
