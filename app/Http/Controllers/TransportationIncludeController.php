<?php

namespace App\Http\Controllers;

use App\Models\Transportation_include;
use Illuminate\Http\Request;

class TransportationIncludeController extends Controller
{
    /**
     * عرض جميع السجلات مع الترجمات.
     */
    public function index()
    {
        $includes = Transportation_include::with('translations')->paginate(12);
        return view('transportation_includes.index', compact('includes'));
    }

    /**
     * عرض نموذج إنشاء جديد.
     */
    public function create()
    {
        return view('transportation_includes.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'include' => 'required|boolean',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string',
        ]);

        $include = Transportation_include::create(['include' => $validated['include']]);

        foreach ($validated['translations'] as $translation) {
            $include->translateOrNew($translation['locale'])->name = $translation['name'];
        }
        $include->save();

        return redirect()->route('transportation_includes.index')->with('success', 'تمت الإضافة بنجاح');
    }

    /**
     * عرض سجل معين.
     */
    public function show(Transportation_include $transportationInclude)
    {
        return view('transportation_includes.show', compact('transportationInclude'));
    }

    /**
     * عرض نموذج تعديل سجل معين.
     */
    public function edit(Transportation_include $transportationInclude)
    {
        return view('transportation_includes.edit', compact('transportationInclude'));
    }

    /**
     * تحديث سجل معين.
     */
    public function update(Request $request, Transportation_include $transportationInclude)
    {
        $validated = $request->validate([
            'include' => 'sometimes|boolean',
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.name' => 'required_with:translations|string',
        ]);

        if (isset($validated['include'])) {
            $transportationInclude->update(['include' => $validated['include']]);
        }

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $transportationInclude->translateOrNew($translation['locale'])->name = $translation['name'];
            }
            $transportationInclude->save();
        }

        return redirect()->route('transportation_includes.index')->with('success', 'تم التحديث بنجاح');
    }

    /**
     * حذف سجل معين.
     */
    public function destroy(Transportation_include $transportationInclude)
    {
        $transportationInclude->delete();
        return redirect()->route('transportation_includes.index')->with('success', 'تم الحذف بنجاح');
    }
}
