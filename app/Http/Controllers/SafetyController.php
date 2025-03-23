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
        return view('admin.safeties.create');
    }

/**
     * Store a newly created safety in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',

        ]);

        $safety = new Safety();

        foreach ($validated['translations'] as $locale => $translation) {
            $safety->translateOrNew($locale)->name = $translation['name'] ?? null;
        }
        $safety->save();

        return redirect()->route('admin.safeties.index')->with('flash_message', 'Safety created successfully');
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
        return view('admin.safeties.edit', compact('safety'));
    }

    /**
     * Update the specified safety in storage.
     */
    public function update(Request $request, Safety $safety)
    {
        $validated = $request->validate([
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',
        ]);

        foreach ($validated['translations'] as $locale => $translation) {
            $safety->translateOrNew($locale)->name = $translation['name'] ?? null;
        }
        $safety->save();

        return redirect()->route('admin.safeties.index')->with('flash_message', 'Safety updated successfully');
    }

    /**
     * Remove the specified safety from storage.
     */
    public function destroy(Safety $safety)
    {
        $safety->delete();
        return back()->with('flash_message', 'Safety deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $safeties = Safety::with('translations')->get();
        return view('admin.safeties.index', compact('safeties'));
    }
}
