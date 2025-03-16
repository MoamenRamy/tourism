<?php

namespace App\Http\Controllers;

use App\Models\Transportation_common_question;
use Illuminate\Http\Request;

class TransportationCommonController extends Controller
{
    /**
     * عرض قائمة جميع الأسئلة.
     */
    public function index()
    {
        $questions = Transportation_common_question::with('translations')->paginate(12);
        return view('transportation_commons.index', compact('questions'));
    }

    /**
     * عرض نموذج إضافة سؤال جديد.
     */
    public function create()
    {
        return view('transportation_commons.create');
    }

    /**
     * تخزين سؤال جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.question' => 'required|string',
            'translations.*.answer' => 'required|string',
        ]);

        $question = Transportation_common_question::create();

        foreach ($validated['translations'] as $translation) {
            $question->translateOrNew($translation['locale'])->question = $translation['question'];
            $question->translateOrNew($translation['locale'])->answer = $translation['answer'];
        }

        $question->save();

        return redirect()->route('transportation_commons.index')->with('success', 'تمت إضافة السؤال بنجاح');
    }

    /**
     * عرض سؤال معين.
     */
    public function show($id)
    {
        $transportationCommon = Transportation_common_question::findOrFail($id);
        return view('transportation_commons.show', compact('transportationCommon'));
    }

    /**
     * عرض نموذج تعديل سؤال.
     */
    public function edit($id)
    {
        $transportationCommon = Transportation_common_question::findOrFail($id);
        return view('transportation_commons.edit', compact('transportationCommon'));
    }

    /**
     * تحديث بيانات السؤال.
     */
    public function update(Request $request, $id)
    {
        $transportationCommon = Transportation_common_question::findOrFail($id);

        $validated = $request->validate([
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.question' => 'required_with:translations|string',
            'translations.*.answer' => 'required_with:translations|string',
        ]);

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $transportationCommon->translateOrNew($translation['locale'])->question = $translation['question'];
                $transportationCommon->translateOrNew($translation['locale'])->answer = $translation['answer'];
            }
            $transportationCommon->save();
        }

        return redirect()->route('transportation_commons.index')->with('success', 'تم تحديث السؤال بنجاح');
    }

    /**
     * حذف السؤال.
     */
    public function destroy($id)
    {
        $transportationCommon = Transportation_common_question::findOrFail($id);

        $transportationCommon->delete();
        return redirect()->route('admin.transportation_questions.index')->with('success', 'تم حذف السؤال بنجاح');
    }

    // admin

    public function adminIndex()
    {
        $questions = Transportation_common_question::all();
        return view('admin.transportation_commons.index', compact('questions'));
    }
}
