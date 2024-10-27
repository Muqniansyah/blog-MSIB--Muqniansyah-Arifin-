@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4" style="font-weight: bold; color: #333;">User Profile</h2>
                <div class="profile-info p-4" style="background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ddd;">
                    <div class="mb-4 d-flex">
                        <label class="me-3 fw-bold" style="width: 150px; color: #555;">Name:</label>
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="mb-4 d-flex">
                        <label class="me-3 fw-bold" style="width: 150px; color: #555;">Email:</label>
                        <span>{{ $user->email }}</span>
                    </div>
                    <div class="mb-4 d-flex">
                        <label class="me-3 fw-bold" style="width: 150px; color: #555;">Joined:</label>
                        <span>{{ $user->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="text-end mt-4">
                    <!-- <a href="#" class="btn btn-warning me-2">Edit Profile</a> -->
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection