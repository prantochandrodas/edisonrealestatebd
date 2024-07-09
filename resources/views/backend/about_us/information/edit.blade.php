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
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Update
                About Company-Information</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding:0px; background-color:inherit">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted text-hover-primary">AboutPage</span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">About-Company</li>
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
            <form action="{{ route('about-us-infos.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- short_description_title inpu field --}}
                <div class="form-group">
                    <label for="short_description_title">Short Description Title:</label>
                    <input type="text" class="form-control" id="short_description_title" name="short_description_title"
                        value="{{ $data->short_description_title }}" required>
                </div>

                {{-- short_description input field --}}
                <div style="margin-bottom: 20px;">
                    <label for="short_description" style="display: block; margin-bottom: 5px;">Short Description:</label>
                    <textarea name="short_description" id="summernote" cols="30" rows="10" class="form-control"
                        style="width: 100%; padding: 8px;">{{ $data->short_description }}</textarea>
                </div>


                {{-- long_description_title inpu field --}}
                <div class="form-group">
                    <label for="long_description_title">Long Description Title:</label>
                    <input type="text" class="form-control" id="long_description_title" name="long_description_title"
                        value="{{ $data->long_description_title }}" required>
                </div>

                 {{-- long_description input field --}}
                 <div style="margin-bottom: 20px;">
                    <label for="long_description" style="display: block; margin-bottom: 5px;">Long Description:</label>
                    <textarea name="long_description" id="summernote2" cols="30" rows="10" class="form-control"
                        style="width: 100%; padding: 8px;">{{ $data->long_description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="video_url">Video:</label>
                    <input type="text" class="form-control" id="video_url" name="video_url" value="{{ $data->video_url }}">
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
        <!--end::Content container-->
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
