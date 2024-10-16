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

    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" value="{{ old('content') ?? $post->content }}" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Choose</option>
                @foreach ($categories as $category)
                    <option value="{{ old('category_id') ?? $post->category_id }}"></option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <select name="author_id" class="form-control">
                <option value="">Choose</option>
                @foreach ($authors as $author)
                    <option value="{{ old('author_id') ?? $post->author_id }}"></option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" value="{{ old('image') ?? $post->image }}" class="form-control">
        </div>
        <div class="form-check">
            <input type="checkbox" name="is_published" class="form-check-input">
            <label for="isPublished" class="form-check-label" value="{{ old('is_published') ?? $post->is_published }}"></label>
        </div>
        <div class="d-flex justify-content-between mt-3"> 
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mb-3">Back</a>
        </div>
    </form>
    
@endsection