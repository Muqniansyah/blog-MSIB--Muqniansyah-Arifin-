@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div class="container mt-5 pb-5">
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
                    <p class="form-control-plaintext">Name : {{ $category->name }}</p>
                    <p class="form-control-plaintext">Description : {{ $category->description }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Author:</label>
                    <p class="form-control-plaintext">Name : {{ $author->name }}</p>
                    <p class="form-control-plaintext">Email : {{ $author->email }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Image:</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Status:</label>
                    <!-- <p class="form-control-plaintext">{{ old('is_published') ?? $post->is_published }}</p> -->
                    <p class="form-control-plaintext">{{ old('is_published') ? (old('is_published') == 1 ? 'Publish' : 'Not Published') : ($post->is_published == 1 ? 'Publish' : 'Not Published') }}</p>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
