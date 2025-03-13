<?php

namespace App\Http\Controllers;

use App\Models\Common_question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Common_question::with('translations')->paginate(12);
        return view('common_questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('common_questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.question' => 'required|string',
            'translations.*.answer' => 'required|string',
        ]);

        $question = Common_question::create();

        foreach ($validated['translations'] as $translation) {
            $question->translateOrNew($translation['locale'])->question = $translation['question'];
            $question->translateOrNew($translation['locale'])->answer = $translation['answer'];
        }
        $question->save();

        return redirect()->route('common_questions.index')->with('success', 'Question added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Common_question $commonQuestion)
    {
        return view('common_questions.show', compact('commonQuestion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Common_question $commonQuestion)
    {
        return view('common_questions.edit', compact('commonQuestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Common_question $commonQuestion)
    {
        $validated = $request->validate([
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.question' => 'required_with:translations|string',
            'translations.*.answer' => 'required_with:translations|string',
        ]);

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $commonQuestion->translateOrNew($translation['locale'])->question = $translation['question'];
                $commonQuestion->translateOrNew($translation['locale'])->answer = $translation['answer'];
            }
            $commonQuestion->save();
        }

        return redirect()->route('common_questions.index')->with('success', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Common_question $commonQuestion)
    {
        $commonQuestion->delete();
        return redirect()->route('common_questions.index')->with('success', 'Question deleted successfully');
    }

        // admin

        public function adminIndex()
        {
            $questions = Common_question::with('translations')->get();
            return view('admin.common_questions.index', compact('questions'));
        }
}
