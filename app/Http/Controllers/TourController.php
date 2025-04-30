<?php

namespace App\Http\Controllers;

use App\Models\Additional_service;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Include_service;
use App\Models\Include_service_tour;
use Illuminate\Support\Str;
use App\Models\Tour;
use App\Models\Tour_detail;
use App\Models\Tour_photo;
use App\Models\TourTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $additionals = Additional_service::all();
        $includes = Include_service::where('include', 1)->get();
        $notIncludes = Include_service::where('include', 0)->get();

        return view('admin.tours.create', compact('categories', 'destinations', 'additionals', 'includes', 'notIncludes'));
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
            'additionals' => 'nullable|array',
            'additionals.*' => 'exists:additional_services,id',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate multiple photos
            'details.*.duration' => 'required|string',
            'details.*.duration_type' => 'required|string',
            'details.*.translations.*.description' => 'required|string',
            'details.*.translations.*.address' => 'required|string',
            'includes' => 'nullable|array',
            'includes.*' => 'exists:include_services,id',
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

        // tour (details)
        if (isset($validated['details'])) {
            foreach ($validated['details'] as $index => $detail) {
                $tourDetail = new Tour_detail();
                $tourDetail->tour_id = $tour->id;
                $tourDetail->duration = $detail['duration'];
                $tourDetail->duration_type = $detail['duration_type'];

                // (address, description)
                if (isset($detail['translations'])) {
                    foreach ($validated['translations'] as $locale => $translation) {
                        $tourDetail->translateOrNew($locale)->description = $detail['translations'][$locale]['description'] ?? null;
                        $tourDetail->translateOrNew($locale)->address = $detail['translations'][$locale]['address'] ?? null;
                    }
                }

                $tourDetail->save();
            }
        }

        // Handle new uploaded photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() . '_' . uniqid() . '.' . $photo->extension();
                $path = $photo->storeAs('tour_photos', $fileName, 'public');

                $tour->photos()->create([
                    'photo' => $path,
                ]);
            }
        }


        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $tour->translateOrNew($locale)->name = $translation['name'];
                $tour->translateOrNew($locale)->defination = $translation['defination'] ?? null;
                $tour->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $tour->save();
        }

        // addition service
        // Attach selected additionals to pivot table
        if (isset($validated['additionals'])) {
            $tour->additionalServiceTours()->sync($validated['additionals']);
        }

        // include services
        if (isset($validated['includes'])) {
            $tour->includeServiceTours()->sync($validated['includes'] ?? []);
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

        $tour->load('additionalServiceTours'); // This ensures $tour->additionals is not null
        $additionals = Additional_service::all();

        $tour->load('includeServiceTours');
        $includes = Include_service::where('include', 1)->get();
        $notIncludes = Include_service::where('include', 0)->get();

        return view('admin.tours.edit', compact('tour', 'categories', 'destinations', 'additionals', 'includes', 'notIncludes'));
    }

    /**
     * تحديث بيانات الرحلة مع الترجمة.
     */
    public function update(Request $request, Tour $tour)
    {

        $validated = $request->validate([
            // 'slug' => 'required|string|unique:tours,slug,' . $tour->id,
            // 'title' => 'required|string|unique:tours,title,' . $tour->id,
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
            'additionals' => 'nullable|array',
            'additionals.*' => 'exists:additional_services,id',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate multiple photos
            'details.*.duration' => 'required|string',
            'details.*.duration_type' => 'required|string',
            'details.*.translations.*.description' => 'required|string',
            'details.*.translations.*.address' => 'required|string',
            'includes' => 'nullable|array',
            'includes.*' => 'exists:include_services,id',
        ]);
        // $tour->update($request->only([
        //     'slug', 'title', 'destination_id', 'category_id', 'price',
        //     'duration', 'duration_type', 'rating', 'available',
        //     'additional_info', 'max_tickets_per_day', 'longitude',
        //     'latitude', 'count', 'pin'
        // ]));
        // $tour->title = $validated['title'];
        // $tour->slug = Str::slug($validated['title']);
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

        // tour (details)
        if (isset($validated['details'])) {
            foreach ($validated['details'] as $index => $detail) {
                $tourDetail = new Tour_detail();
                $tourDetail->tour_id = $tour->id;
                $tourDetail->duration = $detail['duration'];
                $tourDetail->duration_type = $detail['duration_type'];

                // (address, description)
                if (isset($detail['translations'])) {
                    foreach ($validated['translations'] as $locale => $translation) {
                        $tourDetail->translateOrNew($locale)->description = $detail['translations'][$locale]['description'] ?? null;
                        $tourDetail->translateOrNew($locale)->address = $detail['translations'][$locale]['address'] ?? null;
                    }
                }

                $tourDetail->save();
            }
        }

        // First, delete old photos
        // if ($tour->photos->isNotEmpty()) {
        //     foreach ($tour->photos as $oldPhoto) {
        //         // Delete the file from storage
        //         Storage::disk('public')->delete($oldPhoto->photo);

        //         // Delete the record from the database
        //         $oldPhoto->delete();
        //     }
        // }
        // Handle new uploaded photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() . '_' . uniqid() . '.' . $photo->extension();
                $path = $photo->storeAs('tour_photos', $fileName, 'public');

                $tour->photos()->create([
                    'photo' => $path,
                ]);
            }
        }


        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $tour->translateOrNew($locale)->name = $translation['name'];
                $tour->translateOrNew($locale)->defination = $translation['defination'] ?? null;
                $tour->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $tour->save();
        }

        // addition service
        // Sync additionals (this will remove old ones and attach new ones)
        $tour->additionalServiceTours()->sync($validated['additionals'] ?? []);

        // include services
        $tour->includeServiceTours()->sync($validated['includes'] ?? []);

        // return redirect()->route('admin.tours.index')->with('flash_message', 'tour updated successfuly!');
        return back()->with('flash_message', 'tour updated successfuly!');
    }

    /**
     * delete tour
     */
    public function destroy(Tour $tour)
    {

        // details
        $tour->details()->delete();

        // First, delete old photos
        if ($tour->photos->isNotEmpty()) {
            foreach ($tour->photos as $oldPhoto) {
                // Delete the file from storage
                Storage::disk('public')->delete($oldPhoto->photo);

                // Delete the record from the database
                $oldPhoto->delete();
            }
        }

        $tour->additionalServiceTours()->detach(); // removes all related records from tour_additions
        $tour->includeServiceTours()->detach(); // removes all related records from include_tours

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

    public function getTourDetailInput(Request $request)
    {
        $index = $request->input('index');
        return view('admin.tours._tour_detail_input', compact('index'));
    }
}
