@extends('layouts.app')

@section('title', 'Show Category')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center">Category Details</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Name:</label>
                    <p class="form-control-plaintext">{{ old('name') ?? $category->name }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Description:</label>
                    <p class="form-control-plaintext">{{ old('description') ?? $category->description }}</p>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
