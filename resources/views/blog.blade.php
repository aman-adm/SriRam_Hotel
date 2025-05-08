@extends('HomeLayout.home')
@section('content')
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="blog_box">
                    <div class="blog_img">
                        <figure><img src="{{ asset('storage/' . $blog->image) }}" alt="#" /></figure>
                    </div>
                    <div class="blog_room">
                        <h3>{{ $blog->title }}</h3>
                        <span>The standard chunk</span>
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection