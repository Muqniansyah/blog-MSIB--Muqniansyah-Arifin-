@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center">Post Details</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Title:</label>
                    <p class="form-control-plaintext">{{ old('title') ?? $post->title }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Content:</label>
                    <p class="form-control-plaintext">{{ old('content') ?? $post->content }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Category:</label>
                    <p class="form-control-plaintext">{{ old('category_id') ?? $post->category_id }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Author:</label>
                    <p class="form-control-plaintext">{{ old('author_id') ?? $post->author_id }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Image:</label>
                    <p class="form-control-plaintext">{{ old('description') ?? $category->description }}</p>
                    <!-- {{ old('image') ?? $post->image }} -->
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Status:</label>
                    <p class="form-control-plaintext">{{ old('is_published') ?? $post->is_published }}</p>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
