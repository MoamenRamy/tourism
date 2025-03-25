<?php

namespace App\Http\Controllers;

use App\Models\Transportation_additional_service;
use App\Models\Transportation_additional_serviceTranslation;
use Illuminate\Http\Request;

class TransportationAdditionalController extends Controller
{
    /**
     * Display a listing of the transportation additionals.
     */
    public function index()
    {
        $transportationAdditionals = Transportation_additional_service::with('translations')->get();
        return view('transportation_additionals.index', compact('transportationAdditionals'));
    }

    /**
     * Show the form for creating a new transportation additional.
     */
    public function create()
    {
        return view('admin.transportation_additional.create');
    }

    /**
     * Store a newly created transportation additional with translations.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'required|string',
        ]);

        $transportationAdditional = new Transportation_additional_service();
        // Update the transportation additional
        $transportationAdditional->price = $validated['price'];
        $transportationAdditional->save();
        // Update or create translations
        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $transportationAdditional->translateOrNew($locale)->name = $translation['name'];
                $transportationAdditional->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $transportationAdditional->save();
        }


        return redirect()->route('admin.transportation_additional.index')->with('flash_message', 'Transportation Additional added successfully.');
    }

    /**
     * Display the specified transportation additional.
     */
    public function show(Transportation_additional_service $transportationAdditional)
    {
        return view('transportation_additionals.show', compact('transportationAdditional'));
    }

    /**
     * Show the form for editing the specified transportation additional.
     */
    public function edit(Transportation_additional_service $transportationAdditional)
    {
        return view('admin.transportation_additional.edit', compact('transportationAdditional'));
    }

    /**
     * Update the specified transportation additional with translations.
     */
    public function update(Request $request, Transportation_additional_service $transportationAdditional)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'translations' => 'nullable|array',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'required|string',
        ]);

        // Update the transportation additional
        $transportationAdditional->price = $validated['price'];
        $transportationAdditional->save();
        // Update or create translations
        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $transportationAdditional->translateOrNew($locale)->name = $translation['name'];
                $transportationAdditional->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $transportationAdditional->save();
        }


        return redirect()->route('admin.transportation_additional.index')->with('flash_message', 'Transportation Additional updated successfully.');
    }

    /**
     * Remove the specified transportation additional from storage.
     */
    public function destroy(Transportation_additional_service $transportationAdditional)
    {
        $transportationAdditional->delete();
        return back()->with('flash_message', 'Transportation Additional deleted successfully.');
    }

    // admin

    public function adminIndex()
    {
        $transportationAdditionals = Transportation_additional_service::with('translations')->get();
        return view('admin.transportation_additional.index', compact('transportationAdditionals'));
    }
}
