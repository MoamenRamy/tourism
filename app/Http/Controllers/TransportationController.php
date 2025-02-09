<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use App\Models\TransportationTranslation;
use App\Models\Destination;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    /**
     * Display a listing of the transportations.
     */
    public function index()
    {
        $transportations = Transportation::with('translations', 'destination', 'vehicle')->get();
        return view('transportations.index', compact('transportations'));
    }

    /**
     * Show the form for creating a new transportation.
     */
    public function create()
    {
        $destinations = Destination::all();
        $vehicles = Vehicle::all();
        return view('transportations.create', compact('destinations', 'vehicles'));
    }

    /**
     * Store a newly created transportation in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            'price' => 'required|numeric',
            'vehicle_id' => 'required|exists:vehicles,id',
            'available' => 'required|boolean',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.from' => 'required|string',
            'translations.*.to' => 'required|string',
        ]);

        // Store the transportation record
        $transportation = Transportation::create($request->only(['destination_id', 'price', 'vehicle_id', 'available']));

        // Store translations
        foreach ($request->translations as $translation) {
            $transportation->translations()->create([
                'locale' => $translation['locale'],
                'from' => $translation['from'],
                'to' => $translation['to'],
            ]);
        }

        return redirect()->route('transportations.index')->with('success', 'Transportation added successfully.');
    }

    /**
     * Display the specified transportation.
     */
    public function show(Transportation $transportation)
    {
        return view('transportations.show', compact('transportation'));
    }

    /**
     * Show the form for editing the specified transportation.
     */
    public function edit(Transportation $transportation)
    {
        $destinations = Destination::all();
        $vehicles = Vehicle::all();
        return view('transportations.edit', compact('transportation', 'destinations', 'vehicles'));
    }

    /**
     * Update the specified transportation in the database.
     */
    public function update(Request $request, Transportation $transportation)
    {
        $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            'price' => 'required|numeric',
            'vehicle_id' => 'required|exists:vehicles,id',
            'available' => 'required|boolean',
            'translations' => 'nullable|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.from' => 'required|string',
            'translations.*.to' => 'required|string',
        ]);

        // Update transportation record
        $transportation->update($request->only(['destination_id', 'price', 'vehicle_id', 'available']));

        // Update translations
        if ($request->has('translations')) {
            foreach ($request->translations as $translation) {
                TransportationTranslation::updateOrCreate(
                    ['transportation_id' => $transportation->id, 'locale' => $translation['locale']],
                    ['from' => $translation['from'], 'to' => $translation['to']]
                );
            }
        }

        return redirect()->route('transportations.index')->with('success', 'Transportation updated successfully.');
    }

    /**
     * Remove the specified transportation from the database.
     */
    public function destroy(Transportation $transportation)
    {
        $transportation->delete();
        return redirect()->route('transportations.index')->with('success', 'Transportation deleted successfully.');
    }
}
