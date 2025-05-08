@extends('admin.includes.main')
<head>
    <link rel="stylesheet" href="{{ url('richtexteditor/rte_theme_default.css') }}" />
</head>

@push('title')
<title>Dashboard - Admin</title>
@endpush

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="max-width: 800px; margin: 30px auto;">
            <h4 class="mb-4 fw-bold">{{ isset($room) ? 'Edit Room' : 'Add Room' }}</h4>

            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($room) ? url('edit_room', $room->id) : url('add_room') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($room))
                    @method('PUT')
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label fw-bold">Room Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $room->room_title ?? '') }}" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label fw-bold">Price</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $room->price ?? '') }}" required class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="type" class="form-label fw-bold">Room Type</label>
                        <select name="type" id="type" required class="form-control">
                            <option value="regular" {{ old('type', $room->type ?? '') == 'regular' ? 'selected' : '' }}>Regular</option>
                            <option value="deluxe" {{ old('type', $room->type ?? '') == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                            <option value="premium" {{ old('type', $room->type ?? '') == 'premium' ? 'selected' : '' }}>Premium</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="wifi" class="form-label fw-bold">Free Wifi</label>
                        <select name="wifi" id="wifi" required class="form-control">
                            <option value="yes" {{ old('wifi', $room->wifi ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ old('wifi', $room->wifi ?? '') == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" id="description" required rows="4" class="form-control">{{ old('description', $room->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Images</label>
                    <input type="file" name="image[]" id="image" class="form-control" multiple>
                    <small class="form-text text-muted">Upload multiple images of the room.</small>
                    @if (isset($room) && $room->images)
                        <div class="mt-3">
                            <strong>Current Images:</strong>
                            <div class="row">
                                @foreach ($room->images as $image)
                                    <div class="col-md-3">
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Room Image" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="adults" class="form-label fw-bold">Adults</label>
                    <input type="number" name="adults" id="adults" value="{{ old('adults', $room->adults ?? '') }}" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="children" class="form-label fw-bold">Children</label>
                    <input type="number" name="children" id="children" value="{{ old('children', $room->children ?? '') }}" required class="form-control">
                </div>

                <div class="text-center mt-4">
                    <input type="submit" value="{{ isset($room) ? 'Update Room' : 'Add Room' }}" class="btn btn-primary px-4">
                </div>
            </form>
        </div>
    </main>
</div>

<script type="text/javascript" src="{{ url('richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ url('richtexteditor/plugins/all_plugins.js') }}"></script>
<script>
    var editor1 = new RichTextEditor("#description");
</script>
@endsection
