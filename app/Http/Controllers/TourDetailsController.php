<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Tour_detail;
use App\Models\Tour_detailTranslation;
use Illuminate\Http\Request;

class TourDetailsController extends Controller
{
    /**
     * عرض جميع تفاصيل الرحلات في واجهة العرض.
     */
    public function index()
    {
        $tourDetails = Tour_detail::with('translations', 'tour')->get();
        return view('tour_details.index', compact('tourDetails'));
    }

    /**
     * عرض نموذج إنشاء تفاصيل رحلة جديدة.
     */
    public function create()
    {
        $tours = Tour::all();
        return view('tour_details.create', compact('tours'));
    }

    /**
     * تخزين تفاصيل الرحلة الجديدة مع الترجمات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'duration' => 'nullable|integer',
            'duration_type' => 'nullable|in:hours,days',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.address' => 'required|string',
            'translations.*.description' => 'required|string',
        ]);

        $tourDetail = Tour_detail::create($request->only(['tour_id', 'duration', 'duration_type']));

        foreach ($request->translations as $translation) {
            $tourDetail->translations()->create([
                'locale' => $translation['locale'],
                'address' => $translation['address'],
                'description' => $translation['description'],
            ]);
        }

        return redirect()->route('tour_details.index')->with('success', 'تمت إضافة تفاصيل الرحلة بنجاح');
    }

    /**
     * عرض تفاصيل رحلة معينة.
     */
    public function show(Tour_detail $tourDetail)
    {
        return view('tour_details.show', compact('tourDetail'));
    }

    /**
     * عرض نموذج تعديل تفاصيل رحلة.
     */
    public function edit(Tour_detail $tourDetail)
    {
        $tours = Tour::all();
        return view('tour_details.edit', compact('tourDetail', 'tours'));
    }

    /**
     * تحديث بيانات تفاصيل الرحلة مع الترجمة.
     */
    public function update(Request $request, Tour_detail $tourDetail)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'duration' => 'nullable|integer',
            'duration_type' => 'nullable|in:hours,days',
            'translations' => 'nullable|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.address' => 'required|string',
            'translations.*.description' => 'required|string',
        ]);

        $tourDetail->update($request->only(['tour_id', 'duration', 'duration_type']));

        if ($request->has('translations')) {
            foreach ($request->translations as $translation) {
                Tour_detailTranslation::updateOrCreate(
                    ['tour_detail_id' => $tourDetail->id, 'locale' => $translation['locale']],
                    ['address' => $translation['address'], 'description' => $translation['description']]
                );
            }
        }

        return redirect()->route('tour_details.index')->with('success', 'تم تحديث تفاصيل الرحلة بنجاح');
    }

    /**
     * حذف تفاصيل الرحلة.
     */
    public function destroy(Tour_detail $tourDetail)
    {
        $tourDetail->delete();
        return redirect()->route('tour_details.index')->with('success', 'تم حذف تفاصيل الرحلة بنجاح');
    }
}
