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
        return view('vehicles.create');
    }

    /**
     * حفظ مركبة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:4',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_load' => 'required|integer|min:1',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string',
            'translations.*.model' => 'required|string',
        ]);

        // حفظ الصورة
        $path = $request->file('photo')->store('vehicles', 'public');

        // إنشاء المركبة
        $vehicle = Vehicle::create([
            'year' => $validated['year'],
            'photo' => $path,
            'car_load' => $validated['car_load'],
        ]);

        // حفظ الترجمات
        foreach ($validated['translations'] as $translation) {
            $vehicle->translations()->create([
                'locale' => $translation['locale'],
                'name' => $translation['name'],
                'model' => $translation['model'],
            ]);
        }

        return redirect()->route('vehicles.index')->with('success', 'تمت إضافة المركبة بنجاح');
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
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * تحديث بيانات المركبة في قاعدة البيانات.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:4',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_load' => 'required|integer|min:1',
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.name' => 'required_with:translations|string',
            'translations.*.model' => 'required_with:translations|string',
        ]);

        // تحديث بيانات المركبة
        $vehicle->update([
            'year' => $validated['year'],
            'car_load' => $validated['car_load'],
        ]);

        // تحديث الصورة في حال تم رفع صورة جديدة
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة
            Storage::disk('public')->delete($vehicle->photo);
            $path = $request->file('photo')->store('vehicles', 'public');
            $vehicle->update(['photo' => $path]);
        }

        // تحديث الترجمات
        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $vehicle->translations()->updateOrCreate(
                    ['locale' => $translation['locale']],
                    ['name' => $translation['name'], 'model' => $translation['model']]
                );
            }
        }

        return redirect()->route('vehicles.index')->with('success', 'تم تحديث المركبة بنجاح');
    }

    /**
     * حذف مركبة معينة.
     */
    public function destroy(Vehicle $vehicle)
    {
        // حذف الصورة
        Storage::disk('public')->delete($vehicle->photo);

        // حذف المركبة مع الترجمات
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'تم حذف المركبة بنجاح');
    }
}
