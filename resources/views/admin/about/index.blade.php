@extends('admin.includes.main')
<head>
<link rel="stylesheet" href="{{ url('richtexteditor/rte_theme_default.css') }}" />
</head>
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div class="container mt-4">
    {{-- Form Starts Here --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Update About Us</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control"
                                rows="6">{{ old('content', $about->content ?? '') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Image (optional)</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if($about && $about->image)
                            <div class="mt-3">
                                <img src="{{ asset('storage/'.$about->image) }}" width="150" class="img-thumbnail">
                            </div>
                            @endif
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ url('richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ url('richtexteditor/plugins/all_plugins.js') }}"></script>
<script>
    var editor1 = new RichTextEditor("#description");
</script>
@endsection