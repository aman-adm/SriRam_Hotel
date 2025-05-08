@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="max-width: 800px; margin: 30px auto;">
            <h4 class="mb-4 fw-bold">Add Room</h4>
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
            <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label fw-bold">Room Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="form-control" aria-describedby="titleHelp">
                        <small id="titleHelp" class="form-text text-muted">Enter a descriptive title for the
                            room.</small>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label fw-bold">Price</label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}" required
                            class="form-control" aria-describedby="priceHelp">
                        <small id="priceHelp" class="form-text text-muted">Set the price for the room per night.</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="type" class="form-label fw-bold">Room Type</label>
                        <select name="type" id="type" required class="form-control" aria-describedby="typeHelp">
                            <option value="regular" {{ old('type') == 'regular' ? 'selected' : '' }}>Regular</option>
                            <option value="deluxe" {{ old('type') == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                            <option value="premium" {{ old('type') == 'premium' ? 'selected' : '' }}>Premium</option>
                        </select>
                        <small id="typeHelp" class="form-text text-muted">Choose the type of the room.</small>
                    </div>
                    <div class="col-md-6">
                        <label for="wifi" class="form-label fw-bold">Free Wifi</label>
                        <select name="wifi" id="wifi" required class="form-control" aria-describedby="wifiHelp">
                            <option value="yes" {{ old('wifi') == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ old('wifi') == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                        <small id="wifiHelp" class="form-text text-muted">Specify whether the room has free
                            Wi-Fi.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" id="description" required rows="4" class="form-control"
                        style="width: 100%;">{{ old('description') }}</textarea>
                </div>

                <!-- <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <input type="file" name="image" id="image" required class="form-control"
                        aria-describedby="imageHelp">
                    <small id="imageHelp" class="form-text text-muted">Upload an image of the room.</small>
                </div> -->
                <div class="mb-3">
    <label for="image" class="form-label fw-bold">Upload Images</label>
    <input type="file" name="image[]" id="image" required class="form-control" 
           aria-describedby="imageHelp" multiple>
    <small id="imageHelp" class="form-text text-muted">Upload multiple images of the room.</small>
</div>

                <div class="mb-3">
                    <label for="adults" class="form-label fw-bold">Adults</label>
                    <input type="number" name="adults" id="adults" required class="form-control"
                        aria-describedby="imageHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="children" class="form-label fw-bold">children</label>
                    <input type="number" name="children" id="children" required class="form-control"
                        aria-describedby="imageHelp">
                    
                </div>

                <div class="text-center mt-4">
                    <input type="submit" value="Add Room" class="btn btn-primary px-4">
                </div>
            </form>
        </div>
    </main>
</div>
<script>
var editor1 = new RichTextEditor("#description");
</script>
@endsection