@extends('layouts.app')

@section('title', 'Show Author')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center">Author Details</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Name:</label>
                    <p class="form-control-plaintext">{{ old('name') ?? $author->name }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <p class="form-control-plaintext">{{ old('email') ?? $author->email }}</p>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
