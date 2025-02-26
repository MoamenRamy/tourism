<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Tour;
use App\Models\TourTranslation;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * عرض جميع الرحلات في واجهة العرض.
     */
    public function index()
    {
        $tours = Tour::with('translations')->paginate(12);
        return view('tours.index', compact('tours'));
    }

    /**
     * عرض نموذج إنشاء رحلة جديدة.
     */
    public function create()
    {
        return view('tours.create');
    }

    /**
     * تخزين رحلة جديدة مع الترجمات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|unique:tours,slug',
            'title' => 'required|string|unique:tours,title',
            'destination_id' => 'nullable|exists:destinations,id',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
            'duration' => 'nullable|numeric',
            'duration_type' => 'nullable|in:hours,days',
            'rating' => 'nullable|numeric|min:0|max:5',
            'available' => 'boolean',
            'additional_info' => 'nullable|string',
            'max_tickets_per_day' => 'nullable|integer',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'count' => 'integer',
            'pin' => 'boolean',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.name' => 'required|string',
            'translations.*.defination' => 'nullable|string',
            'translations.*.description' => 'required|string',
        ]);

        $tour = Tour::create($request->only([
            'slug', 'title', 'destination_id', 'category_id', 'price',
            'duration', 'duration_type', 'rating', 'available',
            'additional_info', 'max_tickets_per_day', 'longitude',
            'latitude', 'count', 'pin'
        ]));

        foreach ($request->translations as $translation) {
            $tour->translations()->create([
                'locale' => $translation['locale'],
                'name' => $translation['name'],
                'defination' => $translation['defination'] ?? null,
                'description' => $translation['description'],
            ]);
        }

        return redirect()->route('tours.index')->with('success', 'تمت إضافة الرحلة بنجاح');
    }

    /**
     * عرض تفاصيل رحلة معينة.
     */
    public function show(Tour $tour)
    {
        return view('tours.show', compact('tour'));
    }

    /**
     * عرض نموذج تعديل رحلة.
     */
    public function edit(Tour $tour)
    {
        return view('tours.edit', compact('tour'));
    }

    /**
     * تحديث بيانات الرحلة مع الترجمة.
     */
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'slug' => 'required|string|unique:tours,slug,' . $tour->id,
            'title' => 'required|string|unique:tours,title,' . $tour->id,
            'destination_id' => 'nullable|exists:destinations,id',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
            'duration' => 'nullable|numeric',
            'duration_type' => 'nullable|in:hours,days',
            'rating' => 'nullable|numeric|min:0|max:5',
            'available' => 'boolean',
            'additional_info' => 'nullable|string',
            'max_tickets_per_day' => 'nullable|integer',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'count' => 'integer',
            'pin' => 'boolean',
            'translations' => 'nullable|array',
            'translations.*.locale' => 'required|string|max:10',
            'translations.*.name' => 'required|string',
            'translations.*.defination' => 'nullable|string',
            'translations.*.description' => 'required|string',
        ]);

        $tour->update($request->only([
            'slug', 'title', 'destination_id', 'category_id', 'price',
            'duration', 'duration_type', 'rating', 'available',
            'additional_info', 'max_tickets_per_day', 'longitude',
            'latitude', 'count', 'pin'
        ]));

        if ($request->has('translations')) {
            foreach ($request->translations as $translation) {
                TourTranslation::updateOrCreate(
                    ['tour_id' => $tour->id, 'locale' => $translation['locale']],
                    ['name' => $translation['name'], 'defination' => $translation['defination'] ?? null, 'description' => $translation['description']]
                );
            }
        }

        return redirect()->route('tours.index')->with('success', 'تم تحديث الرحلة بنجاح');
    }

    /**
     * حذف الرحلة.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'تم حذف الرحلة بنجاح');
    }

    public function get_tours_by_destination($slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        $tours = Tour::where('destination_id', $destination->id)->paginate(12);
        return view('destinations.show', compact('tours', 'destination'));
    }
}
