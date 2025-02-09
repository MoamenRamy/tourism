<?php

namespace App\Http\Controllers;

use App\Models\Additional_service;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdditionalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Additional_service::with('translations')->paginate(12);
        // $services = AdditionalService::translatedIn('en')->get();
        // $services = Additional_service::all();
        return view('additional_services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('additional_services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'nullable|string',
        ]);

        $service = Additional_service::create(['price' => $validated['price']]);

        foreach ($validated['translations'] as $translation) {
            $service->translateOrNew($translation['locale'])->name = $translation['name'];
            $service->translateOrNew($translation['locale'])->description = $translation['description'] ?? null;
        }
        $service->save();

        return redirect()->route('additional-services.index')->with('success', 'Service created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Additional_service $additionalService)
    {
        return view('additional_services.show', compact('additionalService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Additional_service $additionalService)
    {
        return view('additional_services.edit', compact('additionalService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Additional_service $additionalService)
    {
        $validated = $request->validate([
            'price' => 'sometimes|numeric',
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.name' => 'required_with:translations|string',
            'translations.*.description' => 'nullable|string',
        ]);

        if (isset($validated['price'])) {
            $additionalService->update(['price' => $validated['price']]);
        }

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $additionalService->translateOrNew($translation['locale'])->name = $translation['name'];
                $additionalService->translateOrNew($translation['locale'])->description = $translation['description'] ?? null;
            }
            $additionalService->save();
        }

        return redirect()->route('additional-services.index')->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Additional_service $additionalService)
    {
        $additionalService->delete();
        return redirect()->route('additional-services.index')->with('success', 'Service deleted successfully');
    }
}
