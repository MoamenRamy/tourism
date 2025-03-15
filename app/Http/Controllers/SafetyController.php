<?php

namespace App\Http\Controllers;

use App\Models\Safety;
use App\Models\SafetyTranslation;
use Illuminate\Http\Request;

class SafetyController extends Controller
{
    /**
     * Display a listing of the safeties.
     */
    public function index()
    {
        $safeties = Safety::with('translations')->get();
        return view('safeties.index', compact('safeties'));
    }

    /**
     * Show the form for creating a new safety.
     */
    public function create()
    {
        return view('safeties.create');
    }

/**
     * Store a newly created safety in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string',
        ]);

        $safety = Safety::create([]);

        foreach ($request->translations as $translation) {
            SafetyTranslation::create([
                'safety_id' => $safety->id,
                'locale' => $translation['locale'],
                'name' => $translation['name'],
            ]);
        }

        return redirect()->route('safeties.index')->with('success', 'Safety created successfully');
    }

    /**
     * Display the specified safety.
     */
    public function show(Safety $safety)
    {
        return view('safeties.show', compact('safety'));
    }

    /**
     * Show the form for editing the specified safety.
     */
    public function edit(Safety $safety)
    {
        return view('safeties.edit', compact('safety'));
    }

    /**
     * Update the specified safety in storage.
     */
    public function update(Request $request, Safety $safety)
    {
        $request->validate([
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string',
        ]);

        foreach ($request->translations as $translation) {
            SafetyTranslation::updateOrCreate(
                ['safety_id' => $safety->id, 'locale' => $translation['locale']],
                ['name' => $translation['name']]
            );
        }

        return redirect()->route('safeties.index')->with('success', 'Safety updated successfully');
    }

    /**
     * Remove the specified safety from storage.
     */
    public function destroy(Safety $safety)
    {
        $safety->delete();
        return redirect()->route('safeties.index')->with('success', 'Safety deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $safeties = Safety::with('translations')->get();
        return view('admin.safeties.index', compact('safeties'));
    }
}
