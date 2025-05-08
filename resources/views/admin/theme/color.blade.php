@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3>Theme Setting</h3>
            @if(Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <form enctype="multipart/form-data" action="{{ route('theme-update') }}" method="POST"
                class="form-control p-4">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col">
                        <label>Site Text Color</label>
                        <input type="color" value="{{ old('text_color', $data ? $data->text_color : '#000000') }}"
                            name="text_color" class="form-control-color">
                        @error('text_color')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Site Base Color</label>
                        <input type="color" name="base_color"
                            value="{{ old('base_color', $data ? $data->base_color : '#000000') }}"
                            class="form-control-color">
                        @error('base_color')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="form-btn btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection