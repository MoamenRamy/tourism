<?php

namespace App\Http\Controllers;

use App\Models\Tour_reservation;
use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour_reservation $tour_reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour_reservation $tour_reservation)
    {
        //
    }

    // admin

    public function adminIndex()
    {
        $tourReservations = Tour_reservation::all();
        return view('admin.tour_reservations.index', compact('tourReservations'));
    }
}
