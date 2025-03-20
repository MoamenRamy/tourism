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
        return view('admin.additional_services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'nullable|string',
        ]);

        $additionalService = Additional_service::create(['price' => $validated['price']]);

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $additionalService->translateOrNew($locale)->name = $translation['name'];
                $additionalService->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $additionalService->save();
        }

        return redirect()->route('admin.additional-services.index')->with('flash_message', 'Service created successfully');
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
        return view('admin.additional_services.edit', compact('additionalService'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Additional_service $additionalService)
    // {
    //     $validated = $request->validate([
    //         'price' => 'sometimes|numeric',
    //         'translations' => 'sometimes|array',
    //         // 'translations.*.locale' => 'required_with:translations|string',
    //         'translations.*.name' => 'required_with:translations|string',
    //         'translations.*.description' => 'nullable|string',
    //     ]);

    //     if (isset($validated['price'])) {
    //         $additionalService->update(['price' => $validated['price']]);
    //     }

    //     if (isset($validated['translations'])) {
    //         foreach ($validated['translations'] as $translation) {
    //             $additionalService->translateOrNew($translation['locale'])->name = $translation['name'];
    //             $additionalService->translateOrNew($translation['locale'])->description = $translation['description'] ?? null;
    //         }
    //         $additionalService->save();
    //     }

    //     return redirect()->route('admin.additional-services.index')->with('flash_message', 'Service updated successfully');
    // }

    public function update(Request $request, Additional_service $additionalService)
    {
        $validated = $request->validate([
            'price' => 'sometimes|numeric',
            'translations' => 'sometimes|array',
            'translations.*.name' => 'required_with:translations|string',
            'translations.*.description' => 'nullable|string',
        ]);

        if (isset($validated['price'])) {
            $additionalService->update(['price' => $validated['price']]);
        }

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $additionalService->translateOrNew($locale)->name = $translation['name'];
                $additionalService->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $additionalService->save();
        }

        return redirect()->route('admin.additional-services.index')
            ->with('flash_message', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Additional_service $additionalService)
    {
        $additionalService->delete();
        return back()->with('flash_message', 'Service deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $additionalServices = Additional_service::with('translations')->get();
        return view('admin.additional_services.index', compact('additionalServices'));
    }
}
