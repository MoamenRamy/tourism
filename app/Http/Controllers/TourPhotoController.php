<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Tour_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourPhotoController extends Controller
{
    /**
     * Display a listing of the tour photos.
     */
    public function index()
    {
        $tourPhotos = Tour_photo::with('tour')->get();
        return view('tour_photos.index', compact('tourPhotos'));
    }

    /**
     * Show the form for creating a new tour photo.
     */
    public function create()
    {
        $tours = Tour::all();
        return view('tour_photos.create', compact('tours'));
    }

    /**
     * Store a newly created tour photo in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image
        ]);

        // Handle the uploaded photo
        $photoPath = $request->file('photo')->store('tour_photos', 'public'); // Store image

        // Create new TourPhoto entry
        Tour_photo::create([
            'tour_id' => $request->tour_id,
            'photo' => $photoPath,
        ]);

        return redirect()->route('tour_photos.index')->with('success', 'Tour photo added successfully.');
    }

    /**
     * Display the specified tour photo.
     */
    public function show(Tour_photo $tourPhoto)
    {
        return view('tour_photos.show', compact('tourPhoto'));
    }

    /**
     * Show the form for editing the specified tour photo.
     */
    public function edit(Tour_photo $tourPhoto)
    {
        $tours = Tour::all();
        return view('tour_photos.edit', compact('tourPhoto', 'tours'));
    }

    /**
     * Update the specified tour photo in storage.
     */
    public function update(Request $request, Tour_photo $tourPhoto)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image
        ]);

        if ($request->hasFile('photo')) {
            // Delete the old photo from storage
            Storage::disk('public')->delete($tourPhoto->photo);

            // Handle new photo upload
            $photoPath = $request->file('photo')->store('tour_photos', 'public');
            $tourPhoto->update([
                'tour_id' => $request->tour_id,
                'photo' => $photoPath,
            ]);
        } else {
            $tourPhoto->update($request->only('tour_id'));
        }

        return redirect()->route('tour_photos.index')->with('success', 'Tour photo updated successfully.');
    }

    /**
     * Remove the specified tour photo from storage.
     */
    public function destroy(Tour_photo $tourPhoto)
    {
        // Delete the photo from storage
        Storage::disk('public')->delete($tourPhoto->photo);

        $tourPhoto->delete();

        return redirect()->route('tour_photos.index')->with('success', 'Tour photo deleted successfully.');
    }
}
