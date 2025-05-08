@extends('admin.includes.main')

@push('title')
    <title>Dashboard - Admin</title>
@endpush

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-5">
                @if(session('success'))
                    <div class="alert alert-success col-md-8 mx-auto text-center">{{ session('success') }}</div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card shadow rounded-4 border-0">
                            <div class="card-header bg-primary text-white rounded-top-4">
                                <h4 class="mb-0">Blog List</h4>
                            </div>
                            <div class="card-body table-responsive p-4">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($blogs as $blog)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/' . $blog->image) }}" class="rounded-3" width="100" alt="Blog Image">
                                                </td>
                                                <td class="fw-semibold">{{ $blog->title }}</td>
                                                <td>{!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 100, '...') !!}</td>
                                                <td>{{ $blog->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-4">No blogs found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>
@endsection
