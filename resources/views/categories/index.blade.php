@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1 class="mb-4 text-center">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Create Category
    </a>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center">{{ $category->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info me-1">
                                <i class="bi bi-eye"></i> Show
                            </a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this data?');">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2" class="text-center">No categories found.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
