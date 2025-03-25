<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Tour;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of sales.
     */
    public function index()
    {
        $sales = Sale::with('tour')->paginate(12);
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new sale.
     */
    public function create()
    {
        $tours = Tour::all();
        return view('admin.sales.create', compact('tours'));
    }

    /**
     * Store a newly created sale in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',
            'active' => 'boolean',
        ]);

        Sale::create($request->all());

        return redirect()->route('admin.sales.index')->with('flash_message', 'Sale added successfully');
    }

    /**
     * Display the specified sale.
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified sale.
     */
    public function edit(Sale $sale)
    {
        $tours = Tour::all();
        return view('admin.sales.edit', compact('sale', 'tours'));
    }

    /**
     * Update the specified sale in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',
            'active' => 'boolean',
        ]);

        $sale->update($request->all());

        return redirect()->route('admin.sales.index')->with('flash_message', 'Sale updated successfully');
    }

    /**
     * Remove the specified sale from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return back()->with('flash_message', 'Sale deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $sales = Sale::all();
        return view('admin.sales.index', compact('sales'));
    }
}
