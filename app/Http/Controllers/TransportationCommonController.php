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
        return view('admin.transportation_commons.create');
    }

    /**
     * تخزين سؤال جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'translations' => 'required|array',
            'translations.*.question' => 'required|string',
            'translations.*.answer' => 'required|string',
        ]);

        $question = Transportation_common_question::create();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $question->translateOrNew($locale)->question = $translation['question'];
                $question->translateOrNew($locale)->answer = $translation['answer'] ?? null;
            }
            $question->save();
        }

        return redirect()->route('admin.transportation_questions.index')->with('flash_message', 'Transportation common question added successfuly');
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
        return view('admin.transportation_commons.edit', compact('transportationCommon'));
    }

    /**
     * تحديث بيانات السؤال.
     */
    public function update(Request $request, $id)
    {
        $transportationCommon = Transportation_common_question::findOrFail($id);
        
        $validated = $request->validate([
            'translations' => 'sometimes|array',
            'translations.*.question' => 'required_with:translations|string',
            'translations.*.answer' => 'required_with:translations|string',
        ]);

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $transportationCommon->translateOrNew($locale)->question = $translation['question'];
                $transportationCommon->translateOrNew($locale)->answer = $translation['answer'] ?? null;
            }
            $transportationCommon->save();
        }

        return redirect()->route('admin.transportation_questions.index')->with('flash_message', 'Transportation common question updated successfuly');
    }

    /**
     * حذف السؤال.
     */
    public function destroy($id)
    {
        $transportationCommon = Transportation_common_question::findOrFail($id);

        $transportationCommon->delete();
        return back()->with('flash_message', 'Transportation common question deleted successfuly');
    }

    // admin

    public function adminIndex()
    {
        $questions = Transportation_common_question::all();
        return view('admin.transportation_commons.index', compact('questions'));
    }
}
