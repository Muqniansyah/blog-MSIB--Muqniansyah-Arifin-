<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller {
    public function index(){
        // Mengambil data author dengan pagination
        $authors = Author::paginate(2); // Menggunakan paginate untuk pagination
        // mengembalikkan tampilan view
        return view('authors.index', compact('authors')); 
    }

    // fungsi membuat data
    public function create() {
        return view('authors.create');
    }

    // fungsi menyimpan data
    public function store(Request $request) {
        // validasi data
        $request->validate([
            'name' => 'required|unique:authors|string|max:255',
            'email' => 'required',
        ]);
        
        // menyimpan data kedalam database
        try {
            Author::create($request->all());
            return redirect()->route('authors.index')->with('success', 'Authors created successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }

    // fungsi edit
    public function edit(Author $author) {
        return view('authors.edit', compact('author'));
        // compact('author') : menampilkan informasi author yang sedang diedit.
    }

    // fungsi update data saat edit
    public function update(Request $request, Author $author) {
        // validasi data
        $request->validate([
            'name' => 'required|unique:authors|string|max:255',
            'email' => 'required',
        ]);

        // mengupdate data kedalam database
        try {
            $author->update($request->all());
            return redirect()->route('authors.index')->with('success', 'Author updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }

    // fungsi untuk menghapus data
    public function destroy(Author $author){
        // menghapus record dari database.
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }

    // fungsi untuk show
    public function show(Author $author) {
        return view('authors.show', compact('author'));
    }
}
