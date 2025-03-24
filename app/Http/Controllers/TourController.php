<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Support\Str;
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
        $categories = Category::all();
        $destinations = Destination::all();
        return view('admin.tours.create', compact('categories', 'destinations'));
    }

    /**
     * تخزين رحلة جديدة مع الترجمات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'slug' => 'required|string|unique:tours,slug',
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
            'translations.*.name' => 'required|string',
            'translations.*.defination' => 'nullable|string',
            'translations.*.description' => 'required|string',
        ]);

        $tour = new Tour();
        $tour->title = $validated['title'];
        $tour->slug = Str::slug($validated['title']);
        $tour->destination_id = $validated['destination_id'];
        $tour->category_id = $validated['category_id'];
        $tour->price = $validated['price'];
        $tour->duration = $validated['duration'];
        $tour->duration_type = $validated['duration_type'];
        $tour->rating = $validated['rating'];
        $tour->available = $validated['available'];
        $tour->additional_info = $validated['additional_info'];
        $tour->max_tickets_per_day = $validated['max_tickets_per_day'];
        $tour->longitude = $validated['longitude'];
        $tour->latitude = $validated['latitude'];
        $tour->count = $validated['count'];
        $tour->pin = $validated['pin'];
        $tour->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $tour->translateOrNew($locale)->name = $translation['name'];
                $tour->translateOrNew($locale)->defination = $translation['defination'] ?? null;
                $tour->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $tour->save();
        }

        return redirect()->route('admin.tours.index')->with('flash_message', 'tour added successfuly!');
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
        $categories = Category::all();
        $destinations = Destination::all();
        return view('admin.tours.edit', compact('tour', 'categories', 'destinations'));
    }

    /**
     * تحديث بيانات الرحلة مع الترجمة.
     */
    public function update(Request $request, Tour $tour)
    {

        $validated = $request->validate([
            // 'slug' => 'required|string|unique:tours,slug,' . $tour->id,
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
            'translations.*.name' => 'required|string',
            'translations.*.defination' => 'nullable|string',
            'translations.*.description' => 'required|string',
        ]);
        // $tour->update($request->only([
        //     'slug', 'title', 'destination_id', 'category_id', 'price',
        //     'duration', 'duration_type', 'rating', 'available',
        //     'additional_info', 'max_tickets_per_day', 'longitude',
        //     'latitude', 'count', 'pin'
        // ]));
        $tour->title = $validated['title'];
        $tour->slug = Str::slug($validated['title']);
        $tour->destination_id = $validated['destination_id'];
        $tour->category_id = $validated['category_id'];
        $tour->price = $validated['price'];
        $tour->duration = $validated['duration'];
        $tour->duration_type = $validated['duration_type'];
        $tour->rating = $validated['rating'];
        $tour->available = $validated['available'];
        $tour->additional_info = $validated['additional_info'];
        $tour->max_tickets_per_day = $validated['max_tickets_per_day'];
        $tour->longitude = $validated['longitude'];
        $tour->latitude = $validated['latitude'];
        $tour->count = $validated['count'];
        $tour->pin = $validated['pin'];
        $tour->save();


        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $tour->translateOrNew($locale)->name = $translation['name'];
                $tour->translateOrNew($locale)->defination = $translation['defination'] ?? null;
                $tour->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $tour->save();
        }

        return redirect()->route('admin.tours.index')->with('flash_message', 'tour updated successfuly!');
    }

    /**
     * حذف الرحلة.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return back()->with('flash_message', 'tour deleted successfuly!');
    }

    public function get_tours_by_destination($slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        $tours = Tour::where('destination_id', $destination->id)->paginate(12);
        return view('destinations.show', compact('tours', 'destination'));
    }

    //admin

    public function adminIndex()
    {
        $tours = Tour::with('translations')->get();
        // $tours = Tour::with('translations')->paginate(20);
        // error when get obj without name

        return view('admin.tours.index', compact('tours'));
    }
}
