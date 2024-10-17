@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1 class="mb-4 text-center">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Create Post
    </a>
    
    <div class="list-group">
        @if ($posts->isNotEmpty())
            @foreach ($posts as $post)
                <div class="list-group-item d-flex align-items-center">
                    <div class="d-flex">
                        <img src="{{ $post->image ? asset('storage/'.$post->image) : 'https://via.placeholder.com/100' }}" alt="Post image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                        <div>
                            <h6 class="mb-1"><a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">{{ $post->title }}</a></h6>
                            <p class="mb-1">In category: <strong>{{ $post->category->name }}</strong></p>
                            <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
                                {{ $post->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </div>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info me-1">
                            <i class="bi bi-eye"></i> Show
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning me-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this data?');">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-group-item text-center">
                No posts found.
            </div>
        @endif
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                    <li class="page-item {{ $i == $posts->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $posts->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
