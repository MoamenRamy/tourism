<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use App\Models\TransportationTranslation;
use App\Models\Destination;
use App\Models\Transportation_Vehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $vehicles = Vehicle::all();
        return view('admin.transportations.create', compact('destinations'));
    }

    /**
     * Store a newly created transportation in the database.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            'vehicles' => 'required|array',
            'vehicles.*.id' => 'required|exists:vehicles,id',
            'vehicles.*.price' => 'required|numeric',
            'available' => 'required|boolean',
            'translations' => 'required|array',
            'translations.*.from' => 'required|string',
            'translations.*.to' => 'required|string',
        ]);

        // Store the transportation record
        $transportation = Transportation::create($request->only(['destination_id', 'price', 'available']));

        // Store translations
        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $transportation->translateOrNew($locale)->from = $translation['from'];
                $transportation->translateOrNew($locale)->to = $translation['to'] ?? null;
            }
            $transportation->save();
        }

        // vehicles
        if (isset($validated['vehicles'])) {
            foreach ($validated['vehicles'] as $index => $vehicle) {
                $transportationVehicle = new Transportation_Vehicle();
                $transportationVehicle->transportation_id = $transportation->id;
                $transportationVehicle->vehicle_id = $vehicle['id'];
                $transportationVehicle->price = $vehicle['price'];

                $transportationVehicle->save();
            }
        }

        return redirect()->route('admin.transportations.index')->with('flash_message', 'Transportation added successfully.');
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
        return view('admin.transportations.edit', compact('transportation', 'destinations'));
    }

    /**
     * Update the specified transportation in the database.
     */
    public function update(Request $request, Transportation $transportation)
    {
        $validated = $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            // 'vehicles' => 'required|array',
            'vehicles.*.id' => 'required|exists:vehicles,id',
            'vehicles.*.price' => 'required|numeric',
            'available' => 'required|boolean',
            'translations' => 'nullable|array',
            'translations.*.from' => 'required|string',
            'translations.*.to' => 'required|string',
        ]);

        // Update transportation record
        $transportation->update($request->only(['destination_id', 'price', 'available']));

        // Update translations
        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $transportation->translateOrNew($locale)->from = $translation['from'];
                $transportation->translateOrNew($locale)->to = $translation['to'] ?? null;
            }
            $transportation->save();
        }

        // vehicles
        if (isset($validated['vehicles'])) {
            foreach ($validated['vehicles'] as $index => $vehicle) {
                $transportationVehicle = new Transportation_Vehicle();
                $transportationVehicle->transportation_id = $transportation->id;
                $transportationVehicle->vehicle_id = $vehicle['id'];
                $transportationVehicle->price = $vehicle['price'];

                $transportationVehicle->save();
            }
        }

        return redirect()->route('admin.transportations.index')->with('flash_message', 'Transportation updated successfully.');
    }

    /**
     * Remove the specified transportation from the database.
     */
    public function destroy(Transportation $transportation)
    {
        $transportation->delete();
        return back()->with('flash_message', 'Transportation deleted successfully.');
    }

    public function getDestinations(Request $request)
    {
        $from = $request->input('from');

        $destinations = DB::table('transportations')
        ->join('transportation_translations as t', 't.transportation_id', '=', 'transportations.id')
        ->where('t.locale', app()->getLocale())
        ->where('t.from', $from)
        ->select('transportations.id', 't.to')
        ->get();

        return response()->json($destinations);
    }

    // admin

    public function adminIndex()
    {
        $transportations = Transportation::all();
        return view('admin.transportations.index', compact('transportations'));
    }

    public function getVehicleInput(Request $request)
    {
        $index = $request->input('index');
        $vehicles = Vehicle::all();
        return view('admin.transportations._vehicle_input', compact('index', 'vehicles'));
    }

    public function deleteTransportationVehicle($id)
    {
        $vehicle_translation = Transportation_Vehicle::findOrfail($id);
        $vehicle_translation->delete();

        return response()->json(['message' => 'transportation vehicle deleted successfully.']);

    }
}
