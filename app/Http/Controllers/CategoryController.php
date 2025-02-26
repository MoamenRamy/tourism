<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('translations')->paginate(12);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:categories,title',
            'photo' => 'required|string',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'nullable|string',
        ]);

        $slug = Str::slug($validated['title']);

        $category = Category::create([
            'slug' => $slug,
            'title' => $validated['title'],
            'photo' => $validated['photo'],
        ]);

        foreach ($validated['translations'] as $translation) {
            $category->translateOrNew($translation['locale'])->name = $translation['name'];
            $category->translateOrNew($translation['locale'])->description = $translation['description'] ?? null;
        }
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|unique:categories,title,' . $category->id,
            'photo' => 'sometimes|string',
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.name' => 'required_with:translations|string',
            'translations.*.description' => 'nullable|string',
        ]);

        if (isset($validated['title'])) {
            $category->slug = Str::slug($validated['title']);
            $category->title = $validated['title'];
        }

        if (isset($validated['photo'])) {
            $category->photo = $validated['photo'];
        }

        $category->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $category->translateOrNew($translation['locale'])->name = $translation['name'];
                $category->translateOrNew($translation['locale'])->description = $translation['description'] ?? null;
            }
            $category->save();
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $categories = Category::with('translations')->paginate(12);
        return view('admin.categories.index', compact('categories'));
    }
}
