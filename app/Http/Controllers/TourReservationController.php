<?php

namespace App\Http\Controllers;

use App\Models\Tour_reservation;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class TourReservationController extends Controller
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
        $tours = Tour::all();
        $users = User::all();
        $currencies = Currency::all();
        return view('admin.tour_reservations.create', compact('tours', 'users', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'nullable|exists:tours,id',
            'user_id' => 'nullable|exists:users,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'guest' => 'required|integer|min:1',
            'reservation_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'currency_id' => 'required|exists:currencies,id',
            'note' => 'nullable|string',
            'payment_status' => 'required|in:unpaid,deposit,paid',
        ]);

        $tour = Tour::findOrFail($validated['tour_id']);
        $tour_reservation = new Tour_reservation();

        $tour_reservation->tour_id = $validated['tour_id'];
        $tour_reservation->user_id = $validated['user_id'];
        $tour_reservation->first_name = $validated['first_name'];
        $tour_reservation->last_name = $validated['last_name'];
        $tour_reservation->address = $validated['address'];
        $tour_reservation->guest = $validated['guest'];
        $tour_reservation->reservation_date = $validated['reservation_date'];
        $tour_reservation->phone = $validated['phone'];
        $tour_reservation->whatsapp = $validated['whatsapp'];
        $tour_reservation->currency_id = $validated['currency_id'];
        $tour_reservation->note = $validated['note'];
        $tour_reservation->payment_status = $validated['payment_status'];

        $tour_reservation->price = $tour->price;

        $tour_reservation->save();

        return redirect()->route('admin.tour-reservations.index')->with('flash_message', 'reservation added successfuly!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tour_reservation $tour_reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour_reservation $tour_reservation)
    {
        $tours = Tour::all();
        $users = User::all();
        $currencies = Currency::all();
        return view('admin.tour_reservations.edit', compact('tour_reservation', 'tours', 'currencies', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour_reservation $tour_reservation)
    {
        // dd($request->all());

        $validated = $request->validate([
            'tour_id' => 'nullable|exists:tours,id',
            'user_id' => 'nullable|exists:users,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'guest' => 'required|integer|min:1',
            'reservation_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'currency_id' => 'required|exists:currencies,id',
            'note' => 'nullable|string',
            'payment_status' => 'required|in:unpaid,deposit,paid',
        ]);


        $tour_id = $request->input('tour_id');
        $tour = Tour::findOrFail($tour_id);

        $tour_reservation->tour_id = $tour_id;
        $tour_reservation->user_id = $validated['user_id'];
        $tour_reservation->first_name = $validated['first_name'];
        $tour_reservation->last_name = $validated['last_name'];
        $tour_reservation->address = $validated['address'];
        $tour_reservation->guest = $validated['guest'];
        $tour_reservation->reservation_date = $validated['reservation_date'];
        $tour_reservation->phone = $validated['phone'];
        $tour_reservation->whatsapp = $validated['whatsapp'];
        $tour_reservation->currency_id = $validated['currency_id'];
        $tour_reservation->note = $validated['note'];
        $tour_reservation->payment_status = $validated['payment_status'];

        $tour_reservation->price = $tour->price;

        $tour_reservation->save();

        return redirect()->route('admin.tour-reservations.index')->with('flash_message', 'reservation updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour_reservation $tour_reservation)
    {
        $tour_reservation->delete();
        return back()->with('flash_message', 'reservation deleted successfuly!');
    }

    // admin

    public function adminIndex()
    {
        $tourReservations = Tour_reservation::all();
        return view('admin.tour_reservations.index', compact('tourReservations'));
    }
}
