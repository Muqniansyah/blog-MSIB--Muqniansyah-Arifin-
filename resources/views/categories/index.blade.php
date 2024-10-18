@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1 class="mb-4 text-center">Categories</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Tombol Create Category  -->
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Create Category
        </a>

        <!-- Form pencarian -->
        <form action="{{ route('categories.index') }}" method="GET" class="d-flex">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search categories..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    
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

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $categories->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $categories->lastPage(); $i++)
                    <li class="page-item {{ $i == $categories->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $categories->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $categories->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
