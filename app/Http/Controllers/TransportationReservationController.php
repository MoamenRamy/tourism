<?php

namespace App\Http\Controllers;

use App\Models\Transportation_reservation;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Transportation;
use App\Models\Transportation_common_question;
use App\Models\Transportation_Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // home

    public function pricing(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'reservation_dateTime' => 'required|string',
        ]);

        $from = $request->from;
        $to = $request->to;
        $reservation_dateTime = $request->reservation_dateTime;

        $locale = app()->getLocale(); // or set it directly

        $transportation = Transportation::whereHas('translations', function ($query) use ($from, $to, $locale) {
            $query->where('locale', $locale)
                ->where('from', $from)
                ->where('to', $to);
        })->first();

        $transportation_vehicle = $transportation->vehicles;
        $questions = Transportation_common_question::all();
        // $v1 = $transportation_vehicle[1]['year'];
        // dd($v1);

        return view('transportations.pricing', compact('from', 'to', 'reservation_dateTime' , 'transportation', 'transportation_vehicle', 'questions'));
    }

    public function showBookingForm(Request $request)
    {
        // Show the form
        return view('your.booking.form.view');
    }

    public function booking(Request $request)
    {
        $validated = $request->validate([
            // 'vehicle_id' => 'required|exists:transportation_vehicle,id',
            'from' => 'required|string',
            'to' => 'required|string',
            'reservation_dateTime' => 'required|string',
            'transportation_id' => 'required|string',
        ]);

        // $vehicle_id = $validated['vehicle_id'];
        $transportation_vehicle_id = $request->vehicle_id;
        $from = $validated['from'];
        $to = $validated['to'];
        $reservation_dateTime = $validated['reservation_dateTime'];
        $transportation_id = $validated['transportation_id'];
        $price = $request->price;

        $currencies = Currency::all();


        // You can now use $validated['vehicle_id'], etc.
        // Redirect to confirmation page or show summary
        return view('transportations.confirm', compact('transportation_vehicle_id', 'from', 'to', 'reservation_dateTime', 'transportation_id', 'currencies', 'price'));
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'transportation_id' => ['required', 'exists:transportations,id'],
            // 'user_id' => ['required', 'exists:users,id'],
            'currency_id' => ['required', 'exists:currencies,id'],
            // 'price' => ['required', 'numeric'],
            'first_name' => ['required'],
            'phone' => ['required'],
            'whatsapp' => ['required'],
            'address' => ['required'],
            'guest' => ['required', 'numeric'],
            'reservation_dateTime' => ['required'],
            // 'payment_status' => ['required'],
        ]);

        // $transportation = Transportation::findOrFail($request->transportation_id);
        // dd($transportation->price);
        // $transportation_vehicle = Transportation_Vehicle::findOrFail($request->vehicle_id);
        // dd($transportation_vehicle->pivot->price);

        $transportation_reservation = new Transportation_reservation();
        // $transportation_reservation->create($request->all());
        $transportation_reservation->transportation_id = $request->transportation_id;
        if (Auth::user()) {
            $transportation_reservation->user_id = Auth::user()->id;
        }
        $transportation_reservation->currency_id = $request->currency_id;
        // $transportation_reservation->price = $transportation_vehicle->pivot->price;
        $transportation_reservation->price = $request->price;
        $transportation_reservation->first_name = $request->first_name;
        $transportation_reservation->last_name = $request->last_name;
        $transportation_reservation->phone = $request->phone;
        $transportation_reservation->whatsapp = $request->whatsapp;
        $transportation_reservation->address = $request->address;
        $transportation_reservation->hotel = $request->hotel;
        $transportation_reservation->flight_number = $request->flight_number;
        $transportation_reservation->guest = $request->guest;
        $transportation_reservation->note = $request->note;
        // $transportation_reservation->vehicle_id = $request->transportation_vehicle_id;
        // $transportation_reservation->from = $request->from;
        // $transportation_reservation->to = $request->to;
        $transportation_reservation->reservation_dateTime = $request->reservation_dateTime;

        $transportation_reservation->save();

        return redirect()->route('home')->with('success', 'Transportation reservation confirmed successfuly');
    }

    // admin

    public function adminIndex()
    {
        $reservations = Transportation_reservation::all();
        return view('admin.transportation_reservations.index', compact('reservations'));
    }
}
