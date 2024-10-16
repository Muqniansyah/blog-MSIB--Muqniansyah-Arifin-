@extends('layouts.app')

@section('title', 'Create Author')

@section('content')
    <h1 class="text-center">Create Author</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </form>



@endsection