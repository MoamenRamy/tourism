<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use App\Models\TransportationTranslation;
use App\Models\Destination;
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
        $vehicles = Vehicle::all();
        return view('admin.transportations.create', compact('destinations', 'vehicles'));
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
            'translations.*.from' => 'required|string',
            'translations.*.to' => 'required|string',
        ]);

        // Store the transportation record
        $transportation = Transportation::create($request->only(['destination_id', 'price', 'vehicle_id', 'available']));

        // Store translations
        if (isset($request->translations)) {
            foreach ($request->translations as $locale => $translation) {
                $transportation->translateOrNew($locale)->from = $translation['from'];
                $transportation->translateOrNew($locale)->to = $translation['to'] ?? null;
            }
            $transportation->save();
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
        $vehicles = Vehicle::all();
        return view('admin.transportations.edit', compact('transportation', 'destinations', 'vehicles'));
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
            'translations.*.from' => 'required|string',
            'translations.*.to' => 'required|string',
        ]);

        // Update transportation record
        $transportation->update($request->only(['destination_id', 'price', 'vehicle_id', 'available']));

        // Update translations
        if (isset($request->translations)) {
            foreach ($request->translations as $locale => $translation) {
                $transportation->translateOrNew($locale)->from = $translation['from'];
                $transportation->translateOrNew($locale)->to = $translation['to'] ?? null;
            }
            $transportation->save();
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

    // admin

    public function adminIndex()
    {
        $transportations = Transportation::all();
        return view('admin.transportations.index', compact('transportations'));
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
}
