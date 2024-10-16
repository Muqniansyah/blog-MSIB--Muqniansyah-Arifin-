@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <h1 class="text-center">Create Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="d-flex justify-content-between mt-3"> 
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary mb-3">Back</a>
        </div>
    </form>

@endsection