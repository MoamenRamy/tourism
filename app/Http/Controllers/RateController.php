<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rates = Rate::with(['user', 'tour'])->paginate(12);
        return view('rates.index', compact('rates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $rate = Rate::create([
            'user_id' => Auth::id(),
            'tour_id' => $validated['tour_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return redirect()->route('rates.index')->with('success', 'Rate added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rate $rate)
    {
        if (Auth::id() !== $rate->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $rate->delete();
        return redirect()->route('rates.index')->with('success', 'Rate deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $rates = Rate::all();
        return view('admin.rates.index', compact('rates'));
    }
}
