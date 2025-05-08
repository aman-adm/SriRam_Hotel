@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
@php
$mode = count($getRecord) > 0 ? 'Update' : 'Add';
$record = $getRecord[0] ?? null;
@endphp
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.logo.post') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- Logo Icon --}}
                                <div class="form-group row mt-3">
                                    <label class="col-sm-2 col-form-label">Logo Icon <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="logo_icon" class="form-control">
                                        @if (!empty($record->logo_icon))
                                        <img src="{{ asset('public/logo/' . $record->logo_icon) }}" width="150"
                                            height="100" alt="Logo Icon" class="mt-2">
                                        @endif
                                    </div>
                                </div>

                                {{-- Favicon Icon --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Favicon Icon <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="favicon_icon" class="form-control">
                                        @if (!empty($record->favicon_icon))
                                        <img src="{{ asset('public/logo/' . $record->favicon_icon) }}" width="100"
                                            height="100" alt="Favicon Icon" class="mt-2">
                                        @endif
                                    </div>
                                </div>
                                {{-- Status --}}
                                <div class="form-group row mt-3">
                                    <label class="col-sm-2 col-form-label">Status <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control">
                                            <option value="active"
                                                {{ old('status', $record->status ?? '') == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ old('status', $record->status ?? '') == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Action --}}
                                <div class="form-group row mt-3">
                                    <label class="col-sm-2 col-form-label">Action <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="action" class="form-control">
                                            <option value="show"
                                                {{ old('action', $record->action ?? '') == 'show' ? 'selected' : '' }}>
                                                Show</option>
                                            <option value="hide"
                                                {{ old('action', $record->action ?? '') == 'hide' ? 'selected' : '' }}>
                                                Hide</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Hidden ID --}}
                                <input type="hidden" name="id" value="{{ $record->id ?? '' }}">

                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add_to_update" value="{{ $mode }}" class="btn btn-danger">
                                    {{ $mode }}
                                </button>
                                <a href="{{ route('admin.logo') }}" class="btn btn-default float-right">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
@endsection