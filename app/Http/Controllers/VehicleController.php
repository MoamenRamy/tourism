<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    /**
     * عرض جميع المركبات مع الترجمات.
     */
    public function index()
    {
        $vehicles = Vehicle::with('translations')->paginate(12);
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * عرض نموذج إضافة مركبة جديدة.
     */
    public function create()
    {
        return view('admin.vehicles.create');
    }

    /**
     * حفظ مركبة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:4',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'car_load' => 'required|integer|min:1',
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',
            'translations.*.model' => 'required|string',
        ]);
        $vehicle = new Vehicle();
        $vehicle->year = $validated['year'];
        $vehicle->car_load = $validated['car_load'];

        if ($request->hasFile('photo')) {
            if (!empty($vehicle->photo)) {
                $photoPath = storage_path('app/public/' . str_replace('storage/', '', $vehicle->photo));

                if (Storage::exists(str_replace('storage/', 'public/', $vehicle->photo))) {
                    Storage::delete(str_replace('storage/', 'public/', $vehicle->photo));
                }
                elseif (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $fileName = time() . '.' . $request->photo->extension();
            $path = $request->photo->storeAs('vehicles', $fileName, 'public');

            $vehicle->photo = $path;
        }

        $vehicle->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $vehicle->translateOrNew($locale)->name = $translation['name'];
                $vehicle->translateOrNew($locale)->model = $translation['model'] ?? null;
            }
            $vehicle->save();
        }

        return redirect()->route('admin.vehicles.index')->with('flash_message', 'Vehicle added successfuly');
    }

    /**
     * عرض تفاصيل مركبة معينة.
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * عرض نموذج تعديل مركبة معينة.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    /**
     * تحديث بيانات المركبة في قاعدة البيانات.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:4',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'car_load' => 'required|integer|min:1',
            'translations' => 'sometimes|array',
            'translations.*.name' => 'required_with:translations|string',
            'translations.*.model' => 'required_with:translations|string',
        ]);


        $vehicle->year = $validated['year'];
        $vehicle->car_load = $validated['car_load'];

        if ($request->hasFile('photo')) {
            if (!empty($vehicle->photo)) {
                $photoPath = storage_path('app/public/' . str_replace('storage/', '', $vehicle->photo));

                if (Storage::exists(str_replace('storage/', 'public/', $vehicle->photo))) {
                    Storage::delete(str_replace('storage/', 'public/', $vehicle->photo));
                }
                elseif (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $fileName = time() . '.' . $request->photo->extension();
            $path = $request->photo->storeAs('vehicles', $fileName, 'public');

            $vehicle->photo = $path;
        }

        $vehicle->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $vehicle->translateOrNew($locale)->name = $translation['name'];
                $vehicle->translateOrNew($locale)->model = $translation['model'] ?? null;
            }
            $vehicle->save();
        }

        return redirect()->route('admin.vehicles.index')->with('flash_message', 'Vehicle updated successfuly');
    }

    /**
     * حذف مركبة معينة.
     */
    public function destroy(Vehicle $vehicle)
    {
        // // حذف الصورة
        // Storage::disk('public')->delete($vehicle->photo);
        if (!empty($vehicle->photo)) {
            $photoPath = storage_path('app/public/' . str_replace('storage/', '', $vehicle->photo));

            if (Storage::exists(str_replace('storage/', 'public/', $vehicle->photo))) {
                Storage::delete(str_replace('storage/', 'public/', $vehicle->photo));
            }
            elseif (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        // حذف المركبة مع الترجمات
        $vehicle->delete();

        return back()->with('flash_message', 'Vehicle deleted successfuly!');
    }

    // admin

    public function adminIndex()
    {
        $vehicles = Vehicle::with('translations')->get();
        return view('admin.vehicles.index', compact('vehicles'));
    }
}
