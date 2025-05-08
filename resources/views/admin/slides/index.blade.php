@extends('admin.includes.main')

@push('title')
<title>Dashboard - Admin</title>
@endpush

@section('content')
<div class="container py-4 d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
    {{-- Top card for heading and button --}}
    <div class="card shadow w-75">
        <div class="card-header text-center">
            <h4 class="mb-0">Table Title</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-center mb-0 table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($slides as $slide)
                            <tr>
                                <td>{{ $slide->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $slide->image) }}" width="80" class="img-thumbnail">
                                </td>
                                <td>
                                    <!-- Delete Button -->
                                    <form action="{{ route('slides.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this slide?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No slides found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
