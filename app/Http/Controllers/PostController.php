<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Mengambil data post dengan pagination dan memuat relasi category
        $posts = Post::with('category')->paginate(5); // Menggunakan eager loading dan pagination sekaligus
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // ambil semua data category dan author dari database
        $categories = Category::all();
        $authors = Author::all();

        // kirim data category dan author ke view
        return view('posts.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published'  => 'nullable|boolean',
            'category_id'   => 'required|exists:categories,id',
            'author_id'   => 'required|exists:authors,id',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'is_published' => $request->is_published ?? false,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id
            ]);
            return redirect()->route('posts.index')->with('success', 'Category created successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $authors = Author::all();
        
        return view('posts.edit', compact('post', 'categories', 'authors'));
    }

    public function update(Request $request, Post $post)
    {
        // validasi data 
        $request->validate([
            'title'        => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id', // pastikan category_id ada di tabel categorie
            'author_id' => 'required|exists:authors,id', // pastikan author_id ada di tabel users
        ]);

        try {
            $imagePath = $post->image; // simpan gambar lama jika tidak ada yang baru
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'is_published' => $request->is_published ?? false,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id
            ]);
            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Posts deleted successfully');
    }

    // fungsi untuk show
    public function show(Post $post) {
        // Memuat relasi kategori untuk objek $post yang sudah ada
        $post->load('category');
        $post->load('author');
    
        // Jika ada old('category_id'), cari category berdasarkan old value
        $category = old('category_id') ? Category::find(old('category_id')) : $post->category;
        
        // Jika ada old('author_id'), cari author berdasarkan old value
        $author = old('author_id') ? Author::find(old('author_id')) : $post->author;

        // Mengirim $post dan $category ke view
        return view('posts.show', compact('post', 'category', 'author'));
    }
}
