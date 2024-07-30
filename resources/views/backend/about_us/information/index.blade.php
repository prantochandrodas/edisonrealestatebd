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
    Company-Information
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Company-Information</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1"
                style="padding:0px; background-color:inherit">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('about.index')}}" class="text-muted text-hover-primary">About</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Company-Information</li>
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
        <h2 style="text-align: center;">Update Company-Information</h2>
    </div>
    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form action="{{ route('about-companys.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- title inpu field --}}
            <div class="form-group">
                <label for="title">Short Description Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}"
                    required>
            </div>

            {{-- short_description input field --}}
            <div style="margin-bottom: 20px;">
                <label for="short_description" style="display: block; margin-bottom: 5px;">Short Description:</label>
                <textarea name="short_description" id="summernote" cols="30" rows="10" class="form-control"
                    style="width: 100%; padding: 8px;">{{ $data->short_description }}</textarea>
            </div>

            {{-- long_description input field --}}
            <div style="margin-bottom: 20px;">
                <label for="long_description" style="display: block; margin-bottom: 5px;">Long Description:</label>
                <textarea name="long_description" id="summernote2" cols="30" rows="10" class="form-control"
                    style="width: 100%; padding: 8px;">{{ $data->long_description }}</textarea>
            </div>
            {{-- thumbnail_image input field  --}}
            <div class="form-group">
                <label for="thumbnail_image" class="mb-2 h5">Thumbnail Image:</label>
                <input type="file" class="form-control mb-2" id="thumbnail_image" name="thumbnail_image">
                @error('thumbnail_image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                @if ($data->thumbnail_image)
                    <img src="{{ asset('about_us/thumbnail/' . $data->thumbnail_image) }}" height="300" class="mb-2"
                        alt="Current Image">
                @endif
            </div>

            <div class="form-group">
                <label for="video_url">Video:</label>
                <input type="text" class="form-control" id="video_url" name="video_url"
                    value="{{ $data->video_url }}">
            </div>
            <div class="form-group">
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
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 250
        });
        $('#summernote2').summernote({
            height: 250
        });
    });
</script>
@endsection
