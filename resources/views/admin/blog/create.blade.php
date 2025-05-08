@extends('admin.includes.main')

<head>
    <link rel="stylesheet" href="{{ url('richtexteditor/rte_theme_default.css') }}" />
@endhead

@push('title')
    <title>Dashboard - Admin</title>
@endpush

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                <h2 class="text-center mb-5 fw-bold text-dark">Add New Blog</h2>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm rounded-4 border-0">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold">Blog Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" required>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold">Blog Description</label>
                                <textarea class="form-control" id="description" name="description" rows="6" placeholder="Write your blog content here..." required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold">Blog Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4">Save Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script type="text/javascript" src="{{ url('richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ url('richtexteditor/plugins/all_plugins.js') }}"></script>
<script>
    var editor1 = new RichTextEditor("#description");
</script>
@endsection
