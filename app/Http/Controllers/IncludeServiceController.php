<?php

namespace App\Http\Controllers;

use App\Models\Include_service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IncludeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $includeServices = Include_service::with('translations')->get();
        return view('include_services.index', compact('includeServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.include_services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'include' => 'required|boolean',
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',
        ]);

        $includeService = Include_service::create([
            'include' => $validated['include'],
        ]);

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $includeService->translateOrNew($locale)->name = $translation['name'];
            }
            $includeService->save();
        }

        return redirect()->route('admin.include-services.index')->with('flash_message', 'Include Service created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Include_service $includeService)
    {
        return view('include_services.show', compact('includeService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Include_service $includeService)
    {
        return view('admin.include_services.edit', compact('includeService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Include_service $includeService)
    {
        $validated = $request->validate([
            'include' => 'sometimes|boolean',
            'translations' => 'sometimes|array',
            'translations.*.name' => 'required_with:translations|string',
        ]);

        if (isset($validated['include'])) {
            $includeService->include = $validated['include'];
        }
        $includeService->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $includeService->translateOrNew($locale)->name = $translation['name'];
            }
            $includeService->save();
        }

        return redirect()->route('admin.include-services.index')->with('flash_message', 'Include Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Include_service $includeService)
    {
        $includeService->delete();
        return back()->with('flash_message', 'Include Service deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $includeServices = Include_service::with('translations')->get();
        return view('admin.include_services.index', compact('includeServices'));
    }
}
