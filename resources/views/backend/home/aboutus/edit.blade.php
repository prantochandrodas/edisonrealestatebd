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

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit About
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Dashboards</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->


    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form action="{{ route('home_about.update', $homeabout->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $homeabout->title }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="heading">Heading:</label>
                    <input type="text" class="form-control" id="heading" name="heading"
                        value="{{ $homeabout->heading }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ $homeabout->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="video">Video:</label>
                    <input type="text" class="form-control" id="video" name="video"
                        value="{{ $homeabout->video }}">
                </div>
                <div class="form-group">
                    <label for="show-video">Video:</label>
                    @php
                        $videoUrl = $homeabout->video;
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
        <!--end::Content container-->
    </div>
@endsection
