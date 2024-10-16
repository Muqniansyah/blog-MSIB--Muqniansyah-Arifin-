@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <h1 class="text-center">Edit Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('categories.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') ?? $category->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') ?? $category->description }}">
        </div>
        <div class="d-flex justify-content-between mt-3"> 
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </form>

@endsection