@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-center mt-5">
                <div class="card"
                    style="width: 100%; max-width: 600px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); padding: 30px;">
                    <h3 style="text-align: center; margin-bottom: 30px;">Mail Send to <span
                            style="color: #007bff;">{{$data->name}}</span></h3>
                    <form action="{{url('mail',$data->id)}}" method="POST">
                        @csrf
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label style="font-weight: bold;">Greeting</label>
                            <input type="text" name="greeting" required class="form-control" style="width: 100%;">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label style="font-weight: bold;">Mail Body</label>
                            <textarea name="body" required rows="4" class="form-control"
                                style="width: 100%;"></textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label style="font-weight: bold;">Action Text</label>
                            <input type="text" name="action_text" required class="form-control" style="width: 100%;">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label style="font-weight: bold;">Action URL</label>
                            <input type="text" name="action_url" required class="form-control" style="width: 100%;">
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label style="font-weight: bold;">End Line</label>
                            <input type="text" name="endline" required class="form-control" style="width: 100%;">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Send Mail" class="btn btn-primary" style="width: 120px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection