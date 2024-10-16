@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1 class="text-center mb-4">Create Post</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the post title" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" placeholder="Write the post content" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control" required>
                <option value="">Choose a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="author">Author</label>
            <select name="author_id" id="author" class="form-control" required>
                <option value="">Choose an author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_published" id="isPublished" class="form-check-input">
            <label for="isPublished" class="form-check-label">Publish</label>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Submit
            </button>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
        </div>
    </form>
@endsection
