<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian
        $search = $request->input('search');
        
        // Jika ada pencarian, filter data category berdasarkan nama
        if ($search) {
            $categories = Category::where('name', 'like', "%{$search}%")->paginate(5);
        } else {
            // Jika tidak ada pencarian, tampilkan semua data dengan pagination
            $categories = Category::paginate(5);
        }

        // Kembalikan ke view dengan data categories dan pencarian
        return view('categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:categories|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            Category::create($request->all());
            return redirect()->route('categories.index')->with('success', 'Category created successfully');
        } catch (\Exception $err) {
            return redirect()->route('categories.index')->with('error', $err->getMessage());
        }
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|unique:categories|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $category->update($request->all());
            return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('categories.index')->with('error', $err->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }

    // fungsi untuk show
    public function show(Category $category) {
        return view('categories.show', compact('category'));
    }
}
