@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="text-center">Edit Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data" class="mb-3"> <!-- enctype="multipart/form-data" digunakan untuk memungkinkan pengunggahan file -->
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content') ?? $post->content }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select name="category_id" class="form-select">
                <option value="">Choose</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id') ?? $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="author">Author</label>
            <select name="author_id" class="form-select">
                <option value="">Choose</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ (old('author_id') ?? $post->author_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control mb-3">
            @if ($post->image)
                <p>Current Image:</p>
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" width="100">
            @endif
        </div>
        <div class="form-check mb-3">
            <input type="hidden" name="is_published" value="0"> <!-- Nilai default ketika checkbox tidak dicentang -->
            <input type="checkbox" name="is_published" id="isPublished" class="form-check-input" value="1">
            <label for="isPublished" class="form-check-label">Publish</label>
        </div>
        <div class="d-flex justify-content-between mt-3"> 
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </form>
    
@endsection