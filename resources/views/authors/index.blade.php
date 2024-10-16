@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <h1 class="mb-4 text-center">Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Create Author
    </a>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($authors->isNotEmpty())
                @foreach ($authors as $author)
                    <tr>
                        <td class="text-center">{{ $author->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-sm btn-info me-1">
                                <i class="bi bi-eye"></i> Show
                            </a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline">
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
                    <td colspan="2" class="text-center">No authors found.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item {{ $authors->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $authors->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $authors->lastPage(); $i++)
                    <li class="page-item {{ $i == $authors->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $authors->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $authors->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $authors->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
