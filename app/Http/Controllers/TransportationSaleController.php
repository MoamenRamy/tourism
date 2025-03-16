<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Transportation_sale;
use Illuminate\Http\Request;

class TransportationSaleController extends Controller
{
    /**
     * عرض جميع العروض مع تفاصيل الوجهة.
     */
    public function index()
    {
        $sales = Transportation_sale::with('destination')->paginate(12);
        return view('transportation_sales.index', compact('sales'));
    }

    /**
     * عرض نموذج إضافة عرض جديد.
     */
    public function create()
    {
        $destinations = Destination::all();
        return view('transportation_sales.create', compact('destinations'));
    }

    /**
     * حفظ عرض جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',
            'active' => 'required|boolean',
        ]);

        Transportation_sale::create($validated);

        return redirect()->route('transportation_sales.index')->with('success', 'تمت إضافة العرض بنجاح');
    }

    /**
     * عرض تفاصيل عرض معين.
     */
    public function show(Transportation_sale $transportationSale)
    {
        return view('transportation_sales.show', compact('transportationSale'));
    }

    /**
     * عرض نموذج تعديل عرض معين.
     */
    public function edit(Transportation_sale $transportationSale)
    {
        $destinations = Destination::all();
        return view('transportation_sales.edit', compact('transportationSale', 'destinations'));
    }

    /**
     * تحديث بيانات العرض في قاعدة البيانات.
     */
    public function update(Request $request, Transportation_sale $transportationSale)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',
            'active' => 'required|boolean',
        ]);

        $transportationSale->update($validated);

        return redirect()->route('transportation_sales.index')->with('success', 'تم تحديث العرض بنجاح');
    }

    /**
     * حذف عرض معين.
     */
    public function destroy(Transportation_sale $transportationSale)
    {
        $transportationSale->delete();
        return redirect()->route('transportation_sales.index')->with('success', 'تم حذف العرض بنجاح');
    }

    // admin

    public function adminIndex()
    {
        $sales = Transportation_sale::all();
        return view('admin.transportation_sales.index', compact('sales'));
    }
}
