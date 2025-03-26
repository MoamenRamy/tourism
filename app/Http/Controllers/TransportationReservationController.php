<?php

namespace App\Http\Controllers;

use App\Models\Transportation_reservation;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Http\Request;

class TransportationReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transportations = Transportation::all();
        $currencies = Currency::all();
        $users = User::all();
        return view('admin.transportation_reservations.create', compact('transportations', 'currencies', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transportation_id' => ['required', 'exists:transportations,id'],
            'user_id' => ['required', 'exists:users,id'],
            'currency_id' => ['required', 'exists:currencies,id'],
            'price' => ['required', 'numeric'],
            'first_name' => ['required'],
            'phone' => ['required'],
            'whatsapp' => ['required'],
            'address' => ['required'],
            'guest' => ['required'],
            'reservation_dateTime' => ['required'],
            'payment_status' => ['required'],
        ]);

        $transportation_reservation = new Transportation_reservation();
        $transportation_reservation->create($request->all());

        return redirect()->route('admin.transportation_reservations.index')->with('flash_message', 'Transportation reservation added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportation_reservation $transportation_reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transportation_reservation $transportation_reservation)
    {
        $transportations = Transportation::all();
        $currencies = Currency::all();
        $users = User::all();
        return view('admin.transportation_reservations.edit', compact('transportation_reservation', 'transportations', 'currencies', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transportation_reservation $transportation_reservation)
    {
        $validated = $request->validate([
            'transportation_id' => ['required', 'exists:transportations,id'],
            'user_id' => ['required', 'exists:users,id'],
            'currency_id' => ['required', 'exists:currencies,id'],
            'price' => ['required', 'numeric'],
            'first_name' => ['required'],
            'phone' => ['required'],
            'whatsapp' => ['required'],
            'address' => ['required'],
            'guest' => ['required'],
            'reservation_dateTime' => ['required'],
            'payment_status' => ['required'],
        ]);

        $transportation_reservation->update($request->all());

        return redirect()->route('admin.transportation_reservations.index')->with('flash_message', 'Transportation reservation updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportation_reservation $transportation_reservation)
    {
        $transportation_reservation->delete();
        return back()->with('flash_message', 'Transportation reservation deleted successfuly');
    }

    // admin

    public function adminIndex()
    {
        $reservations = Transportation_reservation::all();
        return view('admin.transportation_reservations.index', compact('reservations'));
    }
}
