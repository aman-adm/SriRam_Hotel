@extends('HomeLayout.home')

@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gallery-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .gallery-img:hover {
            transform: scale(1.05);
        }
        .modal-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .modal-navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 20px;
        }
        .nav-btn {
            background: rgba(0,0,0,0.5);
            border: none;
            color: white;
            font-size: 24px;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        .nav-btn:hover {
            background: rgba(0,0,0,0.7);
        }
    </style>
</head>

<!-- Background Header Section -->
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="title">
                    <h2>Gallery</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="gallery py-5">
    <div class="container">
        <div class="row">
            @foreach($gallary as $index => $item)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="text-center">
                    <img src="{{ asset('gallary/' . $item->image) }}" 
                         class="gallery-img shadow-sm"
                         alt="Gallery Image"
                         data-bs-toggle="modal"
                         data-bs-target="#galleryModal"
                         onclick="setModalImage({{ $index }})">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal for Viewing Large Image -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg position-relative">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="galleryModalLabel">Gallery Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center position-relative">
        <img id="modalGalleryImage" src="" class="modal-img" alt="Gallery Large View">
        <div class="modal-navigation">
            <button class="nav-btn" onclick="previousImage()">&#8592;</button>
            <button class="nav-btn" onclick="nextImage()">&#8594;</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Custom Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const galleryImages = @json($gallary->pluck('image'));
    let currentIndex = 0;

    function setModalImage(index) {
        currentIndex = index;
        document.getElementById('modalGalleryImage').src = "{{ asset('gallary') }}/" + galleryImages[currentIndex];
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        setModalImage(currentIndex);
    }

    function previousImage() {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        setModalImage(currentIndex);
    }
</script>

@endsection
