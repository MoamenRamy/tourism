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
        return view('transportation_additionals.create');
    }

    /**
     * Store a newly created transportation additional with translations.
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'required|string',
        ]);

        // Create the transportation additional
        $transportationAdditional = Transportation_additional_service::create([
            'price' => $request->price,
        ]);

        // Store translations
        foreach ($request->translations as $translation) {
            $transportationAdditional->translations()->create([
                'locale' => $translation['locale'],
                'name' => $translation['name'],
                'description' => $translation['description'],
            ]);
        }

        return redirect()->route('transportation_additionals.index')->with('success', 'Transportation Additional created successfully.');
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
        return view('transportation_additionals.edit', compact('transportationAdditional'));
    }

    /**
     * Update the specified transportation additional with translations.
     */
    public function update(Request $request, Transportation_additional_service $transportationAdditional)
    {
        $request->validate([
            'price' => 'required|numeric',
            'translations' => 'nullable|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'required|string',
        ]);

        // Update the transportation additional
        $transportationAdditional->update([
            'price' => $request->price,
        ]);

        // Update or create translations
        if ($request->has('translations')) {
            foreach ($request->translations as $translation) {
                Transportation_additional_serviceTranslation::updateOrCreate(
                    ['additional_id' => $transportationAdditional->id, 'locale' => $translation['locale']],
                    ['name' => $translation['name'], 'description' => $translation['description']]
                );
            }
        }

        return redirect()->route('transportation_additionals.index')->with('success', 'Transportation Additional updated successfully.');
    }

    /**
     * Remove the specified transportation additional from storage.
     */
    public function destroy(Transportation_additional_service $transportationAdditional)
    {
        $transportationAdditional->delete();
        return redirect()->route('transportation_additionals.index')->with('success', 'Transportation Additional deleted successfully.');
    }

    // admin

    public function adminIndex()
    {
        $transportationAdditionals = Transportation_additional_service::with('translations')->get();
        return view('admin.transportation_additional.index', compact('transportationAdditionals'));
    }
}
