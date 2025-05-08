@extends('admin.includes.main')

@push('title')
<title>Dashboard - Admin</title>
@endpush

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
        <h4 class="mb-4 text-center">Add New Slide</h4>
        <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title" class="form-control my-2" required>
            <textarea name="description" placeholder="Description" class="form-control my-2"></textarea>
            <input type="file" name="image" class="form-control my-2" required>
            <button class="btn btn-primary w-100">Add Slide</button>
        </form>
    </div>
</div>
@endsection
