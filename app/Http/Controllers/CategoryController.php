<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:categories,title',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'nullable|string',
        ]);

        $slug = Str::slug($validated['title']);

        // $category = Category::create([
        //     'slug' => $slug,
        //     'title' => $validated['title'],
        // ]);

        $category = new Category();

        $category->slug = $slug;
        $category->title = $validated['title'];
        // $category->photo = $request->file('photo')->store('categories', 'public');

        if ($request->hasFile('photo')) {

            $fileName = time() . '.' . $request->photo->extension();
            $path = $request->photo->storeAs('categories', $fileName, 'public');

            $category->photo = $path;
        }

        $category->save();


        if(isset($validated['translations'])) {

            foreach ($validated['translations'] as $locale => $translation) {
                $category->translateOrNew($locale)->name = $translation['name'];
                $category->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
        }
        $category->save();

        return redirect()->route('admin.categories.index')->with('flash_message', 'Category created successfully');
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
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|unique:categories,title,' . $category->slug,
            // 'title' => [
            //     'sometimes',
            //     'string',
            //     Rule::unique('categories', 'title')->ignore($category->id),
            // ],
            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'translations' => 'sometimes|array',
            'translations.*.name' => 'required_with:translations|string',
            'translations.*.description' => 'nullable|string',
        ]);

        if (isset($validated['title'])) {
            $category->title = $validated['title'];
            $category->slug = Str::slug($validated['title']);
        }

        if ($request->hasFile('photo')) {
            if (!empty($category->photo)) {
                $photoPath = storage_path('app/public/' . str_replace('storage/', '', $category->photo));

                if (Storage::exists(str_replace('storage/', 'public/', $category->photo))) {
                    Storage::delete(str_replace('storage/', 'public/', $category->photo));
                }
                elseif (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $fileName = time() . '.' . $request->photo->extension();
            $path = $request->photo->storeAs('categories', $fileName, 'public');

            $category->photo = $path;
        }

        $category->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $locale => $translation) {
                $category->translateOrNew($locale)->name = $translation['name'];
                $category->translateOrNew($locale)->description = $translation['description'] ?? null;
            }
            $category->save();
        }

        return redirect()->route('admin.categories.index')->with('flash_message', 'Category updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('flash_message', 'Category deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $categories = Category::with('translations')->get();
        return view('admin.categories.index', compact('categories'));
    }
}
