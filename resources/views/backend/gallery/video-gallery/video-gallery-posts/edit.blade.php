@extends('layouts.backend')
@section('content')
    <!-- success message  -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- error message  -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@section('title')
    Video-Gallery-Post
@endsection
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Video-gallery-post</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('video-gallery.index')}}" class="text-muted text-hover-primary">Videogallery</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Video-gallery-post</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->

<div class="app-container container-fluid">
    <div style="background-color: #f0f0f0; padding: 20px;">
        <h2 style="text-align: center;">Edit Image-Gallery-Post</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('video-gallery-posts.update', $data->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- title field  --}}
            <div class="form-group">
                <label for="title" class="mb-2 fs-5">Title:</label>
                <input type="text" class="form-control mb-2" id="title" name="title"
                    value="{{ $data->title }}">
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- image input field  --}}
            <div class="form-group">
                <label for="image" class="mb-2 fs-5">Thumbnail Image:</label>
                <input type="file" class="form-control mb-2" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                @if ($data->image)
                    <img src="{{ asset('video-gallery-thumbnail-image/' . $data->image) }}" height="100"
                        class="mb-2" alt="Current Image">
                @endif
            </div>

            {{-- video url  --}}
            <div class="form-group">
                <label for="video_url">Video Url:</label>
                <input type="text" class="form-control" id="video_url" name="video_url"
                    value="{{ $data->video_url }}">
            </div>
            <div class="form-group">
                <label for="show-video">Video:</label>
                @php
                    $videoUrl = $data->video_url;
                    $videoId = null;
                    if (strpos($videoUrl, 'youtube.com') !== false) {
                        $videoId = substr(parse_url($videoUrl, PHP_URL_QUERY), 2);
                    } elseif (strpos($videoUrl, 'youtu.be') !== false) {
                        $videoId = substr(parse_url($videoUrl, PHP_URL_PATH), 1);
                    }
                @endphp
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $videoId }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            </div>

            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>

@endsection
