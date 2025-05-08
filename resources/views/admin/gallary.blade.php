@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container-fluid">
                <h1>Gallary</h1>
                <div class="container mt-4">
                    <h2>Gallery Images</h2>
                    <div class="row">
                        @foreach($gallary as $gallary)
                        <div class="col-md-3 mb-4 text-center">
                            <img src="{{ asset('gallary/' . $gallary->image) }}" alt="Gallery Image"
                                class="img-fluid rounded" style="max-height: 200px;">
                            <div class="mt-2">
                                <a class="btn btn-danger btn-sm" href="{{ url('delete_gallary', $gallary->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this image?')">Delete
                                    Image</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="image">Upload Image</label>
                        <input type="file" name="image[]" multiple>
                    </div>
                    <div>
                        <input type="submit" value="Add Image">
                    </div>
                </form>
            </div>
    </main>
</div>
@endsection